<pre>
<?php
    for ($i = 0; $i < 12; $i++) {
        $randoms[$i] = rand(1, 100);
        var_dump($i);
    }
    var_dump($randoms);
?>
</pre>