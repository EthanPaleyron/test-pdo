<?php
session_start();
if (!isset($_SESSION["login"]) && !isset($_SESSION["password"])) {
    header("Location: http://localhost/test-pdo/login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="result-form.php" method="post" enctype="multipart/form-data">
        <label for="title">Titre:</label>
        <input type="text" name="title" id="title" value="<script>alert('hello');</script>">
        <label for="comment">Commentaire:</label>
        <textarea name="comment" id="comment" cols="30"
            rows="10">Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis, nam laboriosam! Esse quae atque pariatur similique aliquam, minus quo qui consequatur quasi perferendis, optio ut explicabo necessitatibus. Beatae, hic. Accusamus.</textarea>
        <input type="hidden" name="MAX_FILE_SIZE" value="2097152">
        <label for="file">Choisissez une photo avec uen taille inférieure à 2 Mo.</label>
        <input type="file" name="file" id="file">
        <input type="submit" value="Envoyer">
    </form>
    <a href="articles.php">page d'affichage du blog</a>
</body>

</html>