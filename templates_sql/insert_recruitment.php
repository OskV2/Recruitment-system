<?php

include('db_connect.php');

if(isset($_POST['submit'])){
    if(!empty($_POST['imie']) && !empty($_POST['nazwisko']) && !empty($_POST['email']) && !empty($_POST['telefon'])){
        $imie = $_POST['imie'];
        $nazwisko = $_POST['nazwisko'];
        $email= $_POST['email'];
        $telefon = $_POST['telefon'];
        $github_link = $_POST['github_link'];
        $linkedin_link = $_POST['linkedin_link'];
        $job = $_POST['selectedOfferId'];
        $Dod_Info = $_POST['additional_info'];

        $query = "insert into application(Name,Surname,Email,Phone,GitHub_link,Linkdin_Link,Status,Job_Off_Name,Dod_Info) values('$imie','$nazwisko','$email','$telefon','$github_link','$linkedin_link',1,'$job','$Dod_Info')";

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