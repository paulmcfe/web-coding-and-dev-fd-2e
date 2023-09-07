<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    
    // Store the database connection parameters
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'northwind';
 
    // Create a new MySQLi object with the database connection parameters
    $connection = mysqli_connect($host, $user, $password, $database);
    
    // Check for a connection error
    if(!$connection) {
        echo 'Connection Failed! 
              Error #' . mysqli_connect_errno()
                . ': ' . mysqli_connect_error();
        exit(0);
    }
    
    // Set the connection's character set
    mysqli_set_charset($connection, 'utf8');
    
    // Create and run a SELECT query
    $sql = "SELECT company_name, contact_name, contact_title, contact_email
            FROM suppliers";

    // Run the query
    $result = mysqli_query($connection, $sql);
    
    // Check for a query error
    if (!$result) {
        echo 'Query Failed! 
              Error: ' . mysqli_error($connection);
        exit(0);
    }
    
    // Get the query rows as an associative array
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    // That's it for now
    mysqli_close($connection);  
    
    // Convert the array to JSON
    $JSON_data = json_encode($rows, JSON_HEX_APOS | JSON_HEX_QUOT);
    
    // Output the JSON
    echo $JSON_data;  
?>
