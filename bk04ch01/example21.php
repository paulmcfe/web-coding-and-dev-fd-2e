<?php
    $currentHour = date('H');
    if ($currentHour < 12) {
        $greeting = "Good morning!";
    } elseif ($currentHour < 18) {
        $greeting = "Good afternoon!";
    } else {
        $greeting = "Good evening!";
    }
    echo $greeting;
?>
