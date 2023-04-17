<?php
$server = "localhost";
$username = "root";
$password = "root";
$dbname = "crm";

$conn = mysqli_connect($server, $username, $password, $dbname);

if(isset($_POST['cena'])){
    if(!empty($_POST['kwota'])){
        $kwota = $_POST['kwota'];
        $firma = $_POST['firemka'];

        $id_query = "select ID from kontrahent where firma = '$firma'";
        $id = mysqli_query($conn, $id_query) or die(mysqli_error($mysql));
        $id_result = mysqli_fetch_row($id);


        $query = "update deal set kwota=$kwota where kontrahent=$id_result[0];";

        $run = mysqli_query($conn, $query) or die(mysqli_error($mysql));

        // Ustawianie stageu dla tabeli deal
        $queryDealStage = "update deal set stage='GOTOWE' where kontrahent=$id_result[0];";
        $runDealStage = mysqli_query($conn, $queryDealStage) or die(mysqli_error($mysql));
    
        // ustawienie stageu dla tabeli kontrahentów
        $queryKontrahentStage = "update kontrahent set stage='GOTOWE' where firma='$firma';";
        $runKontrahentStage = mysqli_query($conn, $queryKontrahentStage) or die(mysqli_error($mysql));

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