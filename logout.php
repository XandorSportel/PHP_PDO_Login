<?php

    if (session_id() == "") session_start();
    unset($_SESSION["userid"]);
    unset($_SESSION["username"]);
    header("Location: ./");