<?php
ob_start();

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Include the database connection file
require_once 'connection.php';

// Define the path for the custom debug log file
$debug_log_file = 'debug.log'; // <-- **CHANGE THIS PATH FOR PRODUCTION**

// Debug logging
error_log("=== Debug Session Info ===", 3, $debug_log_file);
error_log("Session contents: " . print_r($_SESSION, true), 3, $debug_log_file);
error_log("admin_id exists: " . (isset($_SESSION['admin_id']) ? 'yes' : 'no'), 3, $debug_log_file);
error_log("is_superuser value: " . (isset($_SESSION['is_superuser']) ? $_SESSION['is_superuser'] : 'not set'), 3, $debug_log_file);

// Check if the user is logged in and is an admin/superuser (adjust condition as per your auth logic)
// Assuming admin_id and is_superuser are used for authentication
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || !isset($_SESSION["role"]) || $_SESSION["role"] !== 'admin') {
    // Redirect to login page or show an access denied message
    header("location: login.php"); // Adjust redirect path as needed
    exit;
}

// Define upload directory (relative to this PHP file's location)
// IMPORTANT: Ensure this directory exists and is writable by the web server!
$upload_dir = '../uploads/success_stories/';
error_log("DEBUG: Upload directory set to: " . $upload_dir, 3, $debug_log_file);

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    error_log("DEBUG: Form submitted via POST.", 3, $debug_log_file);

    // Initialize variables
    $title = $content = $cover_image_path = "";
    $errors = [];

    // Validate Title
    if (empty(trim($_POST["title"]))) {
        $errors[] = "Please enter a title.";
        error_log("DEBUG: Title is empty.", 3, $debug_log_file);
    } else {
        $title = trim($_POST["title"]);
        error_log("DEBUG: Title received: " . $title, 3, $debug_log_file);
    }

    // Decode the content from Base64 and URL encoding
    $content = $_POST['content'];
    if (!empty($content)) {
        // Ensure decoding happens correctly
        $decoded_content = urldecode(base64_decode($content));
        // Use $decoded_content when preparing your SQL statement
    } else {
        $decoded_content = ''; // Handle empty content case
    }

    // Process Cover Image Upload
    if (isset($_FILES["cover_image"]) && $_FILES["cover_image"]["error"] == UPLOAD_ERR_OK) {
        $file_tmp_path = $_FILES["cover_image"]["tmp_name"];
        $file_name = $_FILES["cover_image"]["name"];
        $file_size = $_FILES["cover_image"]["size"];
        $file_type = $_FILES["cover_image"]["type"];
        $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        error_log("DEBUG: File upload detected. Name: " . $file_name . ", Size: " . $file_size . ", Type: " . $file_type, 3, $debug_log_file);

        // Validate file type (basic check)
        $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($file_extension, $allowed_types)) {
            $errors[] = "Invalid file type. Only JPG, JPEG, PNG, and GIF are allowed.";
            error_log("ERROR: Invalid file type: " . $file_extension, 3, $debug_log_file);
        }

        // Validate file size (e.g., max 5MB)
        $max_size = 5 * 1024 * 1024; // 5MB
        if ($file_size > $max_size) {
            $errors[] = "File size exceeds the maximum limit (5MB).";
            error_log("ERROR: File size too large: " . $file_size, 3, $debug_log_file);
        }

        // Generate a unique filename
        $new_file_name = uniqid('cover_', true) . '.' . $file_extension;
        $dest_path = $upload_dir . $new_file_name;
        error_log("DEBUG: New file name: " . $new_file_name . ", Destination path: " . $dest_path, 3, $debug_log_file);

        // Ensure upload directory exists and is writable
        if (!is_dir($upload_dir)) {
            // Attempt to create the directory if it doesn't exist
            if (!mkdir($upload_dir, 0755, true)) {
                 $errors[] = "Upload directory does not exist and could not be created.";
                 error_log("ERROR: Upload directory does not exist and could not be created: " . $upload_dir, 3, $debug_log_file);
            } else {
                 error_log("DEBUG: Upload directory created: " . $upload_dir, 3, $debug_log_file);
            }
        }

        if (empty($errors)) {
            // Move the uploaded file
            if (move_uploaded_file($file_tmp_path, $dest_path)) {
                $cover_image_path = $dest_path; // Store the path to save in DB
                error_log("DEBUG: File moved successfully to: " . $dest_path, 3, $debug_log_file);
            } else {
                $errors[] = "Error uploading file.";
                error_log("ERROR: Failed to move uploaded file from " . $file_tmp_path . " to " . $dest_path, 3, $debug_log_file);
            }
        }

    } else if (isset($_FILES["cover_image"]) && $_FILES["cover_image"]["error"] != UPLOAD_ERR_NO_FILE) {
        // Handle other upload errors
        $errors[] = "File upload error: " . $_FILES["cover_image"]["error"];
        error_log("ERROR: File upload error code: " . $_FILES["cover_image"]["error"], 3, $debug_log_file);
    } else {
        // Cover image is required based on your form, so add an error if not uploaded
         $errors[] = "Cover image is required.";
         error_log("DEBUG: Cover image not uploaded.", 3, $debug_log_file);
    }


    // If no errors, insert into database
    if (empty($errors)) {
        error_log("DEBUG: No validation or upload errors. Preparing database insert.", 3, $debug_log_file);
        $sql = "INSERT INTO success_stories (title, content, cover_image) VALUES (:title, :content, :cover_image)";

        if ($stmt = $pdo->prepare($sql)) {
            // Bind parameters
            $stmt->bindParam(":title", $title, PDO::PARAM_STR);
            $stmt->bindParam(":content", $content, PDO::PARAM_STR);
            $stmt->bindParam(":cover_image", $cover_image_path, PDO::PARAM_STR);

            error_log("DEBUG: Parameters bound for insert.", 3, $debug_log_file);

            // Attempt to execute the prepared statement
            try {
                if ($stmt->execute()) {
                    error_log("DEBUG: Success story inserted successfully.", 3, $debug_log_file);
                    // Redirect to view success stories page on success
                    $_SESSION['success_message'] = 'Success story added successfully.'; // Optional: Set success message

                    // Updated redirect path to use the clean URL
                    header("location: " . BASE_URL . "dashboard/view_success_stories");
                    exit; // Stop script execution after sending JSON response // Keep exit
                } else {
                    // This block might not be reached with ERRMODE_EXCEPTION
                    $errors[] = "Error inserting success story into database.";
                    $pdo_error_info = $stmt->errorInfo();
                    error_log("ERROR: Database insert failed (non-exception). Code: " . $pdo_error_info[0] . ", Driver Code: " . $pdo_error_info[1] . ", Message: " . $pdo_error_info[2], 3, $debug_log_file);
                }
            } catch (PDOException $e) {
                $errors[] = "Database error: " . $e->getMessage();
                error_log("ERROR: Database insert failed (Exception). Message: " . $e->getMessage() . ", Code: " . $e->getCode(), 3, $debug_log_file);
            }

            // Close statement
            unset($stmt);
            error_log("DEBUG: PDO statement unset after insert attempt.", 3, $debug_log_file);

        } else {
            $errors[] = "Database error: Could not prepare statement.";
            $pdo_error_info = $pdo->errorInfo();
            error_log("ERROR: Database prepare failed. Code: " . $pdo_error_info[0] . ", Driver Code: " . $pdo_error_info[1] . ", Message: " . $pdo_error_info[2], 3, $debug_log_file);
        }
    }

    // If there are errors, store them in session and redirect back to the form
    if (!empty($errors)) {
        error_log("DEBUG: Errors occurred during processing.", 3, $debug_log_file);
        $_SESSION['errors'] = $errors;
        $_SESSION['form_data'] = $_POST; // Optionally store submitted data to repopulate form
        header("location: " . BASE_URL . "backend/dashboard?page=add_success_story"); // Redirect back to the add page
        exit;
    }

    // Close connection
    unset($pdo);
    error_log("DEBUG: PDO connection unset.", 3, $debug_log_file);
} else {
    error_log("DEBUG: Form not submitted via POST.", 3, $debug_log_file);
}

