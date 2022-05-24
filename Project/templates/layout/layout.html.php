<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://jokes.test/stylesheets/css/jokes.css" type="text/css">
    <title><?= $title ?></title>
</head>

<body>

    <header>
        <h1>Internet Joke Databse</h1>
    </header>
    <nav>
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/joke/list">Jokes List</a></li>
            <li><a href="/joke/edit">Add new joke</a></li>

            <?php if ($loggedIn) : ?>
                <li><a href="/logout">Log out</a></li>
            <?php else : ?>
                <li><a href="/login">Log in</a></li>
            <?php endif; ?>
        </ul>
    </nav>

    <main>
        <?= $output ?>
    </main>

    <footer>
        &copy; <?= date('Y') ?>
    </footer>
</body>

</html>