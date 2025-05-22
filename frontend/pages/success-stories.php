<?php
$title = "Success Stories";
ob_start();

// Include the database connection file
require_once __DIR__ . '/../../backend/connection.php'; // Adjust path as necessary

// --- Pagination Setup ---
$items_per_page = 6; // Number of success stories per page

// Get current page number from URL, default to 1
$current_page = isset($_GET['p']) ? (int)$_GET['p'] : 1;
$current_page = max(1, $current_page); // Ensure page number is at least 1

// Calculate the offset for the SQL query
$offset = ($current_page - 1) * $items_per_page;

// --- Fetch Success Stories for the current page ---
$successStories = []; // Initialize an empty array
// Modified SQL query to include LIMIT and OFFSET for pagination
$sql = "SELECT * FROM success_stories ORDER BY created_at DESC LIMIT :limit OFFSET :offset";

try {
    if ($stmt = $pdo->prepare($sql)) {
        // Bind parameters for LIMIT and OFFSET
        $stmt->bindParam(':limit', $items_per_page, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $successStories = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            echo "<p>Error fetching success stories.</p>";
            // In a production environment, log the error: error_log("Error executing success stories query: " . print_r($stmt->errorInfo(), true));
        }
    } else {
        echo "<p>Database error: Could not prepare statement for fetching stories.</p>";
        // In a production environment, log the error: error_log("Error preparing success stories query: " . print_r($pdo->errorInfo(), true));
    }
} catch (PDOException $e) {
    echo "<p>Database error: " . $e->getMessage() . "</p>";
    // In a production environment, log the error: error_log("Database exception fetching success stories: " . $e->getMessage());
}

// --- Fetch Total Number of Success Stories for Pagination ---
$total_stories = 0;
$sql_count = "SELECT COUNT(*) FROM success_stories";
try {
    if ($stmt_count = $pdo->prepare($sql_count)) {
        if ($stmt_count->execute()) {
            $total_stories = $stmt_count->fetchColumn();
        } else {
             echo "<p>Error fetching total story count.</p>";
             // In a production environment, log the error: error_log("Error executing count query: " . print_r($stmt_count->errorInfo(), true));
        }
    } else {
         echo "<p>Database error: Could not prepare statement for counting stories.</p>";
         // In a production environment, log the error: error_log("Error preparing count query: " . print_r($pdo->errorInfo(), true));
    }
} catch (PDOException $e) {
    echo "<p>Database error: " . $e->getMessage() . "</p>";
    // In a production environment, log the error: error_log("Database exception counting stories: " . $e->getMessage());
}


// Calculate total number of pages
$total_pages = ceil($total_stories / $items_per_page);

// Close connection (optional, PHP closes automatically at end of script)
unset($pdo);

?>
<link rel="stylesheet" href="<?= BASE_URL ?>frontend/css/succ.css">
<div class="success-stories-page">
    <!-- Content Section -->
    <div class="content">
        <div class="breadcrumb">
            <span class="news-tag">success</span>
        </div>
        <div class="main-content">
            <h1>Success Stories</h1>
            <div class="categories">
                <h2>Categories</h2>
                <select>
                    <option>Select Category</option>
                    <option>Community (546)</option>
                    <option>Events (172)</option>
                    <option>Media & PR (177)</option>
                    <option>Moodle Partners (204)</option>
                    <option>Product (84)</option>
                    <option>Moodle Academy (67)</option>
                    <option>Moodle App (50)</option>
                    <option>Moodle LMS (299)</option>
                    <option>Moodle Qualifications (MQ) (5)</option>
                    <option>Moodle Workplace (112)</option>
                    <option>MoodleCloud (22)</option>
                    <option>MoodleNet (16)</option>
                    <option>Resources (6)</option>
                    <option>How-to Videos (1)</option>
                    <option>Podcasts (4)</option>
                </select>
            </div>
        </div>
    </div>

    <!-- News Cards Section -->
    <div class="news-cards">
        <?php if (!empty($successStories)): ?>
            <?php foreach ($successStories as $story): ?>
                <div class="news-item">
                    <div class="image-container">
                        <img src="<?= BASE_URL ?>frontend/<?= htmlspecialchars($story['cover_image']) ?>" alt="<?= htmlspecialchars($story['title']) ?>">
                        <div class="tags">
                            <!-- You might need to fetch tags from another table or add a tags column -->
                            <!-- For now, using static tags or you can remove this div if not needed -->
                            <span class="tag workplace">Moodle Workplace</span>
                            <span class="tag learning">Workplace Learning</span>
                        </div>
                    </div>
                    <div class="news-content">
                        <!-- Assuming 'created_at' is the date column -->
                        <div class="date"><?= date('d F Y', strtotime($story['created_at'])) ?></div>
                        <a href="success-stories-details.php?id=<?= $story['id'] ?>">
                            <h3><?= htmlspecialchars($story['title']) ?></h3>
                        </a>
                        <!-- Display a truncated version of the content -->
                        <p><?= substr(strip_tags($story['content']), 0, 150) ?>...</p>
                         <!-- Add a link to view the full story if you have a dedicated page -->
                         <!-- <a href="view_story.php?id=<?= $story['id'] ?>">Read More</a> -->
                         <!-- Updated link to point to the details page -->
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No success stories found.</p>
        <?php endif; ?>
    </div>
    </div>
    <!-- Pagination -->
    <div class="pagination">
        <?php if ($total_pages > 1): ?>
            <?php
            // Define how many page links to show around the current page
            $range = 2;
            $start_range = max(1, $current_page - $range);
            $end_range = min($total_pages, $current_page + $range);
            ?>

            <!-- First Page Link -->
            <?php if ($current_page > 1): ?>
                <a href="?p=1" class="page-link">First</a>
            <?php endif; ?>

            <!-- Previous Page Link -->
            <?php if ($current_page > 1): ?>
                <a href="?p=<?= $current_page - 1 ?>" class="page-link">&lt;</a>
            <?php endif; ?>

            <!-- Page Links -->
            <?php for ($i = $start_range; $i <= $end_range; $i++): ?>
                <a href="?p=<?= $i ?>" class="page-link <?= ($i == $current_page) ? 'active' : '' ?>"><?= $i ?></a>
            <?php endfor; ?>

            <!-- Next Page Link -->
            <?php if ($current_page < $total_pages): ?>
                <a href="?p=<?= $current_page + 1 ?>" class="page-link">&gt;</a>
            <?php endif; ?>

            <!-- Last Page Link -->
            <?php if ($current_page < $total_pages): ?>
                <a href="?p=<?= $total_pages ?>" class="page-link">Last</a>
            <?php endif; ?>

        <?php endif; ?>
    </div>
</div>
<?php
$content = ob_get_clean();
require_once __DIR__ . '/../partials/base.php';
?>