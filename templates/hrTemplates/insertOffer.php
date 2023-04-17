<?php
$server = "localhost";
$username = "root";
$password = "root";
$dbname = "rekrutacja";

$conn = mysqli_connect($server, $username, $password, $dbname);

if(isset($_POST['submit'])){
    if(!empty($_POST['firma']) && !empty($_POST['telefon']) && !empty($_POST['adres'])){
        $firma = $_POST['firma'];
        $telefon = $_POST['telefon'];
        $email = $_POST['email'];
        $adres = $_POST['adres'];

        $query = "insert into job_offer(Job_Off_Name,Job_Off_Desc,Job_Off_Req,Job_Off_Bene) values('$firma','$telefon','$email','$adres')";

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

if(isset($_POST['deal'])){
    if(!empty($_POST['produkty']) && !empty($_POST['data'])){
        $produkt = $_POST['produkty'];
        $data = $_POST['data'];
        $id = "(select ID from kontrahent where firma = 'super jabłuszka')";

        $query = "insert into deal(produkty,data,kontrahent) values('$produkt','$data','$id')";

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