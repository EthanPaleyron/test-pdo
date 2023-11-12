<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Blog</h1>
    <nav>
        <ul>
            <?php
            session_start();
            if (!isset($_SESSION["login"]) && !isset($_SESSION["password"])) {
                echo "<li><a href='login.php'>Login</a></li>";
            } else {
                echo "<li><a href='logout.php'>Logout</a></li>";
            }
            ?>
            <li><a href="create-article.php">Create new post</a></li>
        </ul>
        <?php
        if (isset($_SESSION["login"]) && isset($_SESSION["password"])) {
            echo ("<h2>Connecté en tant que " . $_SESSION["login"] . "</h2>");
        }
        ?>
    </nav>
    <article>
        <?php
        try {
            $base = new PDO('mysql:host=127.0.0.1;dbname=base1', 'root', '');
            $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM posts";
            $base->query($sql);
            $resultat = $base->query($sql);
            while ($e = $resultat->fetch()) {
                echo ("<article>
                    <img src='files/" . $e["File"] . "' alt='" . $e["File"] . "'>
                    <p>By " . $e["user_id"] . "</p>
                    <h2>" . $e["Title"] . "</h2>
                    <p>Crée le <time datatime='" . $e["Date"] . "'>" . $e["Date"] . "</time></p>
                    <p>" . $e["Comment"] . "</p>
                    <ul>");
                if (isset($_SESSION["id"]) === isset($e["user_id"])) {
                    echo "<li><a href='change.php?id=" . $e["Id"] . "'>Change</a></li>";
                    echo "<li><a href='delete.php?id=" . $e["Id"] . "'>Delete</a></li>";
                }
                echo ("</ul>
                </article>");
            }
        } catch (Exception $e) {
            throw new InvalidArgumentException($e->getMessage());
        }
        ?>
    </article>
</body>

</html>