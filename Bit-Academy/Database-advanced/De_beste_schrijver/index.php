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
    header("Location: index.php");
    exit;
}

$sql = "
    SELECT posts.*, auteurs.naam AS auteur FROM posts JOIN auteurs ON 
    posts.author_id = auteurs.id ORDER BY posts.likes DESC, posts.datum DESC";
$populairechefs = "
    SELECT auteurs.naam, SUM(posts.likes) AS totaal_likes
    FROM auteurs
    JOIN posts ON auteurs.id = posts.author_id
    GROUP BY auteurs.naam
    HAVING totaal_likes > 10
    ORDER BY totaal_likes DESC
";
$populairechefs = $pdo->query($populairechefs)->fetchAll(PDO::FETCH_ASSOC);

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
<?php foreach ($populairechefs as $chef) : ?>
        <div class="popular-chef">
            <h3>Populaire chef: <?php echo htmlspecialchars($chef['naam']); ?> (<?php echo $chef['totaal_likes']; ?> likes)</h3>
        </div>
<?php endforeach; ?>
        <?php foreach ($posts as $post) : ?>
            <div class="post">
                <div class="header">
                    <h2><?php echo htmlspecialchars($post['titel']); ?></h2>
                    <img src="<?php echo htmlspecialchars($post['img_url']); ?>" alt="<?php echo htmlspecialchars($post['titel']); ?>">

                    
                </div>
                
                <span class="details">
                    Geschreven op: <?php echo htmlspecialchars($post['datum']); ?>
                    door <?php echo htmlspecialchars($post['auteur']); ?>
                </span>
                
                <p><?php echo nl2br(htmlspecialchars($post['inhoud'])); ?></p>
                <form method="POST" action="index.php">
                <input type="hidden" name="post_id" value="<?php echo $post['id']; ?>">
                    <button type="submit" name="like">Like (<?php echo $post['likes']; ?>)</button>
                </form>
            </div>
        <?php endforeach; ?>

    </div>
</body>

</html>