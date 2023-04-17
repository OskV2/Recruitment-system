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
        <div class="navbar-item"><a href="kontakt.php">UMÓW SPOTKANIE</a></div>
        <div class="navbar-item"><a href="onboarding.php">ROZMOWA REKRUTACYJNA</a></div>
        <div class="navbar-item"><a href="admin.php">ADMIN</a></div>
    </div>
    <table class="table" align="center" border="2px"> 
	<tr> 
		<th colspan="7"><h2>Nowe zlecenia</h2></th> 
		</tr> 
			  <th> Aplikant </th> 
			  <th> email </th> 
			  <th> telefon </th> 
			  <th> CV </th> 
			  <th> Github </th>
			  <th> Stanowisko </th>
			  <th> akcja </th> 
			  <iframe name="hiddenFrame" class="hide" style="display: none;"></iframe>
		</tr> 
		
		<?php while($rows=mysqli_fetch_assoc($result)) 
		{
            $i += 1;
            if($rows['Status'] =='1'){
        ?> 
            <tr> <td><?php echo $rows['Name']; ?>
            <?php echo $rows['Surname']; ?></td>
            <td><?php echo $rows['Email']; ?></td> 
            <td><?php echo $rows['Phone']; ?></td> 
            <td><?php echo $rows['App_Link']; ?></td>
            <td><?php echo $rows['GitHub_Link']; ?></td>
            <td>
                <?php
                $Off_name="SELECT Job_Off_Name FROM job_offer WHERE Job_Off_Id={$rows['Job_Off_Name']}";
                $Off_name_result=mysqli_query($conn,$Off_name);
                $Off_name_arr = $Off_name_result->fetch_array();
                echo $Off_name_arr[0];
                ?>

            </td>
            <form id="faza<?php echo $i ?>" action="stage.php" method="post" target="hiddenFrame" onsubmit="setTimeout(function () { window.location.reload(); }, 10)">
                <td>
                    <input form="faza<?php echo $i ?>" type="submit" name="test" id="test" value="Gotowe" /><br/>
                    <input form="faza<?php echo $i ?>" type="submit" name="test1" id="test1" value="Usuń" />
                    <input type="text" name="identify" id="identify" value="<?php echo $rows['Phone']; ?>" style="display: none;">
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