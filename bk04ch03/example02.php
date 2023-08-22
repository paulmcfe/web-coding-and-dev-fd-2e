<?php
    // Turn off MySQLi error reporting
    mysqli_report(MYSQLI_REPORT_OFF);
    
    // Store the database connection parameters
    $host = 'localhost';
    $user = 'root';
    $password = 'shhhhhhh';
    $database = 'examples';
 
    // Create a new MySQLi object with the database connection parameters
    $connection = mysqli_connect($host, $user, $password, $database);
    
    // Check for a connection error
    if(!$connection) {
        echo 'Connection Failed! 
              Error #' . mysqli_connect_errno()
                . ': ' . mysqli_connect_error();
        exit(0);
    } else {
        echo 'So far, so good!';
    }
    
    // Set the connection's character set
    mysqli_set_charset($connection, 'utf8');
    
    // That's it for now
    mysqli_close($connection);    
?>