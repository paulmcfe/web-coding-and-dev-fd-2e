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
        } else {
            // Does it contain non-alphabetic characters?
            if(!ctype_alpha($user_name)){
                // If so, update the status and add an error message for the field
                $server_results['status'] = 'error';
                $server_results['user-name'] = 'User name must be text';
            } else {
                // Does the user name contains less than 3 or more than 12 characters?
                if(strlen($user_name) < 3 || strlen($user_name) > 12) {
                    // If so, update the status and add an error message for the field
                    $server_results['status'] = 'error';
                    $server_results['user-name'] = 'User name must be 3 to 12 characters long';
                }
            }
        }
    }
    // If status is still "success", add the success message
    if($server_results['status'] === 'success') {
        $message = "Success! Thanks for submitting the form, $user_name.";
        $server_results['message'] = $message;
    }
    // Create and then output the JSON array
    $JSON_data = json_encode($server_results, JSON_HEX_APOS | JSON_HEX_QUOT);
    echo $JSON_data;
?>
