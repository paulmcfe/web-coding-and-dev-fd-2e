<?php
    $currentHour = date('H');
    if ($currentHour < 12) {
        $greeting = "Good morning!";
    } else {
        $greeting = "Good day!";
    }
    echo $greeting;
?>
