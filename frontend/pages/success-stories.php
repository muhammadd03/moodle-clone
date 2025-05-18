<?php
$title = "Success Stories";
ob_start();
?>
<link rel="stylesheet" href="../css/succ.css">
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
        <div class="news-item">
            <div class="image-container">
                <img src="../images/Generic-Blog-Thumbnails-550x412.jpg" alt="Employee Training Software">
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
                <img src="../images/people.jpg" alt="Corporate LMS">
                <div class="tags">
                    <span class="tag workplace">Moodle Workplace</span>
                    <span class="tag learning">Workplace Learning</span>
                </div>
            </div>
            <div class="news-content">
                <div class="date">25 April 2025</div>
                <h3>Choosing a corporate LMS: The features you need and why</h3>
            </div>
        </div>

        <div class="news-item">
            <div class="image-container">
                <img src="../images/sab.webp" alt="SABIER and MoodleCloud">
                <div class="tags">
                    <span class="tag school">School</span>
                    <span class="tag stories">Success Stories</span>
                </div>
            </div>
            <div class="news-content">
                <div class="date">28 January 2025</div>
                <h3>SABIER and MoodleCloud: Advancing literacy through scalable, inclusive education in Africa</h3>
            </div>
        </div>
    </div>
    <!-- News Cards Section -->
    

        <!-- Additional News Cards Section -->
        <div class="news-cards">
            <div class="news-item">
                <div class="image-container">
                    <img src="../images/4.webp" alt="LaLiga">
                    <div class="tags">
                        <span class="tag stories">Success Stories</span>
                        <span class="tag learning">Workplace Learning</span>
                    </div>
                </div>
                <div class="news-content">
                    <div class="date">14 November 2024</div>
                    <h3>How Moodle Workplace and iThinkUPC supported LaLIGA in their vision for a unified learning platform</h3>
                </div>
            </div>
    
            <div class="news-item">
                <div class="image-container">
                    <img src="../images/5.jpeg" alt="Gen Z Workplace Training">
                    <div class="tags">
                        <span class="tag products">Products</span>
                        <span class="tag learning">Workplace Learning</span>
                    </div>
                </div>
                <div class="news-content">
                    <div class="date">23 August 2024</div>
                    <h3>What does Gen Z want from workplace training?</h3>
                </div>
            </div>
    
            <div class="news-item">
                <div class="image-container">
                    <img src="../images/6.webp" alt="Safety and Compliance">
                    <div class="tags">
                        <span class="tag stories">Success Stories</span>
                        <span class="tag learning">Workplace Learning</span>
                    </div>
                </div>
                <div class="news-content">
                    <div class="date">22 March 2024</div>
                    <h3>Streamlining safety and compliance with Moodle – a success story for the State Labour Inspectorate of the Republic of Lithuania</h3>
                </div>
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
</div>
<?php
$content = ob_get_clean();
require_once __DIR__ . '/../partials/base.php';
?>