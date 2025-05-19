<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Include the database connection file
require_once 'connection.php';

// Check if the user is logged in and is an admin/superuser (adjust condition as per your auth logic)
// Assuming admin_id and is_superuser are used for authentication
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || !isset($_SESSION["role"]) || $_SESSION["role"] !== 'admin') {
    // Redirect to login page or show an access denied message
    header("location: login.php"); // Adjust redirect path as needed
    exit;
}

// Fetch all success stories
// Use the $pdo connection from connection.php
$sql = "SELECT * FROM success_stories ORDER BY created_at DESC";

if ($stmt = $pdo->prepare($sql)) {
    // Attempt to execute the prepared statement
    try {
        if ($stmt->execute()) {
            $successStories = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            // Handle execution error
            // In a production environment, log this error
            echo "Error fetching success stories.";
            // Optionally, log the error details: $stmt->errorInfo();
            exit;
        }
    } catch (PDOException $e) {
        // Handle database exception
        // In a production environment, log this error
        echo "Database error: " . $e->getMessage();
        exit;
    }

    // Close statement
    unset($stmt);

} else {
    // Handle prepare error
    // In a production environment, log this error
    echo "Database error: Could not prepare statement.";
    // Optionally, log the error details: $pdo->errorInfo();
    exit;
}

// Close connection (optional, PHP closes automatically at end of script)
unset($pdo);

?>

<div class="blogs-container">
    <div class="blogs-wrapper">
        <?php foreach ($successStories as $story): ?>
            <div class="blog-card" data-blog-id="<?= $story['id'] ?>">
                <div class="blog-content">
                    <div class="blog-left">
                        <img src="<?= htmlspecialchars($story['cover_image']) ?>"
                             alt="Success Story thumbnail"
                             class="blog-image">
                        <div class="blog-text">
                            <h3><?= htmlspecialchars($story['title']) ?></h3>
                            <p><?= substr(strip_tags($story['content']), 0, 150) ?>...</p>
                        </div>
                    </div>

                    <div class="blog-actions">
                        <a href="?page=edit_success_story&id=<?= $story['id'] ?>" class="edit-btn">
                            Edit
                        </a>
                        <button onclick="deleteSuccessStory(<?= $story['id'] ?>)" class="delete-btn">
                            Delete
                        </button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<style>
.blogs-container {
    background-color: #f8f9fa;
    min-height: calc(100vh - 64px);
    padding: 24px;
}

.blogs-wrapper {
    max-width: 1024px;
    margin: 0 auto;
}

.blog-card {
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0 1px 2px rgba(0,0,0,0.05);
    margin-bottom: 16px;
    padding: 16px;
}

.blog-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.blog-left {
    display: flex;
    align-items: center;
    gap: 16px;
}

.blog-image {
    width: 64px;
    height: 64px;
    object-fit: cover;
    border-radius: 4px;
}

.blog-text h3 {
    color: #2B303A;
    font-size: 18px;
    font-weight: 600;
    margin: 0 0 4px 0;
}

.blog-text p {
    color: #666;
    font-size: 14px;
    margin: 0;
}

.blog-actions {
    display: flex;
    align-items: center;
    gap: 8px;
}

.edit-btn {
    background-color: #28a745;
    color: white;
    border: none;
    border-radius: 4px;
    padding: 6px 16px;
    font-size: 14px;
    cursor: pointer;
    transition: background-color 0.2s;
}

.edit-btn:hover {
    background-color: #218838;
}

.delete-btn {
    background-color: #0d6efd;
    color: white;
    border: none;
    border-radius: 4px;
    padding: 6px 16px;
    font-size: 14px;
    cursor: pointer;
    transition: background-color 0.2s;
}

.delete-btn:hover {
    background-color: #0b5ed7;
}

.more-btn {
    background: none;
    border: none;
    color: #666;
    padding: 8px;
    cursor: pointer;
    transition: color 0.2s;
}

.more-btn:hover {
    color: #333;
}

.fa-ellipsis-v {
    font-size: 18px;
}
</style>

<script>
// Changed function name
async function deleteSuccessStory(storyId) {
    if (!confirm('Are you sure you want to delete this success story?')) { // Changed confirmation message
        return;
    }

    try {
        // Assuming a new endpoint for deleting success stories exists or will be created
        const response = await fetch('delete_success_story.php', { // Changed endpoint URL to include .php
            method: 'POST',
            headers: { // Add Content-Type header for JSON
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ id: storyId }) // Send data as JSON
        });

        const data = await response.json();
        
        if (data.status === 'success') {
            // Remove the story card from the DOM
            const storyCard = document.querySelector(`[data-blog-id="${storyId}"]`); // Keep data-blog-id for now or update HTML
            if (storyCard) {
                storyCard.remove();
            } else {
                location.reload(); // Fallback if element not found
            }
        } else {
            throw new Error(data.message || 'Failed to delete success story'); // Changed error message
        }
    } catch (error) {
        console.error('Error:', error);
        alert('Failed to delete success story: ' + error.message); // Changed alert message
    }
}
</script>