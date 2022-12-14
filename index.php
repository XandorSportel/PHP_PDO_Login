<?php

    // Check if session is started
    if (session_id() == "") session_start();
    // Check if user is logged in
    if (isset($_SESSION["userid"])) header("Location: dashboard.php");

    // Require the user class.
    require_once "classes/users.php";

    // Create a new user object.
    $user = new user;

    // Check if the register form is submitted.
    if (isset($_POST["register"])) {
        // Register the user.
        $user->registerUser($_POST["firstname"], $_POST["lastname"], $_POST["username"], $_POST["email"], $_POST["password"]);
        // Redirect to the login page.
        header("location: ./");
    }

    // Check if the login form is submitted.
    if (isset($_POST["login"])) {
        // Login the user.
        $user->checkUser($_POST["user"], $_POST["password"]);
    }



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP PDO Login</title>
    <!--============================== [ CSS ] ==============================-->
    <link rel="stylesheet" href="" type="text/css">
    <link rel="stylesheet" href="" type="text/css">
    <!--============================== [ JS  ] ==============================-->
    <script src=""></script>
    <!--===========================[ Online Imports ]===========================-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</head>
<body style="height: 100vh">
    <div class="container-fluid d-flex justify-content-center" style="">
        <?php if (isset($_GET["action"]) == "register") { ?>
        <form method="post" class="w-25 mt-5 p-3" style="background: rgb(225, 225, 225)">
            <div class="row">
                <div class="col-12">
                    <h1>PHP PDO Login</h1>
                    <p>By: <a href="https://github.com/XandorSportel/">Xandor Sportel</a></p>
                </div>
            </div>
            <div class="row pt-2">
                <div class="col-md-12">
                    <label for="firstname" class="form-label">First Name</label>
                    <input type="text" class="form-control" name="firstname" placeholder="First name" required>
                </div>
            </div>
            <div class="row pt-2">
                <div class="col-md-12">
                    <label for="lastname" class="form-label">Last Name</label>
                    <input type="text" class="form-control" name="lastname" placeholder="Last name" required>
                </div>
            </div>
            <div class="row pt-2">
                <div class="col-md-12">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                </div>
            </div>
            <div class="row pt-2">
                <div class="col-md-12">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Username" required>
                </div>
            </div>
            <div class="row pt-2">
                <div class="col-md-12">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
            </div>
            <div class="row pt-2">
                <div class="col">
                    <input type="submit" value="Registreren" name="register" class="btn btn-primary w-100">
                </div>
            </div>
            <div class="row pt-2">
                <div class="col">
                    <a href="./" class="btn btn-secondary w-100">Inloggen</a>
                </div>
        </form>
        <?php } else { ?>
        <form method="post" class="w-25 mt-5 p-3" style="background: rgb(225, 225, 225)">
            <div class="row">
                <div class="col-12">
                    <h1>PHP PDO Login</h1>
                    <p>By: <a href="https://github.com/XandorSportel/">Xandor Sportel</a></p>
                </div>
            </div>
            <div class="row pt-2">
                <div class="col-md-12">
                    <label for="user" class="form-label">Username / Email</label>
                    <input type="text" class="form-control" name="user" placeholder="Username / Email" required>
                </div>
            </div>
            <div class="row pt-2">
                <div class="col-md-12">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                </div>
            </div>
            <div class="row pt-2">
                <div class="col">
                    <input type="submit" value="Inloggen" name="login" class="btn btn-primary w-100">
                </div>
            </div>
            <div class="row pt-2">
                <div class="col">
                    <a href="./?action=register" class="btn btn-secondary w-100">Registreren</a>
                </div>
            </div>
        </form>
        <?php } ?>
    </div>
</body>
</html>