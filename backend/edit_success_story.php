<?php
// Start output buffering
ob_start();
// Ensure session is started if not already
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once 'connection.php'; // Include connection.php for debug logging path

// Define the path for the custom debug log file (using the one from connection.php or defining here)
// Assuming connection.php defines $debug_log_file, otherwise define it here:
$debug_log_file = 'debug.log'; // <-- **CHANGE THIS PATH FOR PRODUCTION**

// Debug logging (optional, can be removed in production)
error_log("=== Debug Session Info (edit_success_story.php) ===", 3, $debug_log_file);
error_log("Session contents: " . print_r($_SESSION, true), 3, $debug_log_file);
error_log("loggedin exists: " . (isset($_SESSION['loggedin']) ? 'yes' : 'no'), 3, $debug_log_file);
error_log("loggedin value: " . (isset($_SESSION['loggedin']) ? $_SESSION['loggedin'] : 'not set'), 3, $debug_log_file);
error_log("role exists: " . (isset($_SESSION['role']) ? 'yes' : 'no'), 3, $debug_log_file);
error_log("role value: " . (isset($_SESSION['role']) ? $_SESSION['role'] : 'not set'), 3, $debug_log_file);


// Check if the user is logged in and is an admin
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || !isset($_SESSION["role"]) || $_SESSION["role"] !== 'admin') {
    // Redirect to login page or show an access denied message
    error_log("DEBUG: User not logged in or not admin. Redirecting to login.php", 3, $debug_log_file);
    $_SESSION['login_error'] = 'You must be logged in as an admin to access this page.'; // Optional: set error message
    header("location: login.php"); // Adjust redirect path as needed
    exit;
}

// Get database connection (using $pdo from connection.php)
// $db = Database::getInstance()->getConnection(); // Removed AuthMiddleware/Database specific connection
$db = $pdo; // Use the $pdo connection provided by connection.php

