<?php
    // $dupsko = array(
    //      array(
    //         'firma' => 'major',
    //         'opis' => 'ssiemy siura',
    //         'wyplata' => 'darmo',
    //         'benefity' => [
    //             '1' => 'kaska',
    //             '2' => 'uop',
    //             '3' => 'hajsik na czas'
    //         ]
    //      ),
    //      array(
    //         'firma' => 'suchodolski',
    //         'opis' => 'ssiemy kutasys',
    //         'wyplata' => 'darmo',
    //         'benefity' => [
    //             '1' => 'wolne w swieta'
    //         ]
    //      )
    // );
    //$json = json_encode($dupsko);

    $server = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "rekrutacja";

    // Create connection
    $conn = mysqli_connect($server, $username, $password, $dbname);
    //$result = mysqli_query($conn,$query); 

    //Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $job_offers = "SELECT * FROM job_offer";
    $result = $conn->query($job_offers);

    // Check if there are any rows
    if ($result->num_rows > 0) {
        // Create an empty array to store the rows
        $rows = array();
    
        // Loop through the rows and add them to the array
        while($row = $result->fetch_assoc()) {
        $rows[] = $row;
        }
    }
  
    // Convert the array to a JSON string
    $json = json_encode($rows);

    header('Content-Type: application/json');
    echo $json;
?>