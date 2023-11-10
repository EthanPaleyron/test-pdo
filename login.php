<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="verif-login.php" method="post">
        <label for="login">login:</label>
        <input type="text" name="login" id="login" value="toto">
        <label for="password">mots de passe:</label>
        <input type="password" name="password" id="password" value="secret">
        <input type="submit" value="Envoyer">
    </form>
    <?php
    session_start();
    if (isset($_SESSION["login"])) {
        $_SESSION["login"] = [];
    }
    if (!isset($_SESSION["password"])) {
        $_SESSION["password"] = [];
    }
    ?>
</body>

</html>