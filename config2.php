<?php
    // Function to establish MySQL database connection
    function connectToMySQL() {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "ussd";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        return $conn; // Return the database connection object
    }
?>
