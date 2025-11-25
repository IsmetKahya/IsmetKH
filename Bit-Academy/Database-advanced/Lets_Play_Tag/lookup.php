<?php

require_once 'connection.php';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}

if (isset($_POST['like'])) {
    $post_id = $_POST['post_id'];
    $sql = "UPDATE posts SET likes = likes + 1 WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $post_id);
    $stmt->execute();

    header("Location: lookup.php?tag=" . urlencode($_GET['tag']));
    exit;
}

if (!isset($_GET['tag']) || empty($_GET['tag'])) {
    die("Geen tag opgegeven.");
}

$tag = $_GET['tag'];

$sql = "
    SELECT p.*, a.naam AS auteur
    FROM posts p
    JOIN auteurs a ON p.author_id = a.id
    JOIN posts_tags pt ON p.id = pt.post_id
    JOIN tags t ON pt.tag_id = t.id
    WHERE t.title = :tag
    ORDER BY p.likes DESC, p.datum DESC
";

$stmt = $pdo->prepare($sql);
$stmt->execute(['tag' => $tag]);
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Posts met tag: <?= htmlspecialchars($tag) ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <div id="header">
        <h1>Posts met tag: <?= htmlspecialchars($tag) ?></h1>
        <p><a href="index.php">Terug naar Home</a></p>
    </div>

    <?php foreach ($posts as $post) : ?>
        <div class="post">
            <div class="header">
                <h2><?= htmlspecialchars($post['titel']); ?></h2>
                <img src="<?= htmlspecialchars($post['img_url']); ?>" 
                     alt="<?= htmlspecialchars($post['titel']); ?>">
            </div>

            <span class="details">
                Geschreven op: <?= htmlspecialchars($post['datum']); ?>
                door <?= htmlspecialchars($post['auteur']); ?>

                <?php
                $stmtTags = $pdo->prepare("
                    SELECT t.title 
                    FROM tags t
                    JOIN posts_tags pt ON t.id = pt.tag_id
                    WHERE pt.post_id = ?
                ");
                $stmtTags->execute([$post['id']]);
                $tags = $stmtTags->fetchAll(PDO::FETCH_COLUMN);
                ?>

                <?php foreach ($tags as $t) : ?>
                    <a href="lookup.php?tag=<?= urlencode($t) ?>">
                        <?= htmlspecialchars($t) ?>
                    </a>
                <?php endforeach; ?>
            </span>

            <p><?= nl2br(htmlspecialchars($post['inhoud'])); ?></p>

            <form method="POST" action="lookup.php?tag=<?= urlencode($tag) ?>">
                <input type="hidden" name="post_id" value="<?= $post['id']; ?>">
                <button type="submit" name="like">
                    Like (<?= $post['likes']; ?>)
                </button>
            </form>
        </div>
    <?php endforeach; ?>
</div>

</body>
</html>
