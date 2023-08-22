<?php

    // Store the database connection parameters
    $host = 'localhost';
    $user = 'root';
    $password = 'shhhhhhh';
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
    
    // Create an INSERT query
    $sql = "INSERT
            INTO categories (category_name, description)
            VALUES ('Breads', 'Multi-grain, rye, and other deliciousness')";
            
    // Run the query
    $result = mysqli_query($connection, $sql);
    
    // Check for a query error
    if (!$result) {
        echo 'Query Failed! 
              Error: ' . mysqli_error($connection);
        exit(0);
    } else {
        echo "Success!";
    }
    
    // That's it for now
        mysqli_close($connection); 
?>

