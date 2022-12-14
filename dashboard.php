<?php

    // Check if session is started
    if (session_id() == "") session_start();
    // Check if user is logged in
    if (empty($_SESSION["userid"])) header("Location: ./");

    // Display welcome message with username
    echo "<h1>Hello, " . $_SESSION["username"];

    echo "<br><a href='profile.php'>Profile</a>";

    echo "<br><a href='logout.php'>Logout</a>";

?>