<?php
    header('Content-Type: application/html');
    header('Access-Control-Allow-Origin: *');

    if (isset($_POST['message'])) {
        $msg = $_POST['message'];
    } else {
        echo 'The "message" parameter is missing!<br>';
        echo 'We are done here, sorry.';
        exit(0);
    }

    // Convert the string to harmless characters
    echo htmlspecialchars($msg);
?>
