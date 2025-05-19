<?php
// Start output buffering
ob_start();
// Ensure session is started if not already
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Include the database connection file
require_once 'connection.php';

// Define the path for the custom debug log file (using the one from connection.php or defining here)
// Assuming connection.php defines $debug_log_file, otherwise define it here:
$debug_log_file = 'debug.log'; // <-- **CHANGE THIS PATH FOR PRODUCTION**

// Debug logging (optional, can be removed in production)
error_log("=== Debug Session Info (delete_success_story.php) ===", 3, $debug_log_file);
error_log("Session contents: " . print_r($_SESSION, true), 3, $debug_log_file);
error_log("loggedin exists: " . (isset($_SESSION['loggedin']) ? 'yes' : 'no'), 3, $debug_log_file);
error_log("loggedin value: " . (isset($_SESSION['loggedin']) ? $_SESSION['loggedin'] : 'not set'), 3, $debug_log_file);
error_log("role exists: " . (isset($_SESSION['role']) ? 'yes' : 'no'), 3, $debug_log_file);
error_log("role value: " . (isset($_SESSION['role']) ? $_SESSION['role'] : 'not set'), 3, $debug_log_file);


// Check if the user is logged in and is an admin
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || !isset($_SESSION["role"]) || $_SESSION["role"] !== 'admin') {
    // Redirect to login page or show an access denied message
    error_log("DEBUG: User not logged in or not admin. Access denied for delete_success_story.php", 3, $debug_log_file);
    // For an AJAX endpoint, return an error response instead of redirecting
    header('Content-Type: application/json');
    echo json_encode(['status' => 'error', 'message' => 'Access denied. You must be logged in as an admin.']);
    exit;
}

// Get database connection (using $pdo from connection.php)
$db = $pdo; // Use the $pdo connection provided by connection.php

// Get JSON data
$data = json_decode(file_get_contents('php://input'), true);
$storyId = isset($data['id']) ? (int)$data['id'] : null; // Changed variable name

// Define upload directory (relative to this PHP file's location)
$upload_dir = '../uploads/success_stories/'; // Corrected upload directory

