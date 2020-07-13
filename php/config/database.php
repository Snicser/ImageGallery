<?php

    /**
     * @return PDO
     * Returns a connection
     */
    function getDatabaseConnection()
    {
        // Method variable for the connection
        $servername = "localhost";
        $dbname = "imagegallery";
        $username = "root";
        $password = "";

        static $connection;

        try {
            // Check if there is already a connection;
            if ($connection) return $connection;

            // Creates a new PHP Data Objects connection to a SQL server
            $connection = new PDO('mysql:host=' . $servername . ';dbname=' . $dbname, $username, $password);

            // Set the PDO error mode to exception
            $connection->setAttribute(PDO::ERRMODE_WARNING, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            // If the connection fails print a error message
            echo "Connection failed: " . $e -> getMessage() . "<br>";
        }

        return $connection;
    }