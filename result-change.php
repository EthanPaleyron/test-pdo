<?php
try {
    $base = new PDO('mysql:host=127.0.0.1;dbname=base1', 'root', '');
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'UPDATE `posts` SET `Title` =:title, `Comment` =:comment, `File` =:file WHERE Id =:id';
    if (file_exists($_FILES['file']["name"])) {
        unlink($_FILES['file']["name"]);
    }
    $image = rand(1, 1000000) . $_FILES['file']["name"];
    $statement = $base->prepare($sql);
    $statement->execute(array("title" => htmlspecialchars($_POST["title"]), "file" => $image, "comment" => htmlspecialchars($_POST["comment"]), 'id' => $_GET["id"]));
    $statement->closeCursor();
    var_dump($statement);
    header("Location: http://localhost/test-pdo/index.php");
} catch (Exception $e) {
    throw new InvalidArgumentException($e->getMessage());
}
?>