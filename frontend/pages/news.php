<?php
$title = "News";
ob_start();
require_once __DIR__ . '/../../backend/connection.php';
?>
<link rel="stylesheet" href="<?= BASE_URL ?>frontend/css/news.css">
<div class="news-page">
    <!-- Content Section -->
    <div class="content">
        <div class="breadcrumb">
            <span class="news-tag">News</span>
        </div>
        <div class="main-content">
            <h1>Catch up on the latest news, success stories and more.</h1>
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
        <div class="news-item">
            <div class="image-container">
                <img src="<?= BASE_URL ?>frontend/images/Copy-of-MMG25-blog-thumbnail-templates-1-550x412.webp" alt="Moot Session">
                <div class="tags">
                    <span class="tag community">Community</span>
                    <span class="tag events">Events</span>
                </div>
            </div>
            <div class="news-content">
                <div class="date">14 May 2025</div>
                <h3>What makes a great Moot session? Tips from past presenters</h3>
            </div>
        </div>

        <div class="news-item">
            <div class="image-container">
                <img src="<?= BASE_URL ?>frontend/images/Copy-of-MMG25-blog-thumbnail-templates-550x412.webp" alt="MoodleMoot 2025">
                <div class="tags">
                    <span class="tag community">Community</span>
                    <span class="tag events">Events</span>
                </div>
            </div>
            <div class="news-content">
                <div class="date">07 May 2025</div>
                <h3>5 reasons you can't miss MoodleMoot Global 2025</h3>
            </div>
        </div>

        <div class="news-item">
            <div class="image-container">
                <img src="<?= BASE_URL ?>frontend/images/Join-us-at-550x412.webp" alt="GESS Saudi Arabia">
                <div class="tags">
                    <span class="tag community">Community</span>
                    <span class="tag events">Events</span>
                </div>
            </div>
            <div class="news-content">
                <div class="date">01 May 2025</div>
                <h3>Moodle takes off for GESS Saudi Arabia 2025: Meet us in Riyadh</h3>
            </div>
        </div>
    </div>

    <!-- News Cards Section -->
    <div class="news-cards">
        <div class="news-item">
            <div class="image-container">
                <img src="<?= BASE_URL ?>frontend/images/Generic-Blog-Thumbnails-550x412.jpg" alt="MoodleMoot Global 2025">
                <div class="tags">
                    <span class="tag community">Community</span>
                    <span class="tag events">Events</span>
                </div>
            </div>
            <div class="news-content">
                <div class="date">28 April 2025</div>
                <h3>Shape the future of learning at MoodleMoot Global 2025: Call for proposals now open</h3>
            </div>
        </div>

        <div class="news-item">
            <div class="image-container">
                <img src="<?= BASE_URL ?>frontend/images/MMG25-blog-thumbnail-templates-550x412.webp" alt="Employee Training Features">
                <div class="tags">
                    <span class="tag community">Community</span>
                </div>
            </div>
            <div class="news-content">
                <div class="date">25 April 2025</div>
                <h3>9 must-have employee training software features (and why they matter)</h3>
            </div>
        </div>

        <div class="news-item">
            <div class="image-container">
                <img src="<?= BASE_URL ?>frontend/images/Untitled-design-15-550x412.webp" alt="Employee Training Software">
                <div class="tags">
                    <span class="tag workplace">Moodle Workplace</span>
                    <span class="tag learning">Workplace Learning</span>
                </div>
            </div>
            <div class="news-content">
                <div class="date">25 April 2025</div>
                <h3>All the employee training software, explained</h3>
            </div>
        </div>

        <div class="news-item">
            <div class="image-container">
                <img src="<?= BASE_URL ?>frontend/images/Istanbul_Turkey-550x412.jpg" alt="Kliksoft Joins Moodle">
                <div class="tags">
                    <span class="tag community">Community</span>
                    <span class="tag partners">Moodle Partners</span>
                </div>
            </div>
            <div class="news-content">
                <div class="date">17 April 2025</div>
                <h3>Kliksoft Joins Global Moodle Partner Network to Power Digital Learning in Türkiye</h3>
            </div>
        </div>

        <div class="news-item">
            <div class="image-container">
                <img src="<?= BASE_URL ?>frontend/images/learning.jpg" alt="Learning to Shape Tomorrow">
                <div class="tags">
                    <span class="tag community">Community</span>
                    <span class="tag events">Events</span>
                </div>
            </div>
            <div class="news-content">
                <div class="date">17 April 2025</div>
                <h3>Learning to Shape Tomorrow at MoodleMoot Global 2025</h3>
            </div>
        </div>

        <div class="news-item">
            <div class="image-container">
                <img src="<?= BASE_URL ?>frontend/images/What-is-MoodleMoot-Global-550x412.jpg" alt="Convince Your Manager">
                <div class="tags">
                    <span class="tag community">Community</span>
                    <span class="tag events">Events</span>
                </div>
            </div>
            <div class="news-content">
                <div class="date">16 April 2025</div>
                <h3>How to convince your manager to send you to MoodleMoot Global 2025</h3>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    <div class="pagination">
        <a href="#" class="page-link">First</a>
        <a href="#" class="page-link">&lt;</a>
        <a href="#" class="page-link active">1</a>
        <a href="#" class="page-link">2</a>
        <a href="#" class="page-link">3</a>
        <span class="ellipsis">...</span>
        <a href="#" class="page-link">99</a>
        <a href="#" class="page-link">100</a>
        <a href="#" class="page-link">&gt;</a>
        <a href="#" class="page-link">Last</a>
    </div>

    <!-- Newsletter Section -->
    <div class="newsletter">
        <div class="newsletter-content">
            <div class="newsletter-text">
                <span class="tag-label">Moodle news</span>
                <h2>Subscribe to our monthly newsletter</h2>
                <p>Read community news and announcements about Moodle products, services, and events.</p>
                <a href="#" class="sign-up">Sign up <i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="newsletter-image">
                <img src="<?= BASE_URL ?>frontend/images/back.webp" alt="Newsletter Illustration">
            </div>
        </div>
    </div>
    </div>
</div>
<?php
$content = ob_get_clean();
require_once __DIR__ . '/../partials/base.php';
?>