<?php
    include('db_connect.php');

    // Retrieve App_Id from URL
    $app_id = $_GET['App_Id'];

    $sql = "DELETE FROM Application WHERE App_Id = $app_id";

    if (mysqli_query($conn, $sql)) {
        echo "Row deleted successfully";
    } else {
        echo "Error deleting row: " . mysqli_error($conn);
    }

    mysqli_close($conn);

?>