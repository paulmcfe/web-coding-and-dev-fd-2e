<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo $page['title']; ?></title>
        <link href="styles.css" rel="stylesheet">
    </head>
    <body>
        <header>
            <h1>My Static Site</h1>
            <p class="subtitle">“Look, ma, no server!”</p>
        </header>
        <nav>
            <?php include "nav.html" ?>
        </nav>        
        <main>
            <article>
                <h2><?php echo $page['title']; ?></h2>
                <h3><?php echo $page['subtitle']; ?></h3>
                <p>
                    <?php echo $page['content']; ?>
                </p>
                <p>
                    Next page: <?php echo $next_page; ?>
                </p>
            </article>
        </main>        
        <footer>
            &copy; <?php echo date("Y"); ?> Paul McFedries
        </footer>
    </body>
</html>