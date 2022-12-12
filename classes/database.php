<?php

    /**
     * PHP PDO Login System
     * 
     * @see https://github.com/XandorSportel/PHP_PDO_Login
     * @author Xandor Sportel
     * 
     */

    class database {

        function getConnection() {

            // Database credentials
            $host = "localhost";
            $user = "root";
            $pass = "";
            $name = "PDOLogin";

            // Create connection
            $con = new PDO("mysql:host=$host; dbname=$name", $user, $pass);
            // Return it so it can be included in other files
            return $con;

        }

    }