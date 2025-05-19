<?php
// This script handles image uploads from the TinyMCE editor

// Define upload directory (relative to this PHP file's location)
// IMPORTANT: Ensure this directory exists and is writable by the web server!
$upload_dir = '../uploads/success_stories/'; // Using the same directory as add_success_story.php

// Set response header to JSON
header('Content-Type: application/json');

// Check if the file was uploaded via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $file = $_FILES['file'];

    // Check for upload errors
    if ($file['error'] !== UPLOAD_ERR_OK) {
        // Handle various upload errors
        $error_message = 'File upload failed with error code ' . $file['error'];
        switch ($file['error']) {
            case UPLOAD_ERR_INI_SIZE:
            case UPLOAD_ERR_FORM_SIZE:
                $error_message = 'Uploaded file exceeds maximum size.';
                break;
            case UPLOAD_ERR_PARTIAL:
                $error_message = 'File was only partially uploaded.';
                break;
            case UPLOAD_ERR_NO_FILE:
                $error_message = 'No file was uploaded.';
                break;
            case UPLOAD_ERR_NO_TMP_DIR:
                $error_message = 'Missing a temporary folder.';
                break;
            case UPLOAD_ERR_CANT_WRITE:
                $error_message = 'Failed to write file to disk.';
                break;
            case UPLOAD_ERR_EXTENSION:
                $error_message = 'A PHP extension stopped the file upload.';
                break;
        }
        echo json_encode(['error' => $error_message]);
        exit;
    }

    // Validate file type (basic check)
    $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
    $file_extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    if (!in_array($file_extension, $allowed_types)) {
        echo json_encode(['error' => 'Invalid file type. Only JPG, JPEG, PNG, and GIF are allowed.']);
        exit;
    }

    // Validate file size (e.g., max 5MB) - Adjust as needed
    $max_size = 5 * 1024 * 1024; // 5MB
    if ($file['size'] > $max_size) {
        echo json_encode(['error' => 'File size exceeds the maximum limit (5MB).']);
        exit;
    }

    // Ensure upload directory exists and is writable
    if (!is_dir($upload_dir)) {
        // Attempt to create the directory if it doesn't exist
        if (!mkdir($upload_dir, 0755, true)) {
             echo json_encode(['error' => 'Upload directory does not exist and could not be created.']);
             exit;
        }
    }

    // Generate a unique filename
    $new_file_name = uniqid('editor_img_', true) . '.' . $file_extension;
    $dest_path = $upload_dir . $new_file_name;

    // Move the uploaded file
    if (move_uploaded_file($file['tmp_name'], $dest_path)) {
        // Success: Return the URL of the saved image
        // Construct the URL relative to the web root or domain
        // Assuming the 'uploads' folder is directly under the web root
        $image_url = '../uploads/success_stories/' . $new_file_name; // Adjust path if needed

        echo json_encode(['location' => $image_url]);
        exit;
    } else {
        // Error moving file
        echo json_encode(['error' => 'Error saving the uploaded file.']);
        exit;
    }

} else {
    // No file uploaded or not a POST request
    echo json_encode(['error' => 'No file uploaded or invalid request method.']);
    exit;
}
?>