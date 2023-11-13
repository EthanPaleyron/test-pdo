<?php
session_start();
session_destroy();
header("Location: http://localhost/test-pdo/index.php");
?>