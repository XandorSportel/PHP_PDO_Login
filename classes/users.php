<?php

    /**
     * PHP PDO Login System
     * 
     * @see https://github.com/XandorSportel/PHP-PDO-Login-System
     * @author Xandor Sportel
     * 
     */

    require_once "database.php";

    class users {

        // Function to get all users in the database.
        public function getUsers() {

            // Require the database class.
            $db = new database;
            // Open the connection.
            $con = $db->getConnection();

            // Prepare the SQL Query.
            $stmt = $con->prepare("SELECT * FROM `users`");
            // Execute the query.
            $stmt->execute();
            // Fetch the results.
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Return the results so they can be used in other files.
            return $result;

        }

        // Function to get a user by their ID.
        public function getUserById($id) {

            // Require the database class.
            $db = new database;
            // Open the connection
            $con = $db->getConnection();
            // Prepare the SQL Query.
            $stmt = $con->prepare("SELECT * FROM `users` WHERE `id` = $id");
            // Execute the query.
            $stmt->execute();
            // Fetch the results.
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Return the results so they can be used in other files.
            return $result;

        }

    }

    class user extends users {

        // Register Function.
        public function registerUser(string $firstName, string $lastName, string $userName, string $email, string $password) {

            // Require the database class.
            $db = new database;
            // Open the connection.
            $con = $db->getConnection();

            // Hash the password.
            $password = password_hash($password, PASSWORD_DEFAULT);

            // Prepare the SQL Query.
            $stmt = $con->prepare("INSERT INTO `users` (`firstname`, `lastname`, `username`, `email`, `password`, `registerDate`) VALUES ('$firstName', '$lastName', '$userName', '$email', '$password', NOW())");
            // Execute the query.
            $stmt->execute();

        }

        // Login Function.
        public function checkUser(string $login, string $password) {

            // Require the database class.
            $db = new database;
            // Open the connection.
            $con = $db->getConnection();

            // Prepare the SQL Query.
            $stmt = $con->prepare("SELECT * FROM `users` WHERE (`username`= :user OR `email` = :user)");
            // Bind the parameters.
            $stmt->bindParam(":user", $login);
            // Execute the query.
            $stmt->execute();

            // Fetch the results.
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            // Check if the user exists.
            if ($result) {
                echo "User exists.";
                // Check if the password is correct.
                if (password_verify($password, $result["password"])) {
                    // Set the session variables.
                    $_SESSION["userid"] = (int)$result["id"];
                    $_SESSION["username"] = $result["username"];
                    header("location: dashboard.php");
                } else {
                    // Code to run if the password is incorrect.

                }
            } else {
                // Code to run if the user doesn't exist.
                echo "User doesn't exist.";
            }

        } 

    }