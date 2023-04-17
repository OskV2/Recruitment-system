<?php
$server = "localhost";
$username = "root";
$password = "root";
$dbname = "crm";

$conn = mysqli_connect($server, $username, $password, $dbname);

if(isset($_POST['przedstawicielstwo'])){
    if(!empty($_POST['przedstawiciel'])){
        $przedstawiciel = $_POST['przedstawiciel'];

        $query = "insert into przedstawiciele(name) values('$przedstawiciel')";

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