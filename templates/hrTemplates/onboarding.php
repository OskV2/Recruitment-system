<?php 
$server = "localhost";
$username = "root";
$password = "root";
$dbname = "crm";

$conn = mysqli_connect($server, $username, $password, $dbname);
$query="SELECT kontrahent.*, deal.data
FROM kontrahent
INNER JOIN deal ON kontrahent.ID=deal.kontrahent;";  
$result=mysqli_query($conn,$query); 

$queryvege="select * from produkty"; 
$resultvege=mysqli_query($conn,$queryvege);
$i = 0;
?> 
<!DOCTYPE html> 
<html> 
	<head> 
		<title> Konsultacje </title> 
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
	<table class="table" align="center" border="1px" style="width: 60vw;"> 
	<tr> 
		<th colspan="7"><h2>Wdrażanie</h2></th> 
		</tr> 
			  <th> Firma </th> 
			  <th> kontakt </th> 
			  <th> przedstawiciel </th>
			  <th> Data spotkania </th>
			  <th> Kwota </th>
			  <th colspan="2"> akcja </th> 
			  <iframe name="hiddenFrame" class="hide" style="display: none;"></iframe>
			  
		</tr> 
		
		<?php while($rows=mysqli_fetch_assoc($result)) 
		{
            $i += 1;
            if ($rows['stage'] == 'ONBOARDING') {
                ?> 
            <tr> 
            <td>
                <?php echo $rows['firma']; ?>
            </td> 
            <td>
            <?php echo $rows['telefon']; ?><br>
            <?php echo $rows['email']; ?><br>
            <?php echo $rows['adres']; ?>
            </td>
            <td><?php echo $rows['przedstawiciel']; ?></td>
            <td> <?php echo $rows['data']; ?> </td>
            <td>
            <form id="vege<?php echo $i ?>" action="insert3.php" method="post" target="hiddenFrame" onsubmit="setTimeout(function () { window.location.reload(); }, 5)">
                    <input type="number" step="0.01" name="kwota" id="kwota" style="width: 170px;height: 25px;">
                    <input type="text" name="firemka" id="firemka" value="<?php echo $rows['firma']; ?>" style="display: none;">
            </form>
            </td>
            <td>
            <button id="gotoweKontakt" type="submit" form="vege<?php echo $i ?>" value="vege<?php echo $i ?>" name="cena">gotowe</button>
                <form id="faza<?php echo $i ?>" action="stage.php" method="post" target="hiddenFrame" onsubmit="setTimeout(function () { window.location.reload(); }, 5)">
                    <input form="faza<?php echo $i ?>" type="submit" name="test1" id="test1" value="Usuń" />
                    <input type="text" name="firemka" id="firemka" value="<?php echo $rows['firma']; ?>" style="display: none;">
                </form>
            </td> 


            </tr>
        <?php
            }
        }
        ?> 

    </table>
    </body> 
    </html>