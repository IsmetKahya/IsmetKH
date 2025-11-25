<?php

require_once 'connection.php';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titel = $_POST['titel'];
    $img_url = $_POST['img_url'];
    $inhoud = $_POST['inhoud'];
    $author_id = $_POST['author_id'];
    $tagsInput = $_POST['tags'];

    $sql = "INSERT INTO posts (titel, img_url, inhoud, datum, author_id)
            VALUES (:titel, :img_url, :inhoud, NOW(), :author_id)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':titel' => $titel,
        ':img_url' => $img_url,
        ':inhoud' => $inhoud,
        ':author_id' => $author_id
    ]);
    $post_id = $pdo->lastInsertId();

    $tagsArray = array_map('trim', explode(',', $tagsInput));

    foreach ($tagsArray as $tagName) {
        if (empty($tagName)) {
            continue;
        }
        $stmtTag = $pdo->prepare("SELECT id FROM tags WHERE title = :title");
        $stmtTag->execute([':title' => $tagName]);
        $tag = $stmtTag->fetch(PDO::FETCH_ASSOC);

        if ($tag) {
            $tag_id = $tag['id'];
        } else {
            $stmtInsert = $pdo->prepare("INSERT INTO tags (title) VALUES (:title)");
            $stmtInsert->execute([':title' => $tagName]);
            $tag_id = $pdo->lastInsertId();
        }

        $stmtPostTag = $pdo->prepare("INSERT INTO posts_tags (post_id, tag_id) VALUES (:post_id, :tag_id)");
        $stmtPostTag->execute([
            ':post_id' => $post_id,
            ':tag_id' => $tag_id
        ]);
    }

    header("Location: index.php");
    exit;
}
?>



<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add</title>
</head>

<body>

    <h1>Nieuwe post toevoegen</h1>
    <a href="index.php">Kijk naar alle posten</a>

    <form method="POST" action="new_post.php">

        <label for="titel">Titel:</label><br>
        <input type="text" id="titel" name="titel" required><br><br>

        <label for="img_url">Afbeeldings URL:</label><br>
        <input type="text" id="img_url" name="img_url" required><br><br>

        <label for="inhoud">Inhoud:</label><br>
        <textarea id="inhoud" name="inhoud" rows="4" cols="50" required></textarea><br><br>

        <label for="author_id">Auteur:</label><br>
        <select id="author_id" name="author_id" required>
            <option value="1">Mounir Toub</option>
            <option value="2">Miljuschka</option>
            <option value="3">Wim Ballieu</option>
        </select><br><br>

        <label for="tags">Tags</label><br>
        <input type="text" id="tags" name="tags" placeholder="Italiaans,Vegan,Pasta"><br><br>


        <input type="submit" value="Toevoegen">
    </form>

</body>

</html>