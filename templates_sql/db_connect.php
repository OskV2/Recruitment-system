<?php 
    $server = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "rekrutacja";
    
    $conn = mysqli_connect($server, $username, $password, $dbname);


    // try {
    //     $conn = new PDO("sqlsrv:server = tcp:perc-db-project.database.windows.net,1433; Database = Perc_DB", "DBROOT-Paweł", "percdatabase1@3");
    //     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // }
    // catch (PDOException $e) {
    //     print("Error connecting to SQL Server.");
    //     die(print_r($e));
    // }
?>