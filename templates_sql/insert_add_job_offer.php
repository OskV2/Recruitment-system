<?php
include('db_connect.php');

    if(isset($_POST['submit'])){
        if(!empty($_POST['firma']) && !empty($_POST['telefon']) && !empty($_POST['adres'])){
            $firma = $_POST['firma'];
            $telefon = $_POST['telefon'];
            $email = $_POST['email'];
            $adres = $_POST['adres'];

            $query = "INSERT INTO job_offer(Job_Off_Name, Job_Off_Desc, Job_Off_Req, Job_Off_Bene) VALUES (:firma, :telefon, :email, :adres)";

            $stmt = $conn->prepare($query);
            $stmt->bindParam(':firma', $firma);
            $stmt->bindParam(':telefon', $telefon);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':adres', $adres);
            $stmt->execute();

            if($stmt->rowCount() > 0){
                header("Location: " . $_SERVER['HTTP_REFERER']);
                exit();
            }
            else{
                echo "nie działa";
            }
        }
        else{
            echo "wszystkie pola wymagane";
        }
    }

$conn = null;
?>