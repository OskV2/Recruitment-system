<?php 
$server = "localhost";
$username = "root";
$password = "root";
$dbname = "crm";

$conn = mysqli_connect($server, $username, $password, $dbname);
$query="select * from kontrahent"; 
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
            if($rows['stage'] =='NEW'){
        ?> 
            <tr> <td><?php echo $rows['firma']; ?></td> 
            <td><?php echo $rows['telefon']; ?></td>
            <td><?php echo $rows['email']; ?></td> 
            <td><?php echo $rows['adres']; ?></td> 
            <td><?php echo $rows['przedstawiciel']; ?></td> 
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