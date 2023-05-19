<?php

    include('db_connect.php');

    $app_id = $_GET['App_Id'];

    $sql = "UPDATE Application SET Status = 1 WHERE App_Id = :app_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':app_id', $app_id);

    if ($stmt->execute()) {
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    } else {
        echo "Error updating row: " . $stmt->errorInfo()[2];
    }

    $conn = null;
?>