// --- PHP Form Submission Handling for Update ---
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    error_log("DEBUG: Update form submitted via POST.", 3, $debug_log_file);

    // Initialize variables
    $story_id = $title = $content = $cover_image_path = "";
    $errors = [];

    // Get the story ID from the POST data
    if (isset($_POST["id"]) && !empty(trim($_POST["id"]))) {
        $story_id = (int)trim($_POST["id"]);
        error_log("DEBUG: Story ID received: " . $story_id, 3, $debug_log_file);
    } else {
        $errors[] = "Success story ID is missing.";
        error_log("ERROR: Story ID is missing in POST data.", 3, $debug_log_file);
    }

    // Validate Title
    if (empty(trim($_POST["title"]))) {
        $errors[] = "Please enter a title.";
        error_log("DEBUG: Title is empty.", 3, $debug_log_file);
    } else {
        $title = trim($_POST["title"]);
        error_log("DEBUG: Title received: " . $title, 3, $debug_log_file);
    }

    // Process Content (Decode Base64)
    // We no longer need to decode here for saving, as we will save the encoded version.
    // The decoding logic below is only needed if you were saving decoded content,
    // but we determined add_success_story saves encoded, so we'll match that.
    // We will use $_POST['content'] directly for the database update.
    $new_content_for_db = $_POST['content'] ?? ''; // Get the encoded content from POST

    error_log("DEBUG: Received content from POST (likely encoded). Length: " . strlen($new_content_for_db), 3, $debug_log_file);
    error_log("DEBUG: Raw POST content (first 500 chars): " . (isset($_POST['content']) ? substr($_POST['content'], 0, 500) . (strlen($_POST['content']) > 500 ? '...' : '') : 'Not set in POST'), 3, $debug_log_file); // Log raw POST content


    // Define upload directory (relative to this PHP file's location)
    $upload_dir = '../uploads/success_stories/';
    error_log("DEBUG: Upload directory set to: " . $upload_dir, 3, $debug_log_file);

    // Fetch current cover image path and OLD content from DB if ID is valid and no errors yet
    $current_cover_image = null;
    $old_content = ""; // Variable to store old content
    if ($story_id > 0 && empty($errors)) {
        try {
            $stmt_fetch_story = $db->prepare("SELECT cover_image, content FROM success_stories WHERE id = ?");
            $stmt_fetch_story->execute([$story_id]);
            $story_data = $stmt_fetch_story->fetch(PDO::FETCH_ASSOC);
            if ($story_data) {
                $current_cover_image = $story_data['cover_image'];
                // Fetch old content - this is used for image deletion logic,
                // so it should be the content as stored in the DB (encoded).
                $old_content = $story_data['content'];
                error_log("DEBUG: Fetched current cover image path: " . $current_cover_image, 3, $debug_log_file);
                error_log("DEBUG: Fetched old content (encoded) for image deletion check.", 3, $debug_log_file);
                error_log("DEBUG: Raw old content from DB (first 500 chars): " . (isset($old_content) ? substr($old_content, 0, 500) . (strlen($old_content) > 500 ? '...' : '') : 'Not set'), 3, $debug_log_file); // Log raw old content from DB
            } else {
                 $errors[] = "Could not find existing success story with ID: " . $story_id;
                 error_log("ERROR: Could not find story with ID " . $story_id . " to fetch current image and content.", 3, $debug_log_file);
            }
        } catch (PDOException $e) {
            $errors[] = "Database error fetching current image and content: " . $e->getMessage();
            error_log("ERROR: Database error fetching current image and content for ID " . $story_id . ": " . $e->getMessage(), 3, $debug_log_file);
        }
    }

    // --- Image Deletion Logic (for images removed from content) ---
    // This logic needs the *decoded* content to extract image srcs.
    // We need to decode the old content fetched from the DB and the new content from POST.
    if ($story_id > 0 && empty($errors)) {
        error_log("DEBUG: Starting image deletion check.", 3, $debug_log_file);
        // Function to extract image sources from HTML content
        function extractImageSrcs($html) {
            $srcs = [];
            // Use DOMDocument for robust HTML parsing
            $dom = new DOMDocument();
            // Suppress warnings for malformed HTML
            libxml_use_internal_errors(true);
            $dom->loadHTML('<?xml encoding="utf-8" ?>' . $html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
            libxml_clear_errors();

            $images = $dom->getElementsByTagName('img');
            foreach ($images as $img) {
                $src = $img->getAttribute('src');
                if (!empty($src)) {
                    $srcs[] = $src;
                }
            }
            return $srcs;
        }

        // Decode old content for image extraction
        // Use raw content directly as it's stored as HTML
        $content_for_old_image_check = $old_content ?? '';
        error_log("DEBUG: Using raw old content from DB for image check.", 3, $debug_log_file); // Added log
        error_log("DEBUG: Old content used for image check (first 500 chars): " . (isset($content_for_old_image_check) ? substr($content_for_old_image_check, 0, 500) . (strlen($content_for_old_image_check) > 500 ? '...' : '') : 'Not set'), 3, $debug_log_file); // Log content used


        // Decode new content from POST for image extraction
        // Use raw content directly from POST as it should be HTML
        $content_for_new_image_check = $_POST['content'] ?? '';
        error_log("DEBUG: Using raw new content from POST for image check.", 3, $debug_log_file); // Added log
        error_log("DEBUG: New content from POST used for image check (first 500 chars): " . (isset($content_for_new_image_check) ? substr($content_for_new_image_check, 0, 500) . (strlen($content_for_new_image_check) > 500 ? '...' : '') : 'Not set'), 3, $debug_log_file); // Log content used


        $old_image_srcs = extractImageSrcs($content_for_old_image_check); // Use raw old content
        $new_image_srcs = extractImageSrcs($content_for_new_image_check); // Use raw new content

        error_log("DEBUG: Old image srcs: " . print_r($old_image_srcs, true), 3, $debug_log_file);
        error_log("DEBUG: New image srcs: " . print_r($new_image_srcs, true), 3, $debug_log_file);


        // Find images that are in old_image_srcs but NOT in new_image_srcs
        $removed_image_srcs = array_diff($old_image_srcs, $new_image_srcs);

        error_log("DEBUG: Removed image srcs: " . print_r($removed_image_srcs, true), 3, $debug_log_file);

        // Delete removed images from the server
        foreach ($removed_image_srcs as $imageUrl) {
            // Extract filename from URL
            $filename = basename(parse_url($imageUrl, PHP_URL_PATH));
            // Construct the full server path to the image file
            // Use __DIR__ to get the directory of the current script, then navigate to the uploads folder
            $imagePath = __DIR__ . '/../uploads/success_stories/' . $filename;

            error_log("DEBUG: Attempting to delete image: " . $imagePath, 3, $debug_log_file); // Added log

            // Check if the file exists before attempting deletion
            if (file_exists($imagePath)) {
                error_log("DEBUG: File exists: " . $imagePath, 3, $debug_log_file); // Added log
                if (unlink($imagePath)) {
                    error_log("DEBUG: Deleted removed content image: " . $imagePath, 3, $debug_log_file);
                } else {
                    error_log("WARNING: Failed to delete removed content image: " . $imagePath . ". Check file permissions.", 3, $debug_log_file); // Added permission hint
                    // Don't add to user errors, just log
                }
            } else {
                 error_log("DEBUG: Removed content image not found, skipping deletion: " . $imagePath, 3, $debug_log_file);
            }
        }
    }
    // --- End Image Deletion Logic ---


// Process Cover Image Upload
if (isset($_FILES["cover_image"]) && $_FILES["cover_image"]["error"] == UPLOAD_ERR_OK) {
    $file_tmp_path = $_FILES["cover_image"]["tmp_name"];
    $file_name = $_FILES["cover_image"]["name"];
    $file_size = $_FILES["cover_image"]["size"];
    $file_type = $_FILES["cover_image"]["type"];
    $file_extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    error_log("DEBUG: New file upload detected. Name: " . $file_name . ", Size: " . $file_size . ", Type: " . $file_type, 3, $debug_log_file);

    // Validate file type
    $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
    if (!in_array($file_extension, $allowed_types)) {
        $errors[] = "Invalid file type. Only JPG, JPEG, PNG, and GIF are allowed.";
        error_log("ERROR: Invalid new file type: " . $file_extension, 3, $debug_log_file);
    }

    // Validate file size (e.g., max 5MB)
    $max_size = 5 * 1024 * 1024; // 5MB
    if ($file_size > $max_size) {
        $errors[] = "New file size exceeds the maximum limit (5MB).";
        error_log("ERROR: New file size too large: " . $file_size, 3, $debug_log_file);
    }

    // Generate a unique filename
    $new_file_name = uniqid('cover_', true) . '.' . $file_extension;
    $dest_path = $upload_dir . $new_file_name;
    error_log("DEBUG: New file name: " . $new_file_name . ", Destination path: " . $dest_path, 3, $debug_log_file);

    // Ensure upload directory exists and is writable
    if (!is_dir($upload_dir)) {
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
            $cover_image_path = $dest_path; // Store the new path
            error_log("DEBUG: New file moved successfully to: " . $dest_path, 3, $debug_log_file);

            // Delete the old cover image if it exists and is different from the new one
            if ($current_cover_image && file_exists($current_cover_image) && $current_cover_image !== $dest_path) {
                if (unlink($current_cover_image)) {
                    error_log("DEBUG: Old cover image deleted: " . $current_cover_image, 3, $debug_log_file);
                } else {
                    error_log("WARNING: Failed to delete old cover image: " . $current_cover_image, 3, $debug_log_file);
                    // Don't add to user errors, just log
                }
            }

        } else {
            $errors[] = "Error uploading new file.";
            error_log("ERROR: Failed to move new uploaded file from " . $file_tmp_path . " to " . $dest_path, 3, $debug_log_file);
        }
    }

    } else if (isset($_FILES["cover_image"]) && $_FILES["cover_image"]["error"] != UPLOAD_ERR_NO_FILE) {
        // Handle other upload errors for the new file
        $errors[] = "New file upload error: " . $_FILES["cover_image"]["error"];
        error_log("ERROR: New file upload error code: " . $_FILES["cover_image"]["error"], 3, $debug_log_file);
    } else {
        // No new file uploaded, keep the existing one
        $cover_image_path = $current_cover_image;
        error_log("DEBUG: No new cover image uploaded. Keeping existing: " . ($cover_image_path ?? 'None'), 3, $debug_log_file);
    }

    // If no errors and story ID is valid, update database
    if (empty($errors) && $story_id > 0) {
        error_log("DEBUG: No validation or upload errors. Preparing database update for ID: " . $story_id, 3, $debug_log_file);
        // Use $new_content_for_db (which holds the encoded content from POST) for the update query
        $sql = "UPDATE success_stories SET title = :title, content = :content, cover_image = :cover_image WHERE id = :id";

        if ($stmt = $db->prepare($sql)) {
            // Bind parameters
            $stmt->bindParam(":title", $title, PDO::PARAM_STR);
            $stmt->bindParam(":content", $new_content_for_db, PDO::PARAM_STR); // Bind the *encoded* content
            $stmt->bindParam(":cover_image", $cover_image_path, PDO::PARAM_STR);
            $stmt->bindParam(":id", $story_id, PDO::PARAM_INT);

            error_log("DEBUG: Parameters bound for update.", 3, $debug_log_file);

            // Attempt to execute the prepared statement
            try {
                if ($stmt->execute()) {
                    error_log("DEBUG: Success story ID " . $story_id . " updated successfully.", 3, $debug_log_file);
                    // Redirect to view success stories page on success
                    $_SESSION['success_message'] = 'Success story updated successfully.';
                    header("location: dashboard.php?page=view_success_stories"); // Adjust redirect path
                    exit;
                } else {
                    // This block might not be reached with ERRMODE_EXCEPTION
                    $errors[] = "Error updating success story in database.";
                    $pdo_error_info = $stmt->errorInfo();
                    error_log("ERROR: Database update failed (non-exception) for ID " . $story_id . ". Code: " . $pdo_error_info[0] . ", Driver Code: " . $pdo_error_info[1] . ", Message: " . $pdo_error_info[2], 3, $debug_log_file);
                }
            } catch (PDOException $e) {
                $errors[] = "Database error: " . $e->getMessage();
                error_log("ERROR: Database update failed (Exception) for ID " . $story_id . ". Message: " . $e->getMessage() . ", Code: " . $e->getCode(), 3, $debug_log_file);
            }

            // Close statement
            unset($stmt);
            error_log("DEBUG: PDO statement unset after update attempt.", 3, $debug_log_file);

        } else {
            $errors[] = "Database error: Could not prepare update statement.";
            $pdo_error_info = $db->errorInfo();
            error_log("ERROR: Database prepare failed for update. Code: " . $pdo_error_info[0] . ", Driver Code: " . $pdo_error_info[1] . ", Message: " . $pdo_error_info[2], 3, $debug_log_file);
        }
    }

    // If there are errors, store them in session and redirect back to the edit page
    if (!empty($errors)) {
        error_log("DEBUG: Errors occurred during update processing.", 3, $debug_log_file);
        $_SESSION['errors'] = $errors;
        $_SESSION['form_data'] = $_POST; // Optionally store submitted data to repopulate form
        // Redirect back to the edit page with the story ID
        header("location: dashboard?page=edit_success_story&id=" . $story_id);
        exit;
    }

    // Close connection (optional, PHP closes automatically at end of script)
    unset($db); // Unset the $db variable which now points to $pdo
    error_log("DEBUG: PDO connection unset after update attempt.", 3, $debug_log_file);
}

