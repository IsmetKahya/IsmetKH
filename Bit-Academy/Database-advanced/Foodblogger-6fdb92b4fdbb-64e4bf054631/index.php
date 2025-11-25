<?php
require_once 'connection.php';

// Haal hier alle posts uit de data base op.
try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$pinda = $pdo->query("SELECT * FROM posts WHERE id = 1")->fetchAll(PDO::FETCH_ASSOC);

foreach ($pinda as $post) {
    $pinda[] = $post;
}

$baklava = $pdo->query("SELECT * FROM posts WHERE id = 2")->fetchAll(PDO::FETCH_ASSOC);

foreach ($baklava as $baklavapost) {
    $baklava[] = $baklavapost;
}

?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <title>Foodblog</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>


    <div class="container">

        <div id="header">
            <h1>Foodblog</h1>
            <p><a href="new_post.php">Nieuwe post</a></p>
        </div>

        <div class="post">

            <div class="header">
                <h2><?php echo $post['titel']; ?></h2>
                <img src="<?php echo $post['img_url']; ?>" alt="<?php echo $post['titel']; ?>">
            </div>

            <span class="details">Geschreven op: <?php echo $post['datum']; ?> door <b> Wim Ballieu</b></span>
            <p>
                <?php echo $post['inhoud']; ?>
            </p>
        </div>

        <div class="post">

            <div class="header">
                <h2>Baklava</h2>
                <img src="<?php echo $baklavapost['img_url']; ?>" alt="Baklava">
            </div>

            <span class="details">Geschreven op: <?php echo $baklavapost['datum']; ?> door <b> Mounir Toub</b></span>
            <p>
                <?php echo $baklavapost['inhoud']; ?>
            </p>
        </div>

    </div>
</body>

</html>