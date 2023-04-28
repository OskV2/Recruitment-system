<?php

include('db_connect.php');

if(isset($_POST['submit'])){
    $App_ID = $_GET['app_id'];
    $Date = $_POST['date'];
    $Contract = $_POST['contract'];
    $Salary = $_POST['salary'];
    $Notes = $_POST['notes'];

    $query = "UPDATE application SET Data_rozmowy = $Date, Umowa = $Contract, Place = $Salary, Notatki = $Notes WHERE App_Id = 16";

    $run = mysqli_query($conn, $query) or die(mysqli_error($mysql));

    if($run){
        echo "działa";
    }
    else{
        echo "nie działa";
    }
}
?>