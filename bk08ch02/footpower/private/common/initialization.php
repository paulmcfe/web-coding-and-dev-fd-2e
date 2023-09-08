<?php
    // Make sure we see all the errors and warnings
    error_reporting(E_ALL | E_STRICT);
    ini_set('display_errors', 1);

    // Uncomment the following two statements for production code
    //ini_set('log_errors', 1);
    //ini_set('error_log', '../private/logs/error_log');
 
    // Has a session already been started for the user?
    if (session_status() === PHP_SESSION_NONE) {
        
        // If not, then start a session
        session_start();
    }
 
    // Have we not created a token for this session,
    // or has the token expired?
    if (!isset($_SESSION['token']) ||  time() > $_SESSION['token_expires']) {
        
        // Set the token and its expiration
        $_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(16));
        $_SESSION['token_expires'] = time() + 900;
    }

    // Include the app constants
    include_once 'constants.php';
 
    // Connect to the database
    $mysqli = mysqli_connect(HOST, USER, PASSWORD, DATABASE);

    // Check for an error
    if(!$mysqli) {
        echo 'Connection Failed! 
              Error #' . mysqli_connect_errno()
                . ': ' . mysqli_connect_error();
        exit(0);
    }
?>
