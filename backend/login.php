<?php
// Include the database connection file (assuming it's in the backend directory)
require_once 'connection.php';

// Define the path for the custom debug log file
// IMPORTANT: For PRODUCTION, REPLACE THIS PATH with the actual, absolute path to a writable directory on your server.
// Ensure the web server user has write permissions to this file and directory.
$debug_log_file = 'debug.log'; // <-- **CHANGE THIS PATH FOR PRODUCTION**

// Start a session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    error_log("DEBUG: Session started in login.php", 3, $debug_log_file); // Debug log
} else {
    error_log("DEBUG: Session already active in login.php", 3, $debug_log_file); // Debug log
}

error_log("DEBUG: Checking if user is already logged in.", 3, $debug_log_file); // Debug log
// Check if the user is already logged in, if so redirect to dashboard
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    error_log("DEBUG: User is already logged in. Role: " . $_SESSION["role"], 3, $debug_log_file); // Debug log
    // Redirect to admin dashboard if role is admin
    if (isset($_SESSION["role"]) && $_SESSION["role"] === 'admin') {
        error_log("DEBUG: Redirecting admin user to dashboard.php", 3, $debug_log_file); // Debug log
        header("location: dashboard.php"); // Redirect to admin dashboard
        exit; // Ensure script stops after redirection
    } else {
        // Redirect non-admin users back to the login page
        // Optionally, set a message indicating they don't have access
        $_SESSION['login_error'] = "You do not have access to the dashboard.";
        error_log("DEBUG: Non-admin user already logged in. Setting error message.", 3, $debug_log_file); // Debug log
        // Removed exit; here to allow the page to render the error message
    }
} else {
    error_log("DEBUG: User is not logged in.", 3, $debug_log_file); // Debug log
}

// Define variables and initialize with empty values
$username_email = $password = "";
$username_email_err = $password_err = $login_err = "";

