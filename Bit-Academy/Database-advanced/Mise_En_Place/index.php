<?php

require_once 'connection.php';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}

$sql = " SELECT posts.*, auteurs.naam AS auteur FROM posts JOIN auteurs ON posts.author_id = auteurs.id ORDER BY datum DESC ";

$posts = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

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

        <?php foreach ($posts as $post) : ?>
            <div class="post">
                <div class="header">
                    <h2><?php echo htmlspecialchars($post['titel']); ?></h2>
                    <img src="<?php echo htmlspecialchars($post['img_url']); ?>" alt="<?php echo htmlspecialchars($post['titel']); ?>">
                </div>

                <span class="details">
                    Geschreven op: <?php echo htmlspecialchars($post['datum']); ?>
                    door: <?php echo htmlspecialchars($post['auteur']); ?>
                </span>

                <p><?php echo nl2br(htmlspecialchars($post['inhoud'])); ?></p>
            </div>
        <?php endforeach; ?>

    </div>
</body>

</html>
