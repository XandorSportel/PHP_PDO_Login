<?php

    // Check if session is started
    if (session_id() == "") session_start();
    // Check if user is logged in
    if (empty($_SESSION["userid"])) header("Location: ./");

    // Require the database class.
    require_once "classes/database.php";

    // Create a new database object.
    $db = new database;
    // Open the connection.
    $con = $db->getConnection();

    // Get the logged in user's ID.
    $id = $_SESSION["userid"];

    // Prepare the SQL Query.
    $stmt = $con->prepare("SELECT * FROM `users` WHERE `id` = $id");
    // Execute the query.
    $stmt->execute();
    // Fetch the results.
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

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
        <div class="profile-section w-50 mt-5">
            <div class="card">
                <div class="card-body">
                    <div class="card-text"><a href="dashboard.php">Dashboard</a></div>
                    <span class="card-title">Profile</span>
                    <div class="row pt-2">
                        <div class="col-md-3"><b>Voornaam</b></div>
                        <div class="col-md-9"><?php echo $result["firstname"]; ?></div>
                    </div>
                    <div class="row pt-2">
                        <div class="col-md-3"><b>Achternaam</b></div>
                        <div class="col-md-9"><?php echo $result["lastname"]; ?></div>
                    </div>
                    <div class="row pt-2">
                        <div class="col-md-3"><b>Email</b></div>
                        <div class="col-md-9"><?php echo $result["email"]; ?></div>
                    </div>
                    <div class="row pt-2">
                        <div class="col-md-3"><b>Gebruikersnaam</b></div>
                        <div class="col-md-9"><?php echo $result["username"]; ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>