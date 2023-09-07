<?php
    header('Content-Type: application/html');
    header('Access-Control-Allow-Origin: *');
    
    // Get the raw POST data
    $rawData = file_get_contents("php://input");
        
    // Decode the JSON string
    $data = json_decode($rawData, true);
    
    // Access the data
    $category_num = $data['category'];

    // Make sure the category value is an integer between 1 and 8
    // See Book 6, Chapter 3 to learn about the powerful filter_var() function
    $category_num = filter_var($category_num, 
                               FILTER_VALIDATE_INT, 
                               array("options" => array("min_range" => 1, "max_range" => 8)));

    if (!$category_num) {
        die('Yo, the "category" value must be an integer from 1 to 8!');
    }

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
    $sql = "SELECT unit_price, units_in_stock
                FROM products
                WHERE category_id = $category_num";

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
    
    $inventory_total = 0;
    
    // Loop through the rows
    foreach($rows as $row) {
        // Update the inventory total with price * units
        $inventory_total += (float) $row['unit_price'] * (float) $row['units_in_stock'];
    }
    echo $inventory_total;

    // That's it for now
    mysqli_close($connection);    
?>
