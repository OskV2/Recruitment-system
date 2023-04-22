<?php 
    include('db_connect.php');

    // Retrieve App_Id from URL
    $app_id = $_GET['App_Id'];

    // Update Status in Application table
    $sql = "UPDATE Application SET Status = Status + 1 WHERE App_Id = $app_id";

    if (mysqli_query($conn, $sql)) {
        echo "Status updated successfully";
    } else {
        echo "Error updating status: " . mysqli_error($conn);
    }

    mysqli_close($conn);

?>