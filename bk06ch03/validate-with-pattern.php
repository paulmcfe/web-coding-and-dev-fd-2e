<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');

    // Store the default status
    $server_results['status'] = 'success';
    
    // Check the user-age field
    if(isset($_GET['account-number'])) {
        $account_number = $_GET['account-number'];
        // Is it empty?
        if(empty($account_number)) {
            // If so, update the status and add an error message for the field
            $server_results['status'] = 'error';
            $server_results['account-number'] = 'No account entered!';
        } else {
            // Does the account number match the pattern?            
            if(!preg_match('/[A-Z]{2}-[0-9]{5}/', $account_number)){
                // If so, update the status and add an error message for the field
                $server_results['status'] = 'error';
                $server_results['account-number'] = 'The account number must use the AA-12345 format.';
            }
        }
    }
    // If status is still "success", add the success message
    if($server_results['status'] === 'success') {
        $message = "Success!";
        $server_results['message'] = $message;
    }
    // Create and then output the JSON array
    $JSON_data = json_encode($server_results, JSON_HEX_APOS | JSON_HEX_QUOT);
    echo $JSON_data;
?>
