<?php
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');

    // Filter the name field 
    if (isset($_POST['name'])) {
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
    } else {
        echo 'The "name" parameter is missing!<br>';
        echo 'We are done here, sorry.';
        exit(0);
    }

    // Filter the email field 
    if (isset($_POST['email'])) {
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    } else {
        echo 'The "email" parameter is missing!<br>';
        echo 'We are done here, sorry.';
        exit(0);
    }

    // Filter the age field 
    if (isset($_POST['age'])) {
        $age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_NUMBER_INT);
    } else {
        echo 'The "age" parameter is missing!<br>';
        echo 'We are done here, sorry.';
        exit(0);
    }

    // Filter the score field 
    if (isset($_POST['score'])) {
        $score = filter_input(INPUT_POST, 'score', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    } else {
        echo 'The "score" parameter is missing!<br>';
        echo 'We are done here, sorry.';
        exit(0);
    }
    
    // Put the filtered data into an array 
    $form_data = array('name' => $name,
                       'email' => $email,
                       'age' => $age,
                       'score' => $score);

    // Convert the array to JSON
    $JSON_data = json_encode($form_data, JSON_HEX_APOS | JSON_HEX_QUOT);

    // Output the JSON
    echo $JSON_data;
?>
