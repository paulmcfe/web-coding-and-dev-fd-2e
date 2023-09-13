<?php
    header('Content-Type: application/text');
    header('Access-Control-Allow-Origin: *');
    
    // Make sure we have the email input
    if (isset($_POST['email'])) {
        // Filter and store the email address
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    } else {
        // If not, alert the user
        echo 'Um, you really do need to enter your email address.!<br>';
        echo 'Please try again.';
        exit(0);
    }

    // Make sure we have the password input
    if (isset($_POST['password'])) {
        // Store the trimmed password without filtering it
        $password = trim($_POST['password']);
        
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    } else {
        // If not, alert the user
        echo 'That\'s weird: the password is missing.<br>';
        echo 'Please try again.';
        exit(0);
    }
    
    // This is where you'd store the credentials in your database.
    // For now, just output the credentials
    echo "Email: $email<br>Hashed password: $hashedPassword";  
?>