error_log("DEBUG: Checking if form was submitted.", 3, $debug_log_file); // Debug log
// Process form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    error_log("DEBUG: Form submitted via POST.", 3, $debug_log_file); // Debug log

    // Check if username/email is empty
    if (empty(trim($_POST["username_email"]))) {
        $username_email_err = "Please enter username or email.";
        error_log("DEBUG: Username/email field is empty.", 3, $debug_log_file); // Debug log
    } else {
        $username_email = trim($_POST["username_email"]);
        error_log("DEBUG: Username/email entered: " . $username_email, 3, $debug_log_file); // Debug log
    }

    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
        error_log("DEBUG: Password field is empty.", 3, $debug_log_file); // Debug log
    } else {
        $password = trim($_POST["password"]);
        // Avoid logging the actual password for security
        error_log("DEBUG: Password entered (value not logged for security).", 3, $debug_log_file); // Debug log
    }

    error_log("DEBUG: Validating credentials.", 3, $debug_log_file); // Debug log
    // Validate credentials
    if (empty($username_email_err) && empty($password_err)) {
        error_log("DEBUG: No input validation errors.", 3, $debug_log_file); // Debug log
        // Prepare a select statement
        // Check for either username or email
        // Corrected SQL query with unique named placeholders
        $sql = "SELECT id, username, email, password, role FROM users WHERE username = :username OR email = :email";
        error_log("DEBUG: SQL query prepared: " . $sql, 3, $debug_log_file); // Debug log

        if ($stmt = $pdo->prepare($sql)) {
            error_log("DEBUG: PDO statement prepared successfully.", 3, $debug_log_file); // Debug log
            // Bind parameters
            // Remove the bindParam calls
            // $stmt->bindParam(":username_email", $param_username_email, PDO::PARAM_STR);
            // error_log("DEBUG: Parameter :username_email bound (first occurrence).", 3, $debug_log_file); // Debug log
            // $stmt->bindParam(":username_email", $param_username_email, PDO::PARAM_STR);
            // error_log("DEBUG: Parameter :username_email bound (second occurrence).", 3, $debug_log_file); // Debug log


            // Set parameters
            $param_username_email = $username_email;
            error_log("DEBUG: Parameter :username_email set to: " . $param_username_email, 3, $debug_log_file); // Debug log

            error_log("DEBUG: Attempting to execute PDO statement.", 3, $debug_log_file); // Debug log
            // Attempt to execute the prepared statement
            // Wrap execute in try-catch to catch PDOExceptions
            try {
                // Pass parameters as an array to the execute method
                // Corrected execute call with parameters matching new placeholders
                error_log("DEBUG: Executing statement with parameters: " . json_encode([':username' => $param_username_email, ':email' => $param_username_email]), 3, $debug_log_file); // Log parameters
                if ($stmt->execute([':username' => $param_username_email, ':email' => $param_username_email])) {
                    error_log("DEBUG: PDO statement executed successfully.", 3, $debug_log_file); // Debug log
                    // Check if username/email exists, verify password
                    if ($stmt->rowCount() == 1) {
                        error_log("DEBUG: User found in database.", 3, $debug_log_file); // Debug log
                        if ($row = $stmt->fetch()) {
                            $id = $row['id'];
                            $username = $row['username'];
                            $email = $row['email'];
                            $hashed_password = $row['password'];
                            $role = $row['role'];
                            error_log("DEBUG: Fetched user data. Username: " . $username . ", Role: " . $role, 3, $debug_log_file); // Debug log

                            error_log("DEBUG: Verifying password.", 3, $debug_log_file); // Debug log
                            if (password_verify($password, $hashed_password)) {
                                error_log("DEBUG: Password verification successful.", 3, $debug_log_file); // Debug log
                                // Password is correct, start a new session
                                session_regenerate_id(true); // Regenerate session ID for security
                                error_log("DEBUG: Session ID regenerated.", 3, $debug_log_file); // Debug log

                                // Store data in session variables
                                $_SESSION["loggedin"] = true;
                                $_SESSION["id"] = $id;
                                $_SESSION["username"] = $username;
                                $_SESSION["email"] = $email;
                                $_SESSION["role"] = $role;
                                error_log("DEBUG: Session variables set. Loggedin: true, ID: " . $id . ", Username: " . $username . ", Role: " . $role, 3, $debug_log_file); // Debug log

                                // Redirect user based on role
                                error_log("DEBUG: Checking user role for redirection. Role is: " . $role, 3, $debug_log_file); // Added log
                                if ($role === 'admin') {
                                    error_log("DEBUG: User is admin. Redirecting to dashboard.php", 3, $debug_log_file); // Debug log
                                    header("location: dashboard.php"); // Redirect to admin dashboard
                                    error_log("DEBUG: Header for dashboard.php sent.", 3, $debug_log_file); // Added log after header
                                    exit(); // Ensure script stops after redirection
                                } else {
                                    // Redirect non-admin users back to the login page
                                    // Optionally, set a message indicating they don't have access
                                    $_SESSION['login_error'] = "Login successful, but you do not have access to the dashboard.";
                                    error_log("DEBUG: User is non-admin. Setting login_error session message.", 3, $debug_log_file); // Debug log
                                    error_log("DEBUG: Non-admin user will remain on login page or be redirected.", 3, $debug_log_file); // Added log for non-admin path
                                    // Removed exit(); here to allow the page to render the error message
                                }
                            } else {
                                // Password is not valid
                                $login_err = "Invalid username/email or password.";
                                error_log("DEBUG: Password verification failed.", 3, $debug_log_file); // Debug log
                            }
                        }
                    } else {
                        // Username/email doesn't exist
                        $login_err = "Invalid username/email or password.";
                        error_log("DEBUG: User not found in database.", 3, $debug_log_file); // Debug log
                    }
                } else {
                    // This block might not be reached with ERRMODE_EXCEPTION, but keep for safety
                    echo "Oops! Something went wrong. Please try again later.";
                    // Use errorInfo() to get details about the PDO error
                    $pdo_error_info = $stmt->errorInfo();
                    error_log("ERROR: PDO statement execution failed (non-exception). Code: " . $pdo_error_info[0] . ", Driver Code: " . $pdo_error_info[1] . ", Message: " . $pdo_error_info[2], 3, $debug_log_file); // Debug log
                }
            } catch (PDOException $e) {
                // Catch PDO exceptions during execution
                echo "Oops! A database error occurred. Please try again later.";
                error_log("ERROR: PDO statement execution failed (Exception). Message: " . $e->getMessage() . ", Code: " . $e->getCode(), 3, $debug_log_file); // Log the exception message and code
                // Optionally log stack trace: error_log("ERROR: Stack trace: " . $e->getTraceAsString(), 3, $debug_log_file);
            }


            // Close statement
            unset($stmt);
            error_log("DEBUG: PDO statement unset.", 3, $debug_log_file); // Debug log
        } else {
             // Use errorInfo() to get details about the PDO error
            $pdo_error_info = $pdo->errorInfo();
            error_log("ERROR: PDO statement preparation failed. Code: " . $pdo_error_info[0] . ", Driver Code: " . $pdo_error_info[1] . ", Message: " . $pdo_error_info[2], 3, $debug_log_file); // Debug log
        }
    } else {
        error_log("DEBUG: Input validation errors present. Username/Email Error: '" . $username_email_err . "', Password Error: '" . $password_err . "'", 3, $debug_log_file); // Debug log
    }

    // Close connection
    unset($pdo);
    error_log("DEBUG: PDO connection unset.", 3, $debug_log_file); // Debug log
} else {
    error_log("DEBUG: Form not submitted via POST.", 3, $debug_log_file); // Debug log
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- You might want to link a CSS file for styling -->
    <!-- <link rel="stylesheet" href="../css/login.css"> -->
     <style>
        /* Basic styling for the form (can be moved to a separate CSS file) */
        body {
            font-family: sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f4f4f4;
        }
        .login-container {
            background-color: #fff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        .login-container h2 {
            text-align: center;
            margin-bottom: 1.5rem;
            color: #333;
        }
        .form-group {
            margin-bottom: 1rem;
        }
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
            color: #555;
        }
        .form-group input[type="text"],
        .form-group input[type="password"] {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box; /* Include padding and border in element's total width and height */
        }
         .form-group span {
            color: #dc3545; /* Red color for error messages */
            font-size: 0.875rem;
            display: block;
            margin-top: 0.25rem;
        }
        .form-group input[type="submit"] {
            width: 100%;
            padding: 0.75rem;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }
        .form-group input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .signup-link {
            text-align: center;
            margin-top: 1rem;
        }
        .signup-link a {
            color: #007bff;
            text-decoration: none;
        }
        .signup-link a:hover {
            text-decoration: underline;
        }
         .alert {
            padding: 0.75rem 1.25rem;
            margin-bottom: 1rem;
            border: 1px solid transparent;
            border-radius: 0.25rem;
        }
        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }
         .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>

        <?php
        // Display success message from signup if it exists
        if (isset($_SESSION['success_message'])) {
            echo '<div class="alert alert-success">' . $_SESSION['success_message'] . '</div>';
            unset($_SESSION['success_message']); // Clear the message after displaying
        }
        ?>

        <?php
        // Display login error message if it exists
        if (!empty($login_err)) {
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }
        // Display access denied message if set
        if (isset($_SESSION['login_error'])) {
             echo '<div class="alert alert-danger">' . $_SESSION['login_error'] . '</div>';
             unset($_SESSION['login_error']); // Clear the message after displaying
        }
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Username or Email</label>
                <input type="text" name="username_email" value="<?php echo isset($username_email) ? htmlspecialchars($username_email) : ''; ?>">
                <span><?php echo isset($username_email_err) ? $username_email_err : ''; ?></span>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password">
                <span><?php echo isset($password_err) ? $password_err : ''; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" value="Login">
            </div>
            <p class="signup-link">Don't have an account? <a href="signup.php">Sign up now</a>.</p>
        </form>
    </div>
</body>
</html>