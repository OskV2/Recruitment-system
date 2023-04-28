<?php

	include('../templates_sql/db_connect.php');

	$query = "";
	$result = mysqli_query($conn, $query);
	$i = 0;

	include('../header_admin.php');
?>



<?php include('../footer.php') ?>