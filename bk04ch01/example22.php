<?php
    $currentMonth = date('n');
    switch ($currentMonth) {
        case 12:
        case 1:
        case 2:
            $season = 'winter';
            break;
        case 3:
        case 4:
        case 5:
            $season = 'spring';
            break;
        case 6:
        case 7:
        case 8:
            $season = 'summer';
            break;
        case 9:
        case 10:
        case 11:
            $season = 'fall';
            break;
    }
    switch($season) {
        case 'winter':
            $footwear = 'snowshoes';
            break;
        case 'spring':
            $footwear = 'galoshes';
            break;
        case 'summer':
            $footwear = 'flip-flops';
            break;
        case 'fall':
            $footwear = 'hiking boots';
            break;
    }
    echo "It's $season, so you should be wearing $footwear.";
?>
