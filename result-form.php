<?php
session_start();
try {
    $base = new PDO('mysql:host=127.0.0.1;dbname=base1', 'root', '');
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO `posts` (`Title`, `Date`, `File`, `Comment`, `User_id`) VALUES (:title, :date, :file, :comment,:user_id)";
    $statement = $base->prepare($sql);
    $image = rand(1, 1000000) . $_FILES['file']["name"];
    move_uploaded_file($_FILES['file']['tmp_name'], "files/" . $image);
    $article = array("title" => htmlspecialchars($_POST["title"]), "date" => date('d.m.y'), "file" => $image, "comment" => htmlspecialchars($_POST["comment"]), "user_id" => $_SESSION["id"]);
    $statement->bindParam(':user_id', $article["user_id"]);
    $statement->bindParam(':title', $article["title"]);
    $statement->bindParam(':date', $article["date"]);
    $statement->bindParam(':file', $article["file"]);
    $statement->bindParam(':comment', $article["comment"]);
    $statement->execute();
    header("Location: http://localhost/test-pdo/articles.php");
} catch (Exception $e) {
    throw new InvalidArgumentException($e->getMessage());
}
?>