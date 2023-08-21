<pre>
<?php
    for ($counter = 0; $counter < 12; $counter++) {
        // Generate a random number between 1 and 100
        $randoms[$counter] = rand(1, 100);
    }
    print_r($randoms);
?>
</pre>