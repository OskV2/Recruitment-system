<?php
$server = "localhost";
$username = "root";
$password = "root";
$dbname = "crm";

$conn = mysqli_connect($server, $username, $password, $dbname);

if(isset($_POST['deal'])){
    if(!empty($_POST['produkty']) && !empty($_POST['data'])){
        $produkt = $_POST['produkty'];
        $data = $_POST['data'];
        $firma = $_POST['firemka'];
        $przedstawiciel = $_POST['123'];

        $id_query = "select ID from kontrahent where firma = '$firma'";
        $id = mysqli_query($conn, $id_query) or die(mysqli_error($mysql));
        $id_result = mysqli_fetch_row($id);

        $id_query_przedstawiciel = "select ID from przedstawiciele where name = '$przedstawiciel'";
        $id_przedstawiciela = mysqli_query($conn, $id_query_przedstawiciel) or die(mysqli_error($mysql));
        $id_result_przedstawiciel = mysqli_fetch_row($id_przedstawiciela);


        $query = "insert into deal(produkt,data,kontrahent,przedstawiciel) values('$produkt','$data',$id_result[0],'$id_result_przedstawiciel[0]')";

        $run = mysqli_query($conn, $query) or die(mysqli_error());

        // Ustawianie stageu dla tabeli deal
        $queryDealStage = "update deal set stage='ONBOARDING' where kontrahent=$id_result[0];";
        $runDealStage = mysqli_query($conn, $queryDealStage) or die(mysqli_error($mysql));
    
        // ustawienie stageu dla tabeli kontrahentów
        $queryKontrahentStage = "update kontrahent set stage='ONBOARDING' where firma='$firma';";
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