 <?php 

    include('db_connect.php');

    // Retrieve App_Id from URL
    $app_id = $_GET['App_Id'];

    // Update Status in Application table
    $sql = "UPDATE Application SET Status = Status + 1 WHERE App_Id = :app_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':app_id', $app_id);

    if ($stmt->execute()) {
        echo "Status updated successfully";
    } else {
        echo "Error updating status: " . $stmt->errorInfo()[2];
    }

    $conn = null;

?>