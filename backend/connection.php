<?php

// Database credentials
// define('DB_SERVER', 'sql111.ezyro.com'); // e.g., 'localhost' or '127.0.0.1'
// define('DB_USERNAME', 'ezyro_39015720'); // Your database username
// define('DB_PASSWORD', '503245bcb8b985'); // Your database password
// define('DB_NAME', 'ezyro_39015720_moodleclone'); // Your database name

define('DB_SERVER', 'localhost'); // e.g., 'localhost' or '127.0.0.1'
define('DB_USERNAME', 'root'); // Your database username
define('DB_PASSWORD', ''); // Your database password
define('DB_NAME', 'moodleclone'); // Your database name

// DSN (Data Source Name) string
$dsn = "mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME . ";charset=utf8mb4";

// Options for PDO
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Throw exceptions on errors
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,     // Fetch results as associative arrays
    PDO::ATTR_EMULATE_PREPARES   => false,                // Use native prepared statements
];

// Attempt to connect to the database
try {
    $pdo = new PDO($dsn, DB_USERNAME, DB_PASSWORD, $options);
    // Optional: You can add a success message here for testing
    // echo "Database connection successful!";
} catch (\PDOException $e) {
    // If connection fails, display an error message and stop the script
    // In a production environment, you should log the error instead of displaying it
    die("Database connection failed: " . $e->getMessage());
}
define('BASE_URL', 'http://localhost/moodle-clone/');
// The $pdo object is now your database connection.
// You can include this file in other PHP scripts to use the connection.
// Example usage in another file:
// require_once 'connection.php';
// $stmt = $pdo->query('SELECT * FROM users');
// while ($row = $stmt->fetch()) {
//     echo $row['username'] . "<br>";
// }

?>