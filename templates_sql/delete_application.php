<?php

    include('db_connect.php');

    $app_id = $_GET['App_Id'];

    $sql = "UPDATE Application SET Status = 5 WHERE App_Id = :app_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':app_id', $app_id);

    if ($stmt->execute()) {
        echo "Row updated successfully";
    } else {
        echo "Error updating row: " . $stmt->errorInfo()[2];
    }

    $conn = null;

?>