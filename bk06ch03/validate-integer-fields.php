<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');

    // Store the default status
    $server_results['status'] = 'success';
    
    // Check the user-age field
    if(isset($_GET['user-age'])) {
        $user_age = $_GET['user-age'];
        // Is it empty?
        if(empty($user_age)) {
            // If so, update the status and add an error message for the field
            $server_results['status'] = 'error';
            $server_results['user-age'] = 'Missing age value';
        } else {
            // Is the field not an integer?
            
            if(!filter_var($user_age, FILTER_VALIDATE_INT)){
                // If so, update the status and add an error message for the field
                $server_results['status'] = 'error';
                $server_results['user-age'] = 'Age must be an integer';
            } else {
                // Is the age not between 14 and 114?
                $options = array('options' => array('min_range' => 14, 'max_range' => 114));
                if(!filter_var($user_age, FILTER_VALIDATE_INT, $options)) {
                    // If so, update the status and add an error message for the field
                    $server_results['status'] = 'error';
                    $server_results['user-age'] = 'Age must be between 14 and 114';
                }
            }
        }
    }
    // If status is still "success", add the success message
    if($server_results['status'] === 'success') {
        $message = "Success! You don’t look a day over " . intval($user_age - 1) . ".";
        $server_results['message'] = $message;
    }
    // Create and then output the JSON array
    $JSON_data = json_encode($server_results, JSON_HEX_APOS | JSON_HEX_QUOT);
    echo $JSON_data;
?>
