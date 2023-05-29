<?php
// PHP Data Objects(PDO) Sample Code:
try {
    $conn = new PDO("sqlsrv:server = tcp:perc-db-project.database.windows.net,1433; Database = Perc_DB", "DBROOT-Paweł", "percdatabase1@3");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

// SQL Server Extension Sample Code:
// $connectionInfo = array("UID" => "DBROOT-Paweł", "pwd" => "percdatabase1@3", "Database" => "Perc_DB", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
// $serverName = "tcp:perc-db-project.database.windows.net,1433";
// $conn = sqlsrv_connect($serverName, $connectionInfo);
// $connTest = new PDO ("sqlsrv:Server = tcp:perc-db-project.database.windows.net,1433; Database = Perc_DB","DBROOT-Paweł","percdatabase1@3")
?>