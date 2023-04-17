<?php
$server = "localhost";
$username = "root";
$password = "root";
$dbname = "crm";

$conn = mysqli_connect($server, $username, $password, $dbname);

if(isset($_POST['warzywko'])){
    if(!empty($_POST['produkt'])){
        $produkt = $_POST['produkt'];

        $query = "insert into produkty(produkt) values('$produkt')";

        $run = mysqli_query($conn, $query) or die(mysqli_error($mysql));

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