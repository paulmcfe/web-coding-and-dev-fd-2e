<?php
    
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

    // Assume these external values came from a 
    // form submission and have been sanitized
    $customer = 'ALFKI';
    $employee = 1;
    
    // Declare a string for the query template
    // Use ? to add a placeholder for each external value
    $sql = "SELECT *
            FROM orders
            INNER JOIN customers
            ON orders.customer_id = customers.customer_id
            WHERE orders.customer_id = ?
            AND orders.employee_id = ?";
    
    // Prepare the statement template
    $stmt = mysqli_prepare($connection, $sql);
    
    // Bind the parameters (one string, one integer)
    mysqli_stmt_bind_param($stmt, "si", $customer, $employee);
    
    // Execute the prepared statement
    mysqli_stmt_execute($stmt);
    
    // Get the results
    $result = mysqli_stmt_get_result($stmt);
    
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
