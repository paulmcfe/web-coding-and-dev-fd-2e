<?php
    if (isset($_GET['book'])) {
        $book_num = $_GET['book'];
    } else {
        echo 'The "book" parameter is missing!<br>';
        echo 'We are done here, sorry.';
        exit(0);
    }
    if (isset($_GET['chapter'])) {
        $chapter_num = $_GET['chapter'];
    } else {
        echo 'The "chapter" parameter is missing!<br>';
        echo 'Sorry it didn\'t work out. ';
        exit(0);
    }
    if (isset($_GET['example'])) {
        $example_num = $_GET['example'];
    } else {
        echo 'The "example" parameter is missing!<br>';
        echo 'You had <em>one</em> job! ';
        exit(0);
    }
    echo 'Got the query string!<br>
          Book number: ' . $book_num . '<br>
          Chapter number: ' . $chapter_num . '<br>
          Example number: ' . $example_num . '<br>';
?>