<?php

    // Check if session is started
    if (session_id() == "") session_start();
    // Clear the userid and username session variables
    unset($_SESSION["userid"]);
    unset($_SESSION["username"]);
    // Redirect to the index page
    header("Location: ./");