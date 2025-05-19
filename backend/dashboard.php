<?php
// Start output buffering at the very beginning
ob_start();

// Include the database connection file
require_once 'connection.php';

// Start the session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is logged in and is an admin
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || !isset($_SESSION["role"]) || $_SESSION["role"] !== 'admin') {
    // If not logged in or not admin, redirect to login page
    header("location: login.php");
    exit;
}

// If logged in and is admin, display the dashboard content
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <style>
        html {
          box-sizing: border-box;
        }

        *, *:before, *:after {
          box-sizing: inherit; 
        }

        body {
            font-family: Arial, sans-serif;
            display: flex;
            min-height: 100vh;
            margin: 0;
        }

        .sidebar {
            width: 250px;
            background-color: #0066cc;
            color: white;
            padding: 20px;
            display: flex;
            flex-direction: column;
        }

        .admin-profile {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
            padding: 10px;
        }

        .admin-profile img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 15px;
        }

        .admin-info h2 {
            font-size: 18px;
            margin-bottom: 5px;
        }

        .admin-info p {
            font-size: 14px;
            opacity: 0.8;
        }

        .nav-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            padding: 12px 15px;
            color: white;
            text-decoration: none;
            margin-bottom: 5px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .nav-item:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .nav-item i {
            margin-right: 10px;
            width: 20px;
        }

        .nav-item.active {
            background-color: rgba(255, 255, 255, 0.2);
        }

        .user-logout {
            margin-top: auto;
            padding: 12px 15px;
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
        }

        .main-content {
            flex-grow: 1;
            background-color: #f0f2f5;
            height: 100vh;
            overflow: hidden;
        }

        .top-bar {
            display: flex;
            justify-content: flex-end;
            padding: 10px 20px;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .profile-icon {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            cursor: pointer;
        }

        .nav-item-with-dropdown {
            position: relative;
            width: 100%;
        }

        .dropdown-content {
            display: none;
            position: relative;
            background-color: white;
            width: 100%;
            border-radius: 0;
            margin-top: 5px;
        }

        .nav-item-with-dropdown.active .dropdown-content {
            display: block;
        }

        .dropdown-item {
            color: #0066cc !important;
            padding: 10px 15px;
            text-decoration: none;
            display: block;
            border-bottom: 1px solid #e0e0e0;
        }

        .dropdown-item:last-child {
            border-bottom: none;
        }

        .dropdown-item:hover {
            background-color: #f5f5f5;
        }

        .nav-item-with-dropdown:has(.dropdown-content) > .nav-item:after {
            content: '▼';
            font-size: 10px;
            color: white;
            transition: transform 0.3s;
        }

        .nav-item-with-dropdown.active > .nav-item:after {
            transform: rotate(180deg);
        }

        .nav-item-with-dropdown span {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .nav-item-with-dropdown .fa-certificate {
            margin-left: -4px;
        }

        .nav-item-with-dropdown span:has(.fa-certificate) {
            white-space: normal;
            line-height: 1.2;
        }

        .fa-blog, 
        .fa-download,
        .fa-users,
        .fa-certificate,
        .fa-newspaper {
            width: 16px;
            text-align: center;
            margin-left: 4px;
        }

        .nav-item-with-dropdown {
            padding: 12px 20px;
        }

        .content-scroll {
            height: calc(100vh - 20px);
            overflow-y: auto;
            scrollbar-width: thin;
            scrollbar-color: #888 #f1f1f1;
        }

        .content-scroll::-webkit-scrollbar {
            width: 8px;
        }

        .content-scroll::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 4px;
        }

        .content-scroll::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 4px;
        }

        .content-scroll::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
    </style>
    <!-- Add Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="sidebar">
        <div class="admin-profile">
            <img src="../frontend/images/admin.webp" alt="Admin">
            <div class="admin-info">
                <h2>Admin</h2>
            </div>
        </div>

        <div class="nav-item-with-dropdown" id="blogsDropdown">
            <a href="#" class="nav-item" onclick="toggleDropdown(event)">
                <span>
                    <i class="fas fa-blog"></i>
                    Success Stories
                </span>
            </a>
            <div class="dropdown-content">
                <a href="?page=add_success_story" class="dropdown-item">Add new success story</a>
                <a href="?page=view_success_stories" class="dropdown-item">View all success stories</a>
            </div>
        </div>

        <div class="nav-item-with-dropdown" id="resourcesDropdown">
            <a href="#" class="nav-item" onclick="toggleDropdown(event)">
                <span>
                    <i class="fas fa-download"></i>
                    Resources
                </span>
            </a>
            <div class="dropdown-content">
                <a href="?page=add_resources" class="dropdown-item">Add new resource</a>
                <a href="?page=view_resources" class="dropdown-item">View all resources</a>
            </div>
        </div>

        <div class="nav-item-with-dropdown" id="certificatesDropdown">
            <a href="#" class="nav-item" onclick="toggleDropdown(event)">
                <span>
                    <i class="fas fa-certificate"></i>
                    Membership Certification
                </span>
            </a>
            <div class="dropdown-content">
                <a href="?page=add_certificate" class="dropdown-item">Add new certificate</a>
                <a href="?page=view_certificates" class="dropdown-item">View all certificates</a>
            </div>
        </div>

        <a href="logout.php" class="user-logout">
            <i class="fas fa-sign-out-alt"></i>
            User Logout
        </a>
    </div>

    <div class="main-content">
        <div id="dynamicContent" class="p-4 ml-[250px] content-scroll">
            <?php
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
                // Add 'add_success_story' to the allowed pages array
                $allowedPages = ['add_success_story','view_success_stories','edit_success_story','delete_success_story'];

                if (in_array($page, $allowedPages)) {
                    include __DIR__ . "/{$page}.php";
                } else {
                    // Optional: Handle invalid page request, e.g., show a 404 or default content
                    echo "<p>Page not found.</p>"; // This is the source of the message
                }
            } else {
                // Optional: Include default content when no page is specified
                // include __DIR__ . "/default_dashboard_content.php";
                echo "<p>Welcome to the Admin Dashboard!</p>";
            }
            ?>
        </div>
    </div>

    <script>
        // Add active class to current nav item
        const currentPath = window.location.pathname;
        document.querySelectorAll('.nav-item').forEach(item => {
            if (item.getAttribute('href') === currentPath) {
                item.classList.add('active');
            }
        });

        function toggleDropdown(event) {
            event.preventDefault();
            const dropdown = event.currentTarget.closest('.nav-item-with-dropdown');
            dropdown.classList.toggle('active');

            // Close other dropdowns
            document.querySelectorAll('.nav-item-with-dropdown').forEach(item => {
                if (item !== dropdown) {
                    item.classList.remove('active');
                }
            });
        }

        // Close dropdowns when clicking outside
        document.addEventListener('click', function(event) {
            if (!event.target.closest('.nav-item-with-dropdown')) {
                document.querySelectorAll('.nav-item-with-dropdown').forEach(dropdown => {
                    dropdown.classList.remove('active');
                });
            }
        });
    </script>
</body>
</html>
