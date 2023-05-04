<?php

include('../templates_sql/db_connect.php');

$query = "SELECT * FROM application"; 
$result = $conn->query($query);  
$i = 0;

include('../header_admin.php');
?>



<?php include('../footer.php') ?>