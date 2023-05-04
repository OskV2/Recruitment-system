<?php
    // include('db_connect.php');

    // // Retrieve App_Id from URL
    // $app_id = $_GET['App_Id'];

    // $sql = "UPDATE Application SET Status = 5 WHERE App_Id = $app_id";

    // if (mysqli_query($conn, $sql)) {
    //     echo "Row deleted successfully";
    // } else {
    //     echo "Error deleting row: " . mysqli_error($conn);
    // }

    // mysqli_close($conn);

    include('db_connect.php');

    // Retrieve App_Id from URL
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