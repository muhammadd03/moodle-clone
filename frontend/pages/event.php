<?php
$title = "Events";
ob_start();
require_once __DIR__ . '/../../backend/connection.php';
?>
<link rel="stylesheet" href="<?= BASE_URL ?>frontend/css/event.css">
<div class="event-page">
    <!-- Events Section -->
    <div class="events-section">
        <div class="events-content">
            <div class="events-left">
                <span class="tag-label">Events</span>
                <h1>Moodle events around the world</h1>
                <div class="event-types">
                    <span class="event-type moodlemoots">MoodleMoots</span>
                    <span class="event-type training">Training and webinars</span>
                </div>
            </div>
            <div class="events-right">
                <p>The Moodle community holds events and MoodleMoots (our name for conferences) all around the world, with a focus on encouraging collaboration and sharing of best practices of the open source learning platform.</p>
                <a href="#" class="see-events">See events <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </div>

    <!-- Upcoming Events -->
    <div class="upcoming-events">
        <div class="event-card">
            <div class="event-header">
                <div class="event-date">16-18 Sep, 2025</div>
                <div class="event-location">
                    <i class="fas fa-map-marker-alt"></i> Edinburgh International Conference Centre (EICC), Edinburgh, UK
                    <span class="language"><i class="fas fa-globe"></i> English</span>
                </div>
            </div>
            <div class="event-content">
                <div class="event-left">
                    <img src="<?= BASE_URL ?>frontend/images/ok.webp" alt="MoodleMoot Global 2025" class="event-logo">
                </div>
                <div class="event-right">
                    <div class="event-title">
                        <h2>MoodleMoot Global 2025</h2>
                        <span class="host">| hosted by Moodle HQ</span>
                    </div>
                    <p class="description">MoodleMoot Global 2025 is where edtech enthusiasts from all over the world will come together to connect, learn, and grow. This year, we'll be at Edinburgh International Conference Centre on 16-18 September 2025. Whether you're an educator, technologist, leader, or changemaker, this event is your space to exchange ideas, explore new approaches, and connect with a global network of people to build a better future for all. Register now! #MootGlobal25</p>
                    <div class="suitable">
                        Suitable for: Administrators, All, Corporate, Developers, Educators, Instructional designers, Technologists
                    </div>
                    <div class="event-actions">
                        <a href="#" class="go-event">Go to event <i class="fas fa-arrow-right"></i></a>
                        <button class="add-calendar"><i class="fas fa-calendar-plus"></i> Add to calendar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="event-card">
            <div class="event-header">
                <div class="event-date">15-16 May, 2025</div>
                <div class="event-location">
                    <i class="fas fa-map-marker-alt"></i> Vilnius Tech Park, Vilnius, Lithuania
                    <span class="language"><i class="fas fa-globe"></i> English</span>
                </div>
            </div>
            <div class="event-content">
                <div class="event-logo">
                    <img src="<?= BASE_URL ?>frontend/images/ok.webp" alt="MoodleMoot Baltics and Finland 2025">
                </div>
                <div class="event-details">
                    <h2>MoodleMoot Baltics and Finland 2025 <span class="host">| hosted by Vextur</span></h2>
                    <p class="description">For the first time in Lithuania, MoodleMoot Baltics & Finland 2025 brings together educators, companies, organizations, and Moodle enthusiasts to explore the latest innovations in online education and eLearning technology. The event will include 20 speakers, 3 hands-on workshops, and a networking afterparty. Hosted by Vextur, this is a unique opportunity to exchange ideas, learn from experts, and build lasting connections. Don't miss out on an inspiring two-day event packed with innovation and collaboration. #MootBAFI2025</p>
                    <div class="suitable">
                        Suitable for: Administrators, All, Educators, HR representatives, Trainers
                    </div>
                    <div class="event-actions">
                        <a href="#" class="go-event">Go to event <i class="fas fa-arrow-right"></i></a>
                        <button class="add-calendar"><i class="fas fa-calendar-plus"></i> Add to calendar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="event-card">
            <div class="event-header">
                <div class="event-date">Thursday 5 June, 2025</div>
                <div class="event-location">
                    <i class="fas fa-map-marker-alt"></i> Prolongación Alameda Juan Pablo II, San Salvador, El Salvador
                    <span class="time"><i class="far fa-clock"></i> 8:00 - 16:00</span>
                    <span class="language"><i class="fas fa-globe"></i> Spanish</span>
                </div>
            </div>
            <div class="event-content">
                <div class="event-left">
                    <img src="<?= BASE_URL ?>frontend/images/ok.webp" alt="MoodleMoot El Salvador 2025" class="event-logo">
                </div>
                <div class="event-right">
                    <div class="event-title">
                        <h2>MoodleMoot El Salvador 2025</h2>
                        <span class="host">| hosted by Corporate Learning</span>
                    </div>
                    <p class="description">Moodlemoot El Salvador es un evento oficial de Moodle organizado por Corporate Learning, en el cual se reunirá la comunidad eLearning para compartir y aprender sobre nuevas funcionalidades de Moodle y tendencia de eLearning. #MootSV25</p>
                    <div class="suitable">
                        Suitable for: Administrators, All, Developers, Educators
                    </div>
                    <div class="event-actions">
                        <a href="#" class="go-event">Go to event <i class="fas fa-arrow-right"></i></a>
                        <button class="add-calendar"><i class="fas fa-calendar-plus"></i> Add to calendar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="event-card">
            <div class="event-header">
                <div class="event-date">12-13 June, 2025</div>
                <div class="event-location">
                    <i class="fas fa-map-marker-alt"></i> SRCE, Josipa Marohnića 5, 10000 Zagreb
                    <span class="language"><i class="fas fa-globe"></i> Croatian</span>
                </div>
            </div>
            <div class="event-content">
                <div class="event-left">
                    <img src="<?= BASE_URL ?>frontend/images/ok.webp" alt="Moodlemoot Hrvatska 2025" class="event-logo">
                </div>
                <div class="event-right">
                    <div class="event-title">
                        <h2>Moodlemoot Hrvatska 2025</h2>
                        <span class="host">| hosted by SRCE, University of Zagreb University Computing Centre</span>
                    </div>
                    <p class="description">SRCE od 2011. godine organizira Moodlemoot Hrvatska s ciljem okupljanja zajednice svih koji koriste sustav Moodle ili su zainteresirani za njegovo korištenje. Moodlemoot Hrvatska održava se svake godine u lipnju, a okuplja zajednicu moodlera iz Hrvatske i regije. #MootHR25</p>
                    <div class="suitable">
                        Suitable for: Administrators, All, Developers, Educators
                    </div>
                    <div class="event-actions">
                        <a href="#" class="go-event">Go to event <i class="fas fa-arrow-right"></i></a>
                        <button class="add-calendar"><i class="fas fa-calendar-plus"></i> Add to calendar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Upcoming Events -->
        <div class="upcoming-events">
            <div class="event-card">
                <div class="event-header">
                    <div class="event-date">2-4 July, 2025</div>
                    <div class="event-location">
                        <i class="fas fa-map-marker-alt"></i> Luxent Hotel, 51 Timog Avenue, South Triangle Quezon City
                        <span class="language"><i class="fas fa-globe"></i> English, Filipino</span>
                    </div>
                </div>
                <div class="event-content">
                    <div class="event-left">
                        <img src="<?= BASE_URL ?>frontend/images/ok.webp" alt="MoodleMoot Philippines 2025" class="event-logo">
                    </div>
                    <div class="event-right">
                        <div class="event-title">
                            <h2>MoodleMoot Philippines 2025</h2>
                            <span class="host">| hosted by Nephila Web Technology Inc.</span>
                        </div>
                        <p class="description">This annual event serves as a platform for educators, developers, administrators, and organizations to exchange knowledge, share best practices, and explore the latest innovations in Moodle. Through insightful presentations, hands-on workshops, and meaningful discussions, MoodleMoot Philippines fosters collaboration and strengthens the local and global Moodle community, driving the continuous improvement of digital learning not just in the Philippines but across our neighboring countries in Asia. #MootPH25</p>
                        <div class="suitable">
                            Suitable for: Administrators, All, Developers, Educators
                        </div>
                        <div class="event-actions">
                            <a href="#" class="go-event">Go to event <i class="fas fa-arrow-right"></i></a>
                            <button class="add-calendar"><i class="fas fa-calendar-plus"></i> Add to calendar</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="event-card">
                <div class="event-header">
                    <div class="event-date">21-22 July, 2025</div>
                    <div class="event-location">
                        <i class="fas fa-map-marker-alt"></i> UTCC (Universitas Terbuka Convention Center), Tangerang Selatan, Indonesia
                        <span class="language"><i class="fas fa-globe"></i> Bahasa, English</span>
                    </div>
                </div>
                <div class="event-content">
                    <div class="event-left">
                        <img src="<?= BASE_URL ?>frontend/images/ok.webp" alt="MoodleMoot Indonesia 2025" class="event-logo">
                    </div>
                    <div class="event-right">
                        <div class="event-title">
                            <h2>MoodleMoot Indonesia 2025</h2>
                            <span class="host">| hosted by PCMan Indonesia</span>
                        </div>
                        <p class="description">Get ready for the next evolution in digital learning at Indonesian MoodleMoot 2025! With the theme "Empowering Learning through Innovation with AI, Data & Gamification", this year's event will spotlight how cutting-edge technologies are transforming education across sectors. Participants will explore innovative practices, real-world case studies, and future-ready strategies that harness the power of artificial intelligence, data analytics, and gamified learning. From insightful keynotes to the latest Moodle developments, this event will inspire new ways to engage and empower learners. #MootID25</p>
                        <div class="suitable">
                            Suitable for: Administrators, Developers, Education Technology Enthusiasts, Educators
                        </div>
                        <div class="event-actions">
                            <a href="#" class="go-event">Go to event <i class="fas fa-arrow-right"></i></a>
                            <button class="add-calendar"><i class="fas fa-calendar-plus"></i> Add to calendar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Latest Event News -->
    <div class="latest-news">
        <h2>Latest event news</h2>
        <div class="news-grid">
            <div class="news-card">
                <img src="<?= BASE_URL ?>frontend/images/Copy-of-MMG25-blog-thumbnail-templates-550x412.webp" alt="Moot session with audience">
                <div class="news-date">14 May 2025</div>
                <h3>What makes a great Moot session? Tips from past presenters</h3>
            </div>

            <div class="news-card">
                <img src="<?= BASE_URL ?>frontend/images/Copy-of-MMG25-blog-thumbnail-templates-1-550x412.webp" alt="MoodleMoot Global audience">
                <div class="news-date">07 May 2025</div>
                <h3>5 reasons you can't miss MoodleMoot Global 2025</h3>
            </div>

            <div class="news-card">
                <img src="<?= BASE_URL ?>frontend/images/Join-us-at-550x412.webp" alt="Saudi Arabia skyline">
                <div class="news-date">01 May 2025</div>
                <h3>Moodle takes off for GESS Saudi Arabia 2025: Meet us in Riyadh</h3>
            </div>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
require_once __DIR__ . '/../partials/base.php';
?>