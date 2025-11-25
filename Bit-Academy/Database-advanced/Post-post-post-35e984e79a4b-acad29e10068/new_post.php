<?php

require_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titel = $_POST['titel'];
    $img_url = $_POST['img_url'];
    $inhoud = $_POST['inhoud'];

    try {
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO posts (titel, img_url, inhoud, datum) VALUES (:titel, :img_url, :inhoud, NOW())";

        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':titel', $titel);
        $stmt->bindParam(':img_url', $img_url);
        $stmt->bindParam(':inhoud', $inhoud);

        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
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

        <input type="submit" value="Toevoegen">
    </form>

</body>

</html>