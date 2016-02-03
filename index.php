<?php
session_start();
include "game.php";
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>card</title>
</head>
<body>

<form method="post">
    <input type="submit" name="choice" value="Piocher">
    <br>
    <input type="submit" name="pass" value="Arrêter">
    <br>
    <input type="submit" name="reset" value="Recommencer">
</form>

</body>
</html>
