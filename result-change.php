<?php
try {
    $base = new PDO('mysql:host=127.0.0.1;dbname=_test', 'root', '');
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'UPDATE `posts` SET `Title` =:title, `Comment` =:comment, `File` =:file WHERE Id =:id';
    $resultat = $base->prepare($sql);
    $resultat->execute(array("title" => htmlspecialchars($_POST["title"]), "file" => $image, "comment" => htmlspecialchars($_POST["comment"]), 'id' => $_GET["id"]));
    var_dump($resultat);
    $resultat->closeCursor();
} catch (Exception $e) {
    throw new InvalidArgumentException($e->getMessage());
}
?>