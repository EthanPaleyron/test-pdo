<?php
session_start();
try {
    $base = new PDO('mysql:host=127.0.0.1;dbname=base1', 'root', '');
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = ('SELECT * FROM login_password WHERE login =:login AND password =:password;');
    $resultat = $base->prepare($stmt);
    $resultat->execute(array("login" => $_POST["login"], "password" => $_POST["password"]));
    if ($donnees = $resultat->fetch()) {
        $_SESSION["id"] = $donnees["Id"];
        $_SESSION["login"] = $_POST["login"];
        $_SESSION["password"] = $_POST["password"];
        header("Location: http://localhost/test-pdo/articles.php");
    } else {
        echo ("login incorect!");
    }
    $resultat->closeCursor();
} catch (Exception $e) {
    throw new InvalidArgumentException($e->getMessage());
}
?>