// --- End PHP Form Submission Handling ---


// Get the success story ID from the URL for displaying the form
$story_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Fetch the success story data for initial form load
$story = null;
if ($story_id > 0) {
    try {
        // Fetch from success_stories table
        $stmt = $db->prepare("SELECT id, title, content, cover_image FROM success_stories WHERE id = ?");
        $stmt->execute([$story_id]);
        $story = $stmt->fetch(PDO::FETCH_ASSOC);

        // Decode the content fetched from the database for display in TinyMCE
        // REMOVED: Decoding logic is removed to send raw encoded content to frontend
        // The frontend (TinyMCE) should handle decoding for display.
        // if ($story && isset($story['content']) && !empty($story['content'])) {
        //     $encodedContentFromDb = $story['content'];
        //     $base64Decoded = base64_decode($encodedContentFromDb);
        //     if ($base64Decoded !== false) {
        //         $story['content'] = urldecode($base64Decoded); // Overwrite with decoded content for display
        //         error_log("DEBUG: Fetched content decoded successfully for display.", 3, $debug_log_file);
        //     } else {
        //          error_log("WARNING: Failed to base64 decode fetched content for display.", 3, $debug_log_file);
        //          // Keep the original encoded content if decoding fails, TinyMCE might show it garbled
        //     }
        // } else {
        //      error_log("DEBUG: Fetched story content is empty or not set.", 3, $debug_log_file);
        // }


    } catch (PDOException $e) {
        error_log("Database error fetching success story ID " . $story_id . ": " . $e->getMessage());
        echo "Error retrieving success story data.";
        exit;
    } catch (Exception $e) {
        error_log("General error fetching success story ID " . $story_id . ": " . $e->getMessage());
        echo "An error occurred.";
        exit;
    }
}

