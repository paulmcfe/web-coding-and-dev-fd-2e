<?php
    $original_amount = 100;
    $new_amount = 137;
    if ($original_amount !== 0) {
        $percent_increase = 100 * (($new_amount - $original_amount) / $original_amount);
    }
    echo $percent_increase . '%';

?>