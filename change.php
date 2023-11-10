<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    echo '<form action="result-change.php?id=' . $_GET["id"] . '" method="post" enctype="multipart/form-data">';
    $base = new PDO('mysql:host=127.0.0.1;dbname=base1', 'root', '');
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT Title, File, Comment FROM `posts` WHERE Id =:id";
    $resultat = $base->prepare($sql);
    $resultat->execute(array('id' => $_GET["id"]));
    $e = $resultat->fetch();
    echo ('<label for="title">Titre:</label>
                <input type="text" name="title" id="title" value="' . $e["Title"] . '">
                <label for="comment">Commentaire:</label>
                <textarea name="comment" id="comment" cols="30" rows="10">' . $e["Comment"] . '</textarea>
                <input type="hidden" name="MAX_FILE_SIZE" value="2097152">
                <label for="file">Choisissez une photo avec uen taille inférieure à 2 Mo.</label>
                <input type="file" name="file" id="file">
                <img src="files/' . $e["File"] . '" alt="img">
            ');
    $resultat->closeCursor();
    ?>
    <input type="submit" value="Envoyer">
    </form>
    <a href="articles.php">page d'affichage du blog</a>
</body>

</html>