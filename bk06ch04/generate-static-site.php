<?php

// Put the unique page data into an array of arrays
$pages = [
    [
        'filename' => 'index.html',
        'title'    => 'Home Page',
        'subtitle' => 'The Home Page Subtitle',
        'content'  => 'This is the content for the home page.'
    ],
    [
        'filename' => 'page1.html',
        'title'    => 'Page 1',
        'subtitle' => 'The Page 1 Subtitle',
        'content'  => 'This is the content for Page 1.'
    ],
    [
        'filename' => 'page2.html',
        'title'    => 'Page 2',
        'subtitle' => 'The Page 2 Subtitle',
        'content'  => 'This is the content for Page 2.'
    ],
    [
        'filename' => 'page3.html',
        'title'    => 'Page 3',
        'subtitle' => 'The Page 3 Subtitle',
        'content'  => 'This is the content for Page 3.'
    ]
];

// Set up some variables
$total_pages = count($pages);
$current_page = 1;

// Loop through each page and generate the static HTML file
foreach ($pages as $page) {
    
    // Start buffering the output
    ob_start();
    
    // Create the link to the next page
    if ($current_page === $total_pages) {
        $current_page = 1;
        $next_page = '<a href="' . $pages[0]['filename'] . '">' . $pages[0]['title'] . '</a>';
    } else {
        $next_page = '<a href="' . $pages[$current_page]['filename'] . '">' . $pages[$current_page]['title'] . '</a>';
    }

    // Include the template file
    include 'template.php';
    
    // Save the buffered content
    $htmlContent = ob_get_clean();

    // Save the content to the static HTML file
    file_put_contents($page['filename'], $htmlContent);
    
    echo "Static file " . $page['filename'] . " generated!\r\n";

    // Increment the current page number
    $current_page++;
}
?>