if ($storyId) { // Changed variable name
    try {
        $db->beginTransaction();

        // Get success story content and cover image before deletion
        // Changed table name
        $stmt = $db->prepare("SELECT content, cover_image FROM success_stories WHERE id = ?");
        $stmt->execute([$storyId]); // Changed variable name
        $story = $stmt->fetch(PDO::FETCH_ASSOC); // Changed variable name

        if ($story) { // Changed variable name
            // Extract all image URLs from content
            // We need to decode the content first if it's stored encoded (like in add/edit)
            $decoded_content = '';
            error_log("DEBUG: Raw content from DB for ID " . $storyId . ": " . (isset($story['content']) ? substr($story['content'], 0, 500) . (strlen($story['content']) > 500 ? '...' : '') : 'Not set'), 3, $debug_log_file); // Log raw content

            if (!empty($story['content'])) { // Changed variable name
                 // --- REMOVED BASE64 DECODING ---
                 // The log shows content is NOT base64 encoded when fetched for deletion.
                 // Use the raw content directly for image extraction.
                 $decoded_content = $story['content']; // Use raw content
                 error_log("DEBUG: Using raw content from DB for image deletion check.", 3, $debug_log_file); // Added log
                 // --- END REMOVED BASE64 DECODING ---
            }
            error_log("DEBUG: Final content used for image check: " . substr($decoded_content, 0, 500) . (strlen($decoded_content) > 500 ? '...' : ''), 3, $debug_log_file); // Log final content


            // Use DOMDocument for robust HTML parsing to find images
            $srcs = [];
            if (!empty($decoded_content)) {
                $dom = new DOMDocument();
                // Suppress warnings for malformed HTML
                libxml_use_internal_errors(true);
                // Add a wrapper div to handle cases where the HTML might not have a single root element
                $dom->loadHTML('<?xml encoding="utf-8" ?><div>' . $decoded_content . '</div>', LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
                libxml_clear_errors();

                $images = $dom->getElementsByTagName('img');
                foreach ($images as $img) {
                    $src = $img->getAttribute('src');
                    if (!empty($src)) {
                        $srcs[] = $src;
                    }
                }
            }

            error_log("DEBUG: Extracted content image srcs for deletion: " . print_r($srcs, true), 3, $debug_log_file); // Added log

            // Delete content images from uploads directory
            if (!empty($srcs)) {
                foreach ($srcs as $imageUrl) {
                    // Extract filename from URL
                    $filename = basename(parse_url($imageUrl, PHP_URL_PATH));
                    // Corrected image path relative to this script
                    $imagePath = __DIR__ . '/../uploads/success_stories/' . $filename;

                    error_log("DEBUG: Attempting to delete content image: " . $imagePath, 3, $debug_log_file); // Added log

                    if (file_exists($imagePath)) {
                        error_log("DEBUG: Content image file exists: " . $imagePath, 3, $debug_log_file); // Added log
                        if (unlink($imagePath)) {
                            error_log("DEBUG: Deleted content image: " . $imagePath, 3, $debug_log_file);
                        } else {
                            error_log("WARNING: Failed to delete content image: " . $imagePath . ". Check file permissions.", 3, $debug_log_file); // Added permission hint
                        }
                    } else {
                         error_log("DEBUG: Content image not found, skipping deletion: " . $imagePath, 3, $debug_log_file);
                    }
                }
            }

            // Delete cover image if exists
            if ($story['cover_image']) { // Changed variable name
                // Extract filename from cover image URL
                $coverFilename = basename(parse_url($story['cover_image'], PHP_URL_PATH)); // Changed variable name
                // Corrected cover image path relative to this script
                $coverImagePath = __DIR__ . '/../uploads/success_stories/' . $coverFilename;

                error_log("DEBUG: Attempting to delete cover image: " . $coverImagePath, 3, $debug_log_file); // Added log

                if (file_exists($coverImagePath)) {
                    error_log("DEBUG: Cover image file exists: " . $coverImagePath, 3, $debug_log_file); // Added log
                    if (unlink($coverImagePath)) {
                        error_log("DEBUG: Deleted cover image: " . $coverImagePath, 3, $debug_log_file);
                    } else {
                        error_log("WARNING: Failed to delete cover image: " . $coverImagePath . ". Check file permissions.", 3, $debug_log_file); // Added permission hint
                    }
                } else {
                     error_log("DEBUG: Cover image not found, skipping deletion: " . $coverImagePath, 3, $debug_log_file);
                }
            }

            // Delete success story from database
            // Changed table name
            $stmt = $db->prepare("DELETE FROM success_stories WHERE id = ?");
            $stmt->execute([$storyId]); // Changed variable name

            $db->commit();
            // Return success JSON response
            header('Content-Type: application/json');
            echo json_encode(['status' => 'success', 'message' => 'Success story deleted successfully.']); // Changed message
            error_log("DEBUG: Success story ID " . $storyId . " deleted successfully.", 3, $debug_log_file); // Changed variable name and message
        } else {
            // Success story not found
            $db->rollBack();
            header('Content-Type: application/json');
            echo json_encode(['status' => 'error', 'message' => 'Success story not found.']); // Changed message
            error_log("ERROR: Success story ID " . $storyId . " not found for deletion.", 3, $debug_log_file); // Changed variable name and message
        }

    } catch (Exception $e) {
        $db->rollBack();
        // Return error JSON response
        header('Content-Type: application/json');
        echo json_encode(['status' => 'error', 'message' => 'Error deleting success story: ' . $e->getMessage()]); // Changed message
        error_log("ERROR: Error deleting success story ID " . $storyId . ": " . $e->getMessage(), 3, $debug_log_file); // Changed variable name and message
    }
} else {
    // Invalid ID
    header('Content-Type: application/json');
    echo json_encode(['status' => 'error', 'message' => 'Error: Invalid success story ID provided.']); // Changed message
    error_log("ERROR: Invalid success story ID provided for deletion.", 3, $debug_log_file); // Changed message
}
exit;
?>
