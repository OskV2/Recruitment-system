<?php 
$server = "localhost";
$username = "root";
$password = "root";
$dbname = "rekrutacja";

$conn = mysqli_connect($server, $username, $password, $dbname);
$query="select * from application"; 
$result=mysqli_query($conn,$query); 

$i = 0;
?> 
<!DOCTYPE html> 
<html> 
	<head> 
		<title> Fetch Data From Database </title>
        <!-- <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>"> -->
        <link rel="stylesheet" href="../../src/scss/hrPanel.scss">
	</head> 
	<body> 
	<div class="navbar">
        <div class="navbar-item"><a href="new_form.php">+</a></div>
        <div class="navbar-item"><a href="nowe.php">NOWE</a></div>
        <div class="navbar-item"><a href="kontakt.php">W TRAKCIE ROZMÓW</a></div>
        <div class="navbar-item"><a href="onboarding.php">WDRAŻANIE</a></div>
        <div class="navbar-item"><a href="admin.php">ADMIN</a></div>
    </div>
    <table class="table" align="center" border="2px"> 
	<tr> 
		<th colspan="7"><h2>Nowe zlecenia</h2></th> 
		</tr> 
			  <th> Firma </th> 
			  <th> telefon </th> 
			  <th> email </th> 
			  <th> adres </th> 
			  <th> przedstawiciel </th>
			  <th colspan="2"> akcja </th> 
			  <iframe name="hiddenFrame" class="hide" style="display: none;"></iframe>
		</tr> 
		
		<?php while($rows=mysqli_fetch_assoc($result)) 
		{
            $i += 1;
            if($rows['Status'] =='1'){
        ?> 
            <tr> <td><?php echo $rows['Name']; ?></td> 
            <td><?php echo $rows['Surname']; ?></td>
            <td><?php echo $rows['Email']; ?></td> 
            <td><?php echo $rows['Phone']; ?></td> 
            <td><?php echo $rows['App_Link']; ?></td>
            <td><?php echo $rows['GitHub_Link']; ?></td>
            <td><?php echo $rows['Status']; ?></td>
            <td><?php echo $rows['Job_Off_Name']; ?></td>
            <form id="faza<?php echo $i ?>" action="stage.php" method="post" target="hiddenFrame" onsubmit="setTimeout(function () { window.location.reload(); }, 10)">
                <td>
                    <input form="faza<?php echo $i ?>" type="submit" name="test" id="test" value="Gotowe" /><br/>
                    <input form="faza<?php echo $i ?>" type="submit" name="test1" id="test1" value="Usuń" />
                    <input type="text" name="firemka" id="firemka" value="<?php echo $rows['firma']; ?>" style="display: none;">
                </td> 
                <!-- <td><button>Porzuć</button></td>  -->
            </form>
            </tr> 
        <?php
            }
        }
        ?> 

    </table> 
    </body> 
    </html>