<?php

    /***
    *
    *   Header for client side pages
    *
    ***/

    $buttons = [
        [
            'title' => 'STRONA GŁÓWNA',
            'link'  => '../index.php'
        ],
        [
            'title' => 'OFERTY PRACY',
            'link'  => 'recruitment.php'
        ],
        [
            'title' => 'SPRAWDŹ APLIKACJĘ',
            'link'  => 'check.php'
        ],
        [
            'title' => 'KONTAKT',
            'link'  => 'contact.php'
        ],
    ]
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Rekrutacja</title>

    <link rel="stylesheet" href="../dist/style.css">
    <script type="module" src="../dist/js/app.js"></script>
</head>
<body>
    <header class="nav">
        <div class="container">
            <nav class="row d-flex justify-content-between">
                <?php foreach ($buttons as $key => $button): ?>
                    <a class="btn btn-outline-primary nav__item" href="<?php echo $button['link'] ?>"><?php echo $button['title']; ?></a>
                <?php endforeach; ?>
            </nav>
        </div>
    </header>