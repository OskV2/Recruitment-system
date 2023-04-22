<?php

    $server = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "rekrutacja";

    $conn = mysqli_connect($server, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $job_offers = "SELECT * FROM job_offer";
    $result = $conn->query($job_offers);

    if ($result->num_rows > 0) {
        $rows = array();
    
        while($row = $result->fetch_assoc()) {
        $rows[] = $row;
        }
    }
    
    $json = json_encode($rows);

    header('Content-Type: application/json');
    echo $json;
?>