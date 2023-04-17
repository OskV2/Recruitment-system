<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "rekrutacja";

$conn = mysqli_connect($server, $username, $password, $dbname);

if(isset($_POST['submit'])){
    if(!empty($_POST['imie']) && !empty($_POST['nazwisko']) && !empty($_POST['email']) && !empty($_POST['telefon']) &&!empty($_POST['link']) &&!empty($_POST['applink'])){
        $imie = $_POST['imie'];
        $nazwisko = $_POST['nazwisko'];
        $email= $_POST['email'];
        $telefon = $_POST['telefon'];
        $link = $_POST['link'];
        $applink = $_POST['applink'];
        $job = $_POST['job_input'];

        $query = "insert into application(Name,Surname,Email,Phone,App_Link,GitHub_link,Status,Job_Off_Name) values('$imie','$nazwisko','$email','$telefon','$link','$applink',1,'$job')";

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
