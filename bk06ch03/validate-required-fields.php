<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');

    // Store the default status
    $server_results['status'] = 'success';
    
    // Check the user-name field
    if(isset($_GET['user-name'])) {
        $user_name = $_GET['user-name'];
        // Is it empty?
        if(empty($user_name)) {
            // If so, update the status and add an error message for the field
            $server_results['status'] = 'error';
            $server_results['user-name'] = 'Missing user name';
        }
    }
    // Check the user-email field
    if(isset($_GET['user-email'])) {
        $user_email = $_GET['user-email'];
        // Is it empty?
        if(empty($user_email)) {
            // If so, update the status and add an error message for the field
            $server_results['status'] = 'error';
            $server_results['user-email'] = 'Missing email address';
        }
    }
    // If status is still "success", add the success message
    if($server_results['status'] === 'success') {
        $message = "Success! Thanks for submitting the form, $user_name.";
        $server_results['message'] = $message;
    }
    // Create and then output the JSON data
    $JSON_data = json_encode($server_results, JSON_HEX_APOS | JSON_HEX_QUOT);
    echo $JSON_data;
?>
