<?php 
$server = "localhost";
$username = "root";
$password = "root";
$dbname = "crm";

$conn = mysqli_connect($server, $username, $password, $dbname);
$query="select * from kontrahent"; 
$result=mysqli_query($conn,$query); 
?> 
<!DOCTYPE html> 
<html> 
	<head> 
		<title> Fetch Data From Database </title> 
	</head> 
	<body> 
	<table align="center" border="1px" style="width:600px; line-height:40px;"> 
	<tr> 
		<th colspan="7"><h2>Student Record</h2></th> 
		</tr> 
			  <th> Firma </th> 
			  <th> telefon </th> 
			  <th> email </th> 
			  <th> adres </th> 
			  <th> przedstawiciel </th>
			  <th colspan="2"> akcja </th> 
			  
		</tr> 
		
		<?php while($rows=mysqli_fetch_assoc($result)) 
		{
        ?> 
            <tr> <td><?php echo $rows['firma']; ?></td> 
            <td><?php echo $rows['telefon']; ?></td>
            <td><?php echo $rows['email']; ?></td> 
            <td><?php echo $rows['adres']; ?></td> 
            <td><?php echo $rows['przedstawiciel']; ?></td> 
            <td><button>Gotowe</button></td> 
            <td><button>Porzuć</button></td> 

            </tr> 
        <?php
        }
        ?> 

    </table> 
    </body> 
    </html>