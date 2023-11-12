<?php
try {
    $base = new PDO('mysql:host=127.0.0.1;dbname=base1', 'root', '');
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'UPDATE `posts` SET `Title` =:title, `Comment` =:comment, `File` =:file WHERE Id =:id';
    $statement = $base->prepare($sql);
    $statement->execute(array("title" => htmlspecialchars($_POST["title"]), "file" => $image, "comment" => htmlspecialchars($_POST["comment"]), 'id' => $_GET["id"]));
    // $statement->bindParam(':id', $article["id"]);
    // $statement->bindParam(':title', $article["title"]);
    // $statement->bindParam(':file', $article["file"]);
    // $statement->bindParam(':comment', $article["comment"]);
    $statement->closeCursor();
    var_dump($statement);
    // header("Location: http://localhost/test-pdo/articles.php");
} catch (Exception $e) {
    throw new InvalidArgumentException($e->getMessage());
}
?>