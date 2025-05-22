<?php
$title = "Home";
ob_start();

// Include the database connection file
require_once __DIR__ . '/../../backend/connection.php'; // Adjust path as necessary

// Fetch the latest 3 success stories
$successStories = []; // Initialize an empty array
$sql = "SELECT * FROM success_stories ORDER BY created_at DESC LIMIT 3";

try {
    if ($stmt = $pdo->prepare($sql)) {
        if ($stmt->execute()) {
            $successStories = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            // Handle execution error
            // In a production environment, log this error
            error_log("Error executing success stories query on home page: " . print_r($stmt->errorInfo(), true));
        }
    } else {
        // Handle prepare error
        // In a production environment, log this error
        error_log("Database error: Could not prepare success stories statement on home page: " . print_r($pdo->errorInfo(), true));
    }
} catch (PDOException $e) {
    // Handle database exception
    // In a production environment, log this error
    error_log("Database exception fetching success stories on home page: " . $e->getMessage());
}

// Close connection (optional, PHP closes automatically at end of script)
unset($pdo);

?>
<link rel="stylesheet" href="<?= BASE_URL ?>frontend/css/home.css">

    <!-- Hero Section -->
    <div class="hero-section">
        <div class="hero-container">
            <div class="hero-left">
                <h1>Online learning, delivered your way</h1>
            </div>
            <div class="hero-right">
                <p>Join hundreds of thousands of educators and trainers on Moodle, the world's most customisable and trusted learning management system.</p>
                <a href="#" class="get-moodle-btn">Get Moodle <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </div>

    <!-- Why Moodle Section -->
    <div class="why-moodle-section">
        <div class="why-moodle-container">
            <div class="why-moodle-image">
                <img src="<?= BASE_URL ?>frontend/images/moodel.jpg" alt="Person using Moodle platform">
            </div>
            <div class="why-moodle-content">
                <span class="section-label">Why Moodle?</span>
                <h2>Moodle puts the power of eLearning in your hands</h2>
                <p>At Moodle, our mission is to empower educators to improve our world with our open source eLearning software.</p>
                <p>Flexible, secure, and customisable for any online teaching or training initiative, Moodle gives you the freedom to create an eLearning platform that best meets your needs.</p>
            </div>
        </div>
    </div>

    <!-- Features Grid Section -->
    <div class="features-grid-section">
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon orange">
                    <i class="fas fa-cog"></i>
                </div>
                <h3>Customise your learning experience</h3>
                <p>With a wide range of inbuilt features, plugins, and integrations at your disposal, you can create any course or learning environment you envision with Moodle.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon orange">
                    <i class="fas fa-expand-arrows-alt"></i>
                </div>
                <h3>Scale your platform to any size</h3>
                <p>From small classrooms to large universities, global companies, and global departments, Moodle can be scaled to support organisations of all sizes.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon orange">
                    <i class="fas fa-lock"></i>
                </div>
                <h3>Safeguard your LMS data and systems</h3>
                <p>As an open source platform, Moodle is committed to safeguarding data security, user privacy, and security controls. For complete control, Moodle can be easily deployed on a private secure cloud or server.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon orange">
                    <i class="fas fa-mobile-alt"></i>
                </div>
                <h3>Use anywhere, on any device</h3>
                <p>With a mobile-compatible interface and cross-browser compatibility, content on the Moodle platform is easily accessible, available offline, and consistent across devices.</p>
            </div>

            <div class="feature-card">
                <div class="feature-icon orange">
                    <i class="fas fa-headset"></i>
                </div>
                <h3>Tap into specialist LMS support</h3>
                <p>Get your LMS set up and serviced for you by a Moodle Certified Partner or Service Provider of your choice.</p>
            </div>
        </div>
    </div>

    <!-- Products Section -->
    <div class="products-section">
        <div class="products-container">
            <span class="section-label">Our products</span>
            <h2>Choose your online learning platform</h2>
            <p class="products-description">Moodle has online teaching and workplace training solutions to suit any organisation. Start by choosing the best platform for your learning goals.</p>

            <div class="product-cards">
                <div class="product-card">
                    <div class="video-thumbnail">
                        <img src="<?= BASE_URL ?>frontend/images/22.jpg" alt="Moodle LMS video thumbnail">
                        <div class="play-icon">
                            <i class="fas fa-play"></i> <!-- Changed to fa-play for a simple triangle -->
                        </div>
                        <div class="video-thumbnail-caption"> <!-- ADD THIS DIV -->
                            Watch the video to discover Moodle LMS: Our fully customisable learning management system.
                        </div>
                    </div>
                    <div class="product-card-content"> <!-- WRAP content below image -->
                        <div class="product-tags">
                            <span class="tag">Accessible</span> <!-- Example tag from image -->
                            <span class="tag">Open Source</span>
                            <span class="tag">Secure & Scalable</span>
                        </div>
                        <h3>Moodle LMS</h3>
                        <p>Engage your learners with flexible, secure, and accessible online learning spaces with Moodle LMS, our fully customisable learning management system.</p>
                        <a href="#" class="view-more">View more <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>

                <div class="product-card">
                    <div class="video-thumbnail">
                        <img src="<?= BASE_URL ?>frontend/images/home-card-2-550x412.jpg" alt="Moodle Workplace video thumbnail">
                        <div class="play-icon">
                             <i class="fas fa-play"></i> <!-- Changed to fa-play for a simple triangle -->
                        </div>
                        <div class="video-thumbnail-caption"> <!-- ADD THIS DIV -->
                            Watch the video to discover Moodle Workplace: our enterprise learning management platform.
                        </div>
                    </div>
                    <div class="product-card-content"> <!-- WRAP content below image -->
                        <div class="product-tags">
                            <span class="tag">Customisable</span> <!-- Example tag from image -->
                            <span class="tag">Enterprise Software</span>
                            <span class="tag">Secure & Scalable</span>
                        </div>
                        <h3>Moodle Workplace</h3>
                        <p>Streamline workplace training, onboarding, and compliance management while driving measurable learning outcomes with Moodle Workplace, our enterprise learning management platform.</p>
                        <a href="#" class="view-more">View more <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Stories Section -->
    <div class="success-stories">
        <div class="stories-container">
            <span class="section-label">Success Stories</span>
            <h2>Building better learning experiences with Moodle</h2>
            <p class="stories-description">Read inspiring stories from around the world on how Moodle is being used to manage online learning and improve learner outcomes.</p>

            <div class="stories-grid">
                <?php if (!empty($successStories)): ?>
                    <?php foreach ($successStories as $story): ?>
                        <div class="story-card">
                            <img src="<?= BASE_URL ?>frontend/<?= htmlspecialchars($story['cover_image']) ?>" alt="<?= htmlspecialchars($story['title']) ?>">
                            <div class="story-content-overlay">
                                <div class="story-tags">
                                    <!-- You might need to fetch tags from another table or add a tags column -->
                                    <!-- For now, using static tags or you can remove this div if not needed -->
                                    <span class="tag">Moodle Workplace</span>
                                    <span class="tag">Workplace Learning</span>
                                </div>
                                <h3><?= htmlspecialchars($story['title']) ?></h3>
                                <!-- Assuming you have a dedicated page to view a single story -->
                                <!-- Replace '#' with the actual link to the story page, e.g., success-stories.php?id=<?= $story['id'] ?> -->
                                <a href="#" class="read-more-icon"><i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No success stories found.</p>
                <?php endif; ?>
            </div>

            <!-- Add the "View all case studies" button -->
            <a href="<?= BASE_URL ?>success-stories.php" class="view-all-case-studies-btn">
                View all case studies <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>

    <!-- Statistics Section -->
    <!-- Customer Logos Slider -->

    <div class="statistics-section">
        <div class="statistics-container">
            <span class="section-label">Our customers</span>
            <div class="stats-header">
                <h2>Who's using Moodle?</h2>
                <p>Moodle is the online learning platform of choice for thousands of schools, universities, colleges, vocational trainers, and workplaces in every part of the world.</p>
            </div>
            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-icon">
                        <img src="<?= BASE_URL ?>frontend/images/dot.svg" alt="Dots pattern">
                    </div>
                    <div class="stat-number">
                        <span id="userCount">0</span><span>+</span>
                    </div>
                    <div class="stat-label">Users world wide</div>
                </div>
                <div class="stat-item">
                    <div class="stat-icon">
                        <img src="<?= BASE_URL ?>frontend/images/dot.svg" alt="Dots pattern">
                    </div>
                    <div class="stat-number">
                        <span id="courseCount">0</span><span>+</span>
                    </div>
                    <div class="stat-label">Course enrolments</div>
                </div>
                <div class="stat-item">
                    <div class="stat-icon">
                        <img src="<?= BASE_URL ?>frontend/images/dot.svg" alt="Dots pattern">
                    </div>
                    <div class="stat-number">
                        <span id="languageCount">0</span><span>+</span>
                    </div>
                    <div class="stat-label">Courses in 42 languages</div>
                </div>
                <div class="stat-item">
                    <div class="stat-icon">
                        <img src="<?= BASE_URL ?>frontend/images/dot.svg" alt="Dots pattern">
                    </div>
                    <div class="stat-number">
                        <span id="siteCount">0</span><span>+</span>
                    </div>
                    <div class="stat-label">Moodle sites</div>
                </div>
            </div>
        </div>
    </div>
    <div class="logo-slider-container">
        <div class="logo-slider">
            <div class="logo-slide">
                <img src="<?= BASE_URL ?>frontend/images/log1.webp" alt="La Salle Logo">
            </div>
            <div class="logo-slide">
                <img src="<?= BASE_URL ?>frontend/images/logo2.webp" alt="UMKC Logo">
            </div>
            <div class="logo-slide">
                <img src="<?= BASE_URL ?>frontend/images/logo3.webp" alt="Sertus Logo">
            </div>
            <div class="logo-slide">
                <img src="<?= BASE_URL ?>frontend/images/log4.webp" alt="Escuela Logo">
            </div>
            <div class="logo-slide">
                <img src="<?= BASE_URL ?>frontend/images/Concordia-logo-compact-RGB-300x60.jpg" alt="Concordia Logo">
            </div>
            <div class="logo-slide">
                <img src="<?= BASE_URL ?>frontend/images/McGrawHill-logo.webp" alt="McGrawHill Logo">
            </div>
            <div class="logo-slide">
                <img src="<?= BASE_URL ?>frontend/images/tetimonial-logo-300x103.webp" alt="tetimonial Logo">
            </div>
            <div class="logo-slide">
                <img src="<?= BASE_URL ?>frontend/images/the-open-university-logo.webp" alt="the open university logo">
            </div>
        </div>
        <button class="slider-nav prev"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"></polyline></svg></button>
        <button class="slider-nav next"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg></button>
    </div>

    <!-- Testimonials Section -->
    <div class="testimonials-section">
        <div class="testimonials-container">
            <span class="section-label">Testimonials</span>
            <h2>What our customers say</h2>
            <p class="testimonials-description">Hear from teachers, instructors, and leaders in education about how Moodle empowers them to provide quality online learning experiences.</p>

            <div class="testimonial-slider">
                <div class="testimonial-cards">
                    <!-- Existing testimonial card -->
                    <div class="testimonial-card">
                        <p class="quote">"Seamless hybrid learning platform. It is easy to set up, integrate and customize to fit my organization training needs. Moreover, the mobile app makes the platform even more accessible in remote or "on the go" situations."</p>
                        <div class="rating">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                        </div>
                        <div class="author-info">
                            <span class="author-name">Sylvester Zibusiso M.</span>
                            <span>Source: Capterra</span>
                            <a href="#">Moodle Workplace</a>
                        </div>
                    </div>

                    <!-- Second testimonial card -->
                    <div class="testimonial-card">
                        <p class="quote">"Moodle is a great product for my online training and classes. It helps me easily modify materials, add new participants, and create new classes from anywhere on my PC or phone. It's an amazing platform for managing my courses. Thank you, Moodle!"</p>
                        <div class="rating">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                        </div>
                        <div class="author-info">
                            <span class="author-name">Ahmad Farhad</span>
                            <span>VP Management Consulting</span>
                            <span>Source: Capterra</span>
                            <a href="#">Moodle Workplace</a>
                        </div>
                    </div>

                    <!-- Third testimonial card -->
                    <div class="testimonial-card">
                        <p class="quote">"Moodle makes my mood(le). Moodle is a learning platform that has provided me with many facilitative opportunities during hours of studying and prep...(15416 characters truncated)
                        <div class="rating">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                        </div>
                        <div class="author-info">
                            <span class="author-name">Maja M.</span>
                            <span>Source: Capterra</span>
                            <a href="#">Moodle LMS</a>
                        </div>
                    </div>

                    <!-- Fourth testimonial card (New) -->
                    <div class="testimonial-card">
                        <p class="quote">"The flexibility and customization options in Moodle are outstanding. As an educator, I can create engaging course content that meets the specific needs of my students. The platform's robust features and regular updates keep it at the forefront of educational technology."</p>
                        <div class="rating">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                        </div>
                        <div class="author-info">
                            <span class="author-name">Robert M.</span>
                            <span>Education Technology Specialist</span>
                            <span>Source: Capterra</span>
                            <a href="#">Moodle LMS</a>
                        </div>
                    </div>

                    <!-- Fifth testimonial card (New) -->
                    <div class="testimonial-card">
                        <p class="quote">"The integration capabilities of Moodle with other educational tools make it a powerful platform for our institution. We've been able to create a comprehensive learning environment that supports both traditional and distance learning effectively."</p>
                        <div class="rating">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                        </div>
                        <div class="author-info">
                            <span class="author-name">Sarah K.</span>
                            <span>Academic Director</span>
                            <span>Source: Capterra</span>
                            <a href="#">Moodle LMS</a>
                        </div>
                    </div>

                    <!-- Sixth testimonial card (New) -->
                    <div class="testimonial-card">
                        <p class="quote">"Moodle's open-source nature allows for incredible flexibility and community support. Whenever I've needed help or wanted to implement a new feature, the Moodle community has been an invaluable resource."</p>
                        <div class="rating">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                        </div>
                        <div class="author-info">
                            <span class="author-name">David L.</span>
                            <span>Moodle Administrator</span>
                            <span>Source: Moodle Community</span>
                            <a href="#">Moodle LMS</a>
                        </div>
                    </div>

                     <!-- Seventh testimonial card (New) -->
                    <div class="testimonial-card">
                        <p class="quote">"Implementing Moodle Workplace has significantly improved our corporate training efficiency. The reporting features and program management tools are exactly what we needed to track employee development."</p>
                        <div class="rating">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                        </div>
                        <div class="author-info">
                            <span class="author-name">Emily R.</span>
                            <span>HR Manager</span>
                            <span>Source: Moodle Workplace User</span>
                            <a href="#">Moodle Workplace</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Navigation Arrows -->
            <div class="testimonial-nav">
                <button class="nav-arrow prev" aria-label="Previous testimonial">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"></polyline></svg>
                </button>
                <button class="nav-arrow next" aria-label="Next testimonial">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                </button>
            </div>

            <!-- Pagination Dots -->
            <div class="testimonial-pagination">
                <span class="dot active"></span>
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
            </div>
        </div>
    </div>

    <!-- Awards Section -->
    <div class="awards-section">
        <div class="awards-container">
            <div class="awards-grid">
                <div class="awards-badges">
                    <img src="<?= BASE_URL ?>frontend/images/springawards.webp" alt="Moodle Awards and Badges">
                </div>
                <div class="awards-content">
                    <h2>Pioneers in education technology</h2>
                    <p>Our global awards and rankings are a testament to Moodle's 20+ years of expertise in education technology, and the dedication of our community to continually improve our LMS systems.</p>
                    <a href="#" class="awards-link">See our awards <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
        <!-- Help Section -->
        <div class="help-section">
        <div class="help-container">
            <div class="help-content">
                <span class="section-label">Find your partner</span>
                <h2>Here to help you succeed</h2>
                <p>Wherever you are in the world, there's a Moodle expert near you who can provide help, from site setup and hosting, to customisations and training. Unlock unparalleled expertise and dedicated support 24/7 through our global network of Moodle Certified Partners and Service Providers.</p>
                <a href="#" class="help-link">Get expert advice <i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="help-image">
                <img src="<?= BASE_URL ?>frontend/images/adobe.jpg" alt="Team meeting discussing Moodle implementation">
            </div>
        </div>
    </div>
<script src="<?= BASE_URL ?>frontend/js/home.js" defer></script>
<?php
$content = ob_get_clean();
require_once __DIR__ . '/../partials/base.php';
?>
