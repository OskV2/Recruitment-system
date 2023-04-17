<?php
$server = "localhost";
$username = "root";
$password = "root";
$dbname = "rekrutacja";

$conn = mysqli_connect($server, $username, $password, $dbname);

if(isset($_POST['deal'])){
    if(!empty($_POST['date'])){
        $data = $_POST['date'];
        $firma = $_POST['identify'];
        
        $id_query = "select App_Id from application where Phone='$firma'";
        $id = mysqli_query($conn, $id_query) or die(mysqli_error());
        $id_result = $id->fetch_array();

        $query = "UPDATE application SET Data_rozmowy = '$data' WHERE App_Id = $id_result[0];";

        $run = mysqli_query($conn, $query) or die(mysqli_error());

        // Ustawianie stageu dla tabeli deal
        $queryStage = "update application set Status=3 where App_Id=$id_result[0];";
        $runStage = mysqli_query($conn, $queryStage) or die(mysqli_error());

        if($run){
            echo "działa";
        }
        else{
            echo "nie działa";
        }
    }
    else{
        echo "wszystkie pola wymagane";
    }
}
?>