<?php

    if (session_id() == "") session_start();
    if (empty($_SESSION["userid"])) header("Location: ./");

    echo "<h1>Hello, " . $_SESSION["username"];

    echo "<br><a href='profile.php'>Profile</a>";

    echo "<br><a href='logout.php'>Logout</a>";

?>