if (!$story) {
    echo "Success story not found or invalid ID.";
    // Redirect to view page with an error message
    $_SESSION['error_message'] = 'Success story not found or invalid ID.';
    header('Location: dashboard.php?page=view_success_stories');
    exit;
}

// Check for errors or success messages from a previous POST submission redirect
$errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];
$success_message = isset($_SESSION['success_message']) ? $_SESSION['success_message'] : '';
$form_data = isset($_SESSION['form_data']) ? $_SESSION['form_data'] : [];

// Clear session messages/data after retrieving
unset($_SESSION['errors']);
unset($_SESSION['success_message']);
unset($_SESSION['form_data']);

// Use form_data if available (from a failed submission), otherwise use fetched story data
$display_story = empty($form_data) ? $story : [
    'id' => $story['id'], // Always use the ID from the URL/fetched story
    'title' => $form_data['title'] ?? $story['title'],
    // Decode content from form_data if it exists, otherwise use the decoded content from $story
    // REMOVED: Decoding logic is removed. Use the content from form_data directly (it's already encoded).
    'content' => $form_data['content'] ?? $story['content'], // Use form_data content directly if available, otherwise fetched story content
    'cover_image' => $story['cover_image'] // Always use the fetched image path for display
];

?>

<!DOCTYPE html
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Success Story</title>
    <!-- Add TinyMCE script -->
    <script src="https://cdn.tiny.cloud/1/mjeggepk235yedfjgt7f28fhhw9hjapczs6x8d63uuuar5ch/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <style>
    .edit-blog-container { /* Renamed class for clarity */
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
        max-width: 200px; /* Limit width */
        max-height: 150px; /* Limit height */
        height: auto; /* Maintain aspect ratio */
        width: auto; /* Maintain aspect ratio */
        margin: 10px 0;
        display: block;
        border: 1px solid #eee; /* Add a light border */
        object-fit: cover; /* Cover the area nicely */
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
     .update-btn:disabled {
        background-color: #94d3a2; /* Lighter shade when disabled */
        cursor: not-allowed;
    }


    .cancel-btn {
        background-color: #6c757d;
        color: white;
        padding: 10px 20px;
        border-radius: 4px;
        text-decoration: none;
    }


    /* Add styles for TinyMCE if needed, e.g., ensuring container size */
    .tox-tinymce {
        border: 1px solid #ddd;
        border-radius: 4px;
    }

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
</head>
<body>
    <div class="edit-blog-container">
        <h2>Edit Success Story</h2>

        <?php
        // Display errors from previous submission
        if (!empty($errors)) {
            echo '<div class="alert alert-danger">';
            foreach ($errors as $error) {
                echo "<p>" . htmlspecialchars($error) . "</p>";
            }
            echo '</div>';
        }
        // Display success message
        if (!empty($success_message)) {
            echo '<div class="alert alert-success">' . htmlspecialchars($success_message) . '</div>';
        }
        ?>

        <form id="editStoryForm" method="POST" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?page=edit_success_story&id=' . $display_story['id']; ?>">
            <!-- Pass story ID -->
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($display_story['id']); ?>">
             <!-- Add encoding flag for content -->
            <input type="hidden" name="content_encoding" value="base64">


            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($display_story['title']); ?>" required>
            </div>

            <!-- Removed Category field -->
            <!--
            <div class="form-group">
                <label for="category">Category:</label>
                <select id="category" name="category" required>
                    <option value="trending">Trending</option>
                    <option value="featured">Featured</option>
                    <option value="other">Other</option>
                </select>
            </div>
            -->

            <div class="form-group">
                <label for="cover_image">Cover Image:</label>
                 <!-- Display current image -->
                 <?php if (!empty($display_story['cover_image'])): ?>
                    <img id="currentCover" class="current-cover" src="<?php echo htmlspecialchars($display_story['cover_image']); ?>" alt="Current cover image">
                 <?php else: ?>
                     <img id="currentCover" class="current-cover" src="" alt="Current cover image" style="display: none;">
                 <?php endif; ?>
                 <input type="file" id="cover_image" name="cover_image" accept="image/*">
                 <small>Upload a new image to replace the current one. Leave empty to keep the existing image.</small>
            </div>

            <div class="form-group">
                <label for="content">Content:</label>
                <!-- Ensure htmlspecialchars() is NOT used here -->
                <textarea id="content" name="content"><?php echo $display_story['content']; ?></textarea>
            </div>

            <div class="form-actions">
                <button type="submit" class="update-btn">Update Story</button>
                <a href="dashboard.php?page=view_success_stories" class="cancel-btn">Cancel</a>
            </div>
        </form>
    </div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // No need to get data from hidden input anymore, PHP populates form directly
    // const storyDataElement = document.getElementById('storyData'); // Removed
    // const story = { ... }; // Removed

    // Initialize TinyMCE
    tinymce.init({
        selector: '#content',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
        toolbar: 'undo redo | blocks | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        height: 400,
        // Image Upload Configuration
        // Corrected path to upload_images.php
        images_upload_url: 'upload_images.php', // Crucial: Your backend endpoint for image uploads within TinyMCE
        automatic_uploads: true,
        file_picker_types: 'image',
        setup: function (editor) {
            // Set initial content once the editor is ready
            editor.on('init', function () {
                // Get content directly from the textarea populated by PHP
                const initialContent = document.getElementById('content').value;
                editor.setContent(initialContent || ''); // Ensure it handles null/empty content
            });
        }
    });

    // Form submission handler (using TinyMCE)
    // We will now use standard form submission, but still need to encode content
    document.getElementById('editStoryForm').addEventListener('submit', function(e) {
        // Prevent default submission temporarily to encode content
        e.preventDefault();

        console.log('Update form submission started (encoding content)');
        const submitButton = this.querySelector('button[type="submit"]');
        submitButton.disabled = true;
        submitButton.textContent = 'Processing...';

        try {
            // Get current content from TinyMCE
            const newContent = tinymce.get('content').getContent();

            // --- Encode the new content ---
            let encodedContent = '';
            try {
                 // Ensure UTF-8 compatibility before btoa
                // Using encodeURIComponent and btoa is the standard way
                encodedContent = btoa(encodeURIComponent(newContent)); // Corrected encoding
                console.log('Content encoded successfully for update.');
            } catch (encodeError) {
                console.error("Error encoding content for update:", encodeError);
                alert('Failed to encode content before sending update.');
                submitButton.disabled = false;
                submitButton.textContent = 'Update Story';
                return; // Stop submission
            }
            // --- End Encoding ---

            // Set the encoded content back into the content textarea
            document.getElementById('content').value = encodedContent;

            // The form will now submit normally via POST
            this.submit();

        } catch (error) {
            console.error('Error during content encoding for submission:', error);
            alert('An error occurred before submitting: ' + error.message);
            submitButton.disabled = false;
            submitButton.textContent = 'Update Story';
        }
    });

    // Removed the removed_images logic as it was tied to the AJAX fetch approach
    // If you need to handle image deletion from content, you'll need a different strategy
    // (e.g., server-side parsing of content or a separate image management feature).
});
</script>
</body>
</html>
    