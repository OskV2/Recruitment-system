<?php

include('db_connect.php');

if(isset($_POST['submit'])){
    $App_ID = $_POST['app_id'];
    $Date = $_POST['date'];
    $Contract = $_POST['contract'];
    $Salary = $_POST['salary'];
    $Notes = $_POST['notes'];
    if (is_null($Date)) {
        $query = "UPDATE application SET Data_rozmowy = '$Date', Umowa = $Contract, Placa = '$Salary', Notatki = '$Notes' WHERE App_Id = $App_ID";
    }else{
        $query = "UPDATE application SET Umowa = $Contract, Placa = '$Salary', Notatki = '$Notes' WHERE App_Id = $App_ID";
    }
    // echo $DateSquire;
    echo $query;

    $run = $conn->query($query);


    if($run){
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    }
    else{
        echo "nie działa";
    }
}
?>