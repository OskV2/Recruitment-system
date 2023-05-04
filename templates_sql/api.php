<?php
include('../templates_sql/db_connect.php');


$job_offers = "SELECT * FROM job_offer";
$result = $conn->query($job_offers);

$rows = $result->fetchAll(PDO::FETCH_ASSOC);
$json = json_encode($rows);

header('Content-Type: application/json');
echo $json;
?>
