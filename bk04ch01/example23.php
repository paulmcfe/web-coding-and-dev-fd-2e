<pre>
<?php
    $counter = 1;
    while ($counter <= 12) {
        // Generate a random number between 1 and 100
        $randoms[$counter - 1] = rand(1, 100);
        $counter++;
    }
    print_r($randoms);
?>
</pre>