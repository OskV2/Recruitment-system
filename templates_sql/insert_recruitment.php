<?php

include('db_connect.php');

if(isset($_POST['submit'])){
    if(!empty($_POST['imie']) && !empty($_POST['nazwisko']) && !empty($_POST['email']) && !empty($_POST['telefon']) &&!empty($_POST['link'])){
        $imie = $_POST['imie'];
        $nazwisko = $_POST['nazwisko'];
        $email= $_POST['email'];
        $telefon = $_POST['telefon'];
        $link = $_POST['link'];
        $job = $_POST['selectedOfferId'];

        $query = "insert into application(Name,Surname,Email,Phone,GitHub_link,Status,Job_Off_Name) values('$imie','$nazwisko','$email','$telefon','$link',1,'$job')";

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