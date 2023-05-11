<?php

include('db_connect.php');

if(isset($_POST['submit'])){
    $App_ID = $_POST['app_id'];
    $Date = $_POST['date'];
    $Contract = $_POST['contract'];
    $Salary = $_POST['salary'];
    $Notes = $_POST['notes'];
    echo $App_ID.$Date.$Contract.$Salary.$Notes;
    $query = "UPDATE application SET Data_rozmowy = '$Date:00', Umowa = $Contract, Placa = '$Salary PLN/month', Notatki = '$Notes' WHERE App_Id = $App_ID";
    echo $query;
    // $run = mysqli_query($conn, $query) or die(mysqli_error($mysql));
    // TO_DATE($Date,'YYYY-MM-DD HH24:MI:SS')
    $run = $conn->query($query);
    // $run->bindParam(':app_id', $App_ID);

    if($run){
        echo "działa";
    }
    else{
        echo "nie działa";
    }
}
?>