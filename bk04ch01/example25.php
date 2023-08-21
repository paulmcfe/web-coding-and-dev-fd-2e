<pre>
<?php
    $counter = 0;
    do {
        // Generate a random number between 1 and 100
        $randoms[$counter] = rand(1, 100);
        $counter++;
    }
    while ($counter < 12);
    print_r($randoms);
?>
</pre>