<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../src/scss/hrPanel.scss">
    <title>Document</title>
</head>
<body>
    <div class="navbar">  
        <div class="navbar-item"><a href="new_form.php">+</a></div>
        <div class="navbar-item"><a href="nowe.php">NOWE</a></div>
        <div class="navbar-item"><a href="kontakt.php">W TRAKCIE ROZMÓW</a></div>
        <div class="navbar-item"><a href="onboarding.php">WDRAŻANIE</a></div>
        <div class="navbar-item"><a href="admin.php">ADMIN</a></div>
    </div>
    <form id="formularz" action="insert.php" method="post" target="hiddenFrame" onsubmit="setTimeout(function () { window.location.reload(); }, 10)">        
        <label for="firma">Nazwa stanowiska:</label><br>
        <input type="text" id="firma" name="firma"><br>
        <label for="telefon">Opis stanowiska:</label><br>
        <input type="number" id="telefon" name="telefon"><br>
        <label for="email">Wymagania:</label><br>
        <input type="text" id="email" name="email"><br>
        <label for="adres">Benefity:</label><br>
        <input type="text" id="adres" name="adres"><br>
            <?php while ($rows = mysqli_fetch_assoc($result)) {
            ?> 
                <option value="<?php echo $rows['name'] ?>" name="produkt"><?php echo $rows['name'] ?></option>
            <?php
            }
            // $resultvege->data_seek(0);
            ?>
        </select>
        <button type="submit" name="submit">Utwórz</button>
    </form>

    <iframe name="hiddenFrame" class="hide" style="display: none;"></iframe>
</body>
</html>