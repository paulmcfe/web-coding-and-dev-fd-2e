<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    
    // Make sure we have the customer input
    if (isset($_POST['customer'])) {
        // Make sure the customer input is alpha 
        if (!ctype_alpha($_POST['customer'])) {
            // If not, alert the user
            echo 'The customer must be only letters!<br>';
            echo 'Please try again.';
            exit(0);
        }
    }
    // Filter and store the customer code
    $customer = filter_input(INPUT_POST, 'customer', FILTER_SANITIZE_SPECIAL_CHARS);

    // Make sure we have the employee input
    if (isset($_POST['employee'])) {
        // Make sure the employee input is numeric 
        if (!ctype_digit($_POST['employee'])) {
            // If not, alert the user
            echo 'The employee must be a number!<br>';
            echo 'Please try again.';
            exit(0);
        }
    }
    // Filter and store the employee code
    $employee = filter_input(INPUT_POST, 'employee', FILTER_SANITIZE_NUMBER_INT);
    
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
