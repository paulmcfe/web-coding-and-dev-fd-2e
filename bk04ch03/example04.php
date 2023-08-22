<?php
    // Parse the query string
    if (isset($_GET['category'])) {
        $category_num = $_GET['category'];
    } else {
        echo 'The "category" parameter is missing!<br>';
        echo 'We are done here, sorry.';
        exit(0);
    }
    
    // Make sure the category value is an integer between 1 and 8
    // See Book 6, Chapter 3 to learn about the powerful filter_var() function
    $category_num = filter_var($category_num, 
                               FILTER_VALIDATE_INT, 
                               array("options" => array("min_range" => 1, "max_range" => 8)));

    if (!$category_num) {
        echo 'Yo, the "category" value must be an integer from 1 to 8!<br>';
        echo 'Please try again.';
        exit(0);        
    }

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
    
    // Set the connection's character set
    mysqli_set_charset($connection, 'utf8');

    // Create a SELECT query
    // This is an INNER JOIN of the products and categories tables,
    // based on the category_id value that was in the query string
    $sql = "SELECT products.product_name, 
                   products.unit_price, 
                   products.units_in_stock, 
                   categories.category_name
                FROM products
                INNER JOIN categories
                ON products.category_id = categories.category_id
                WHERE products.category_id = $category_num";

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
    
    // Get the category name
    $category = $rows[0]['category_name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Products - <?php echo $category; ?></title>
    <style>
        .align-left {
            text-align: left;
        }
        
        .align-right {
            text-align: right;
            width: 75px;
        }
    </style>
</head>
<body>

    <h2><?php echo $category; ?></h2>
    <table>
    <tr>
    <th class="align-left">Product</th>
    <th class="align-right">Price</th>
    <th class="align-right">In Stock</th>
    </tr>
<?php
    // Loop through the rows
    foreach($rows as $row) {
?>    
    <tr>
    <td><?php echo $row['product_name']; ?></td>
    <td class="align-right"><?php echo $row['unit_price']; ?></td>
    <td class="align-right"><?php echo $row['units_in_stock']; ?></td>
    </tr>   
<?php
    }
?>    
    </table>
<?php
    // That's it for now
    mysqli_close($connection);    
?>

</body>
</html>
