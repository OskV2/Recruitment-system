<?php 
$server = "localhost";
$username = "root";
$password = "root";
$dbname = "crm";

$conn = mysqli_connect($server, $username, $password, $dbname);
$query="select * from kontrahent"; 
$result=mysqli_query($conn,$query); 

$queryvege="select * from produkty"; 
$resultvege=mysqli_query($conn,$queryvege);

$i = 0;

?> 
<!DOCTYPE html> 
<html> 
	<head> 
		<title> Konsultacje </title>
        <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
 
	</head> 
	<body> 
    <div class="navbar">
        <div class="navbar-item"><a href="new_form.php">+</a></div>
        <div class="navbar-item"><a href="nowe.php">NOWE</a></div>
        <div class="navbar-item"><a href="kontakt.php">W TRAKCIE ROZMÓW</a></div>
        <div class="navbar-item"><a href="onboarding.php">WDRAŻANIE</a></div>
        <div class="navbar-item"><a href="admin.php">ADMIN</a></div>
    </div>
	<table class="table" align="center" border="1px"> 
	<tr> 
		<th colspan="7"><h2>W trakcie rozmów</h2></th> 
		</tr> 
			  <th> Firma </th> 
			  <th> kontakt </th> 
			  <th> przedstawiciel </th>
			  <th> termin wizyty </th>
              <th> Produkty </th>
			  <th colspan="2"> akcja </th> 
			  
		</tr> 
		
		<?php while($rows=mysqli_fetch_assoc($result)) 
		{
            $i +=1;
            if ($rows['stage'] == 'CONTACTED') {
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
            <td>
                 <form id="vege<?php echo $i ?>" action="insert2.php" method="post" target="hiddenFrame" onsubmit="setTimeout(function () { window.location.reload(); }, 10)">
                    <input type="date" name="data" id="data" >
                    <input type="text" name="firemka" id="firemka" value="<?php echo $rows['firma']; ?>" style="display: none;">
                    <input type="text" name="123" id="123" value="<?php echo $rows['przedstawiciel']; ?>" style="display: none;">
                 <!-- </form>  -->
            </td>
            <td>
                <!-- <form id="vege<?php echo $i ?>" action="insert2.php" method="post"> -->
                    <select name="produkty">
                        <?php while ($rowsvege = mysqli_fetch_assoc($resultvege)) {
                            ?> 
                            <option value="<?php echo $rowsvege['produkt'] ?>" name="produkt"><?php echo $rowsvege['produkt'] ?></option>
                        <?php
                        }
                        $resultvege->data_seek(0);
                        ?>
                    </select>
                </form>
            </td>
			    <iframe name="hiddenFrame" class="hide" style="display: none;"></iframe>
            <td>
            <button id="gotoweKontakt" type="submit" form="vege<?php echo $i ?>" value="deal" name="deal">gotowe</button>
                <form id="faza<?php echo $i ?>" action="stage.php" method="post" target="hiddenFrame" onsubmit="setTimeout(function () { window.location.reload(); }, 10)">
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