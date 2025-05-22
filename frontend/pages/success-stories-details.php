<?php
$title = "Success Story Details";
ob_start();

// Include the database connection file
require_once __DIR__ . '/../../backend/connection.php'; // Adjust path as necessary

// Get the success story ID from the URL
$story_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$story = null;
if ($story_id > 0) {
    $sql = "SELECT * FROM success_stories WHERE id = :id LIMIT 1";
    try {
        if ($stmt = $pdo->prepare($sql)) {
            $stmt->bindParam(':id', $story_id, PDO::PARAM_INT);
            if ($stmt->execute()) {
                $story = $stmt->fetch(PDO::FETCH_ASSOC);
            } else {
                // Handle execution error
                echo "<p>Error fetching success story.</p>";
                // In a production environment, log the error
                // error_log("Error executing success story details query: " . print_r($stmt->errorInfo(), true));
            }
        } else {
            // Handle prepare error
            echo "<p>Database error: Could not prepare statement for fetching story details.</p>";
            // In a production environment, log the error
            // error_log("Error preparing success story details query: " . print_r($pdo->errorInfo(), true));
        }
    } catch (PDOException $e) {
        // Handle database exception
        echo "<p>Database error: " . $e->getMessage() . "</p>";
        // In a production environment, log the error
        // error_log("Database exception fetching story details: " . $e->getMessage());
    }
}

// Close connection
unset($pdo);

?>
<link rel="stylesheet" href="<?= BASE_URL ?>frontend/css/succ-details.css">

<div class="success-story-details-page">
    <?php if ($story): ?>
        <div class="content">
            <div class="breadcrumb">
                <a href="/">Home</a> / <a href="success-stories.php">Success Stories</a> / <span><?= htmlspecialchars($story['title']) ?></span>
            </div>

            <div class="main-content">
                <!-- Tags -->
                <div class="tags">
                    <!-- Assuming tags are not stored in DB, using static for now -->
                    <span class="tag workplace">Moodle Workplace</span>
                    <span class="tag learning">Workplace Learning</span>
                </div>

                <!-- Main Story Title - Placed at the top left as requested -->
                <h1><?= htmlspecialchars($story['title']) ?></h1>

                <div class="meta-info">
                    <span class="date"><?= date('F d, Y', strtotime($story['created_at'])) ?></span> BY <span class="author">JANE ROBATHAN</span> <!-- Author is hardcoded as per image -->
                </div>

                <!-- Story Body - Container for the two-column layout -->
                <div class="story-body">
                    <!-- "On this page" section - Intended for the left column -->
                    <div class="on-this-page">
                        <h2>On this page</h2>
                        <!-- This section would ideally be dynamically generated from headings (e.g., <h2>, <h3>) -->
                        <!-- within the $story['content'] using JavaScript or server-side parsing. -->
                        <!-- For now, it remains a static placeholder as per the previous implementation. -->
                        <ul>
                            <li><a href="#">What kind of corporate training software is around?</a></li>
                            <li><a href="#">Why advanced tracking and reporting features matter</a></li>
                            <li><a href="#">What causes training programmes to fail?</a></li>
                            <li><a href="#">Get connected to your workforce</a></li>
                        </ul>
                    </div>

                    <!-- Main Story Content - Intended for the right column -->
                    <div class="story-content">
                        <?php
                        // Display the cover image if it exists
                        // The code to display the cover image has been removed as requested.
                        ?>
                        <!-- Display the main content (assuming it's stored as HTML) -->
                        <?= $story['content'] ?>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="content">
            <p>Success story not found.</p>
        </div>
    <?php endif; ?>
</div>
<script src="<?= BASE_URL ?>frontend/js/success-stories-details.js"></script>
<?php
$content = ob_get_clean();
require_once __DIR__ . '/../partials/base.php';
?>
