<?php
    // Turn off MySQLi error reporting
    mysqli_report(MYSQLI_REPORT_OFF);
    
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
    } else {
        echo 'So far, so good!<br>';
    }
    
    // Set the connection's character set
    mysqli_set_charset($connection, 'utf8');
    
    // Create a SELECT query
    $sql = 'SELECT category_name, description
                FROM categories';

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

    // Get the total number of rows
    $total_rows = mysqli_num_rows($result);
    
    echo "Returned $total_rows categories:<br>";
    
    // Loop through the rows
    foreach($rows as $row) {
        echo $row['category_name'] . ': ' . $row['description'] . '<br>';
    }

    // That's it for now
    mysqli_close($connection);    
?>
