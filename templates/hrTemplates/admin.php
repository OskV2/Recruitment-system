<?php 
$server = "localhost";
$username = "root";
$password = "root";
$dbname = "crm";

$conn = mysqli_connect($server, $username, $password, $dbname);
$query="SELECT kontrahent.*, deal.kwota, deal.produkt
FROM kontrahent
INNER JOIN deal ON kontrahent.ID=deal.kontrahent;"; 
$result=mysqli_query($conn,$query); 

$i = 0;

$queryPrzedstawiciel="select 
przedstawiciele.*, 
( select 
    sum(deal.kwota) 
  from deal 
  where deal.przedstawiciel = przedstawiciele.ID) sum_value,
  ( select COUNT(deal.kwota) from deal where deal.przedstawiciel = przedstawiciele.ID) sum
from przedstawiciele"; 
$resultPrzedstawiciel=mysqli_query($conn,$queryPrzedstawiciel);


?> 
<!DOCTYPE html> 
<html> 
	<head> 
		<title> Admin panel </title>
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
        <div class="mid">
            <div class="left">
                <table id="tablePrzedstawiciel" class="table" align="center" border="2px"> 
                     <tr> 
                    <th colspan="7"><h2>Przedstawiciele</h2></th> 
                    </tr> 
                        <th> Przedstawiciel </th> 
                        <th> Kwota umów </th> 
                        <th> Liczba umów </th> 
                        <iframe name="hiddenFrame" class="hide" style="display: none;"></iframe>
                    </tr> 
                    
                    <?php while($rows=mysqli_fetch_assoc($resultPrzedstawiciel)) 
                    {
                        $i += 1;
                        $test = 'rows' . $i;
                    ?> 
                        <tr> <td class="prow"><?php echo $rows['name']; ?></td> 
                        <td class="prow">
                            <?php
                                if(!empty($rows['sum_value'])){
                                    echo $rows['sum_value']; 
                                }
                                else{
                                echo "brak danych";
                                }
                             ?>
                        </td>
                        <td class="prow">
                            <?php ; ?>
                            <?php
                                if(!empty($rows['sum'])){
                                    echo $rows['sum']; 
                                }
                                else{
                                echo "brak danych";
                                }
                             ?>
                        </td> 
                        </tr> 
                    <?php
                    }
                    $result->data_seek(0);
                    ?> 
                </table>

                <form class="nowosc" action="produkty.php" method="post" method="post" target="hiddenFrame" onsubmit="setTimeout(function () { window.location.reload(); }, 10)">
                    <label for="">Wprowadź nowy produkt</label>
                    <input type="text" name="produkt"><br>
                    <input type="submit" name="warzywko" id="nowebtn">
                </form>
                <form class="nowosc" action="przedstawiciele.php" method="post" method="post" target="hiddenFrame" onsubmit="setTimeout(function () { window.location.reload(); }, 10)">
                    <label for="">Wprowadź nowego przedstawiciela</label>
                    <input type="text" name="przedstawiciel"><br>
                    <input type="submit" name="przedstawicielstwo" id="nowebtn">
                </form>
            </div>
                
                <table class="table" align="center" border="2px" style="margin:20px 0;"> 
                <tr> 
                    <th colspan="7"><h2>Panel administratora</h2></th> 
                    </tr> 
                        <th> Firma </th> 
                        <th> Kontakt </th> 
                        <th> Produkt </th> 
                        <th> Kwota </th>
                        <th colspan="2"> akcja </th> 
                        <iframe name="hiddenFrame" class="hide" style="display: none;"></iframe>
                    </tr> 
                    
                    <?php while($rows=mysqli_fetch_assoc($result)) 
                    {
                        $i += 1;
                        if($rows['stage'] =='GOTOWE'){
                    ?> 
                        <tr> <td><?php echo $rows['firma']; ?></td> 
                        <td>
                            <?php echo $rows['telefon']; ?>
                            <?php echo $rows['email']; ?><br>
                            <?php echo $rows['adres']; ?>
                        </td>
                        <td> <?php echo $rows['produkt']; ?> </td>
                        <td><?php echo $rows['kwota']; ?></td> 
                        <form id="faza<?php echo $i ?>" action="stage.php" method="post" target="hiddenFrame" onsubmit="setTimeout(function () { window.location.reload(); }, 10)">
                            <td>
                                <input form="faza<?php echo $i ?>" type="submit" name="test" id="test" value="Gotowe" /><br/>
                                <input form="faza<?php echo $i ?>" type="submit" name="test1" id="test1" value="Usuń" />
                                <input type="text" name="firemka" id="firemka" value="<?php echo $rows['firma']; ?>" style="display: none;">
                            </td> 
                        </form>
                        </tr> 
                    <?php
                        }
                    }
                    ?> 

                </table>
        </div>
        <div class="private" id="private">
            <h1>PODAJ HASŁO ADMINISTRATORZE</h1>
            Username:<input id="username" type="text"><br>
            Password:&nbsp;<input id="pw" type="password"><br>
            <button id="myButton" onclick="buttonCode()">Submit</button>
        </div>
    <script type="text/javascript" src="main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    </body> 
    </html>