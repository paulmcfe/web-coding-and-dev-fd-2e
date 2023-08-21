<?php
    
    display_header('notw.png');
    
    function display_header($img_file) {
        echo "<header>\n";
        echo "<img src=\"images/$img_file\" alt=\"News of the Word logo\">\n";
        echo "<h1>News of the Word</h1>\n";
        echo "<h3>Language news you won't find anywhere else (for good reason!)</h3>\n";
        echo "</header>";
    }
?>