// Check for errors or success messages from a previous POST submission redirect
$errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];
$success_message = isset($_SESSION['success_message']) ? $_SESSION['success_message'] : '';
$form_data = isset($_SESSION['form_data']) ? $_SESSION['form_data'] : [];

// Clear session messages/data after retrieving
unset($_SESSION['errors']);
unset($_SESSION['success_message']);
unset($_SESSION['form_data']);

// Use form_data if available (from a failed submission)
$display_data = empty($form_data) ? [] : $form_data;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Success Story</title>
    <!-- Add TinyMCE script -->
    <script src="https://cdn.tiny.cloud/1/mjeggepk235yedfjgt7f28fhhw9hjapczs6x8d63uuuar5ch/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
</head>
<body>
    <div class="edit-blog-container">
        <h2>Add New Success Story</h2>

        <?php
        // Display errors from previous submission
        if (!empty($errors)) {
            echo '<div class="alert alert-danger">';
            foreach ($errors as $error) {
                echo "<p>" . htmlspecialchars($error) . "</p>";
            }
            echo '</div>';
        }
        // Display success message (though redirect should prevent this from showing on success)
        if (!empty($success_message)) {
            echo '<div class="alert alert-success">' . htmlspecialchars($success_message) . '</div>';
        }
        ?>

        <form id="blogForm" method="POST" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?page=add_success_story'; ?>">
            <!-- Add encoding flag for content -->
            <input type="hidden" name="content_encoding" value="base64">

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($display_data['title'] ?? ''); ?>" required>
            </div>

            <div class="form-group">
                <label for="cover_image">Cover Image:</label>
                <input type="file" id="cover_image" name="cover_image" accept="image/*" required>
            </div>

            <div class="form-group">
                <label for="content">Content:</label>
                <textarea id="content" name="content"><?php echo htmlspecialchars($display_data['content'] ?? ''); ?></textarea> <!-- Content set via JS -->
            </div>

            <div class="form-actions">
                <button type="submit" class="update-btn">Add Story</button>
                <a href="<?= BASE_URL ?>dashboard/view_success_stories" class="cancel-btn">Cancel</a>
            </div>
        </form>
    </div>

    <style>
    .edit-blog-container {
        padding: 20px;
        max-width: 800px;
        margin: 0 auto;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
        font-weight: 600;
    }

    .form-group input[type="text"],
    .form-group select {
        width: 100%;
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    .current-cover {
        max-width: 200px;
        margin: 10px 0;
        display: block;
    }

    .form-actions {
        display: flex;
        gap: 10px;
        margin-top: 20px;
    }

    .update-btn {
        background-color: #28a745;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
    }

    .cancel-btn {
        background-color: #6c757d;
        color: white;
        padding: 10px 20px;
        border-radius: 4px;
        text-decoration: none;
    }

    /* Remove CKEditor specific style */
    /* .ck-editor__editable {
        min-height: 300px !important;
    } */

    .alert {
        padding: 10px;
        margin-bottom: 15px;
        border-radius: 4px;
    }

    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }
    </style>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize TinyMCE
        tinymce.init({
            selector: '#content', // Target your textarea
            // Added 'image' plugin back
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            // Added 'image' button back to toolbar
            toolbar: 'undo redo | blocks | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
            height: 400, // Adjust height
            // Added image upload configuration
            // IMPORTANT: You need to create 'upload_images.php' to handle these uploads
            images_upload_url: '<?= BASE_URL ?>upload_images', // URL to your backend upload script
            automatic_uploads: true, // Enable automatic uploads for pasted/dropped images
            file_picker_types: 'image', // Specify image file types for the picker
            // Optional: You might still need a custom file picker for browsing server
            // file_picker_callback: function(cb, value, meta) { ... }
             setup: function (editor) {
                // Set initial content once the editor is ready if form_data exists
                editor.on('init', function () {
                    const initialContent = document.getElementById('content').value;
                    if (initialContent) {
                         editor.setContent(initialContent);
                    }
                });
            }
        });

        // Form submission handler (using TinyMCE)
        // This event listener is removed to allow standard form submission

        document.getElementById('blogForm').addEventListener('submit', function(e) {
            // Prevent default submission temporarily to encode content
            e.preventDefault();

            console.log('Form submission started (with encoding)');
            const submitButton = this.querySelector('button[type="submit"]');
            submitButton.disabled = true;
            submitButton.textContent = 'Processing...';

            try {
                // Get content from TinyMCE
                const editorContent = tinymce.get('content').getContent();

                // --- Encode the content ---
                let encodedContent = '';
                try {
                    // Use btoa for Base64 encoding. Handle potential UTF-8 characters first.
                    // Removed unescape() as it's deprecated and can cause issues with UTF-8
                    encodedContent = btoa(encodeURIComponent(editorContent)); // <-- Corrected line
                    console.log('Content encoded successfully.');
                } catch (encodeError) {
                    console.error("Error encoding content:", encodeError);
                    // If encoding fails, throw an error immediately before sending
                    throw new Error('Failed to encode content before sending.');
                }
                // --- End Encoding ---

                // Set the encoded content back into the content textarea
                document.getElementById('content').value = encodedContent;

                // The form will now submit normally via POST
                this.submit();

            } catch (error) {
                console.error('Error during form submission:', error);
                alert('An error occurred before submitting: ' + error.message);
                 submitButton.disabled = false; // Re-enable button on error
                 submitButton.textContent = 'Add Blog'; // Keep button text consistent with form
            }
        });
    });
    </script>
</body>
</html>
