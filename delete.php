<?php
session_start();
try {
    $base = new PDO('mysql:host=127.0.0.1;dbname=base1', 'root', '');
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM `posts` WHERE Id =:id";
    $resultat = $base->prepare($sql);
    $resultat->execute(array('id' => $_GET["id"]));
    $resultat->closeCursor();
    header("Location: http://localhost/test-pdo/index.php");
} catch (Exception $e) {
    throw new InvalidArgumentException($e->getMessage());
}
?>