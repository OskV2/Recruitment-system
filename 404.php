<?php include('./header.php'); ?>

    <div class="page404">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex justify-content-center align-items-center flex-column">
                    <h1 class="page404__title">Nie znaleziono strony której szukasz</h1>
                    <a class="page404__link" href="<?php echo "//" . $_SERVER['HTTP_HOST']; ?>">Powrót na stronę główną</a>
                </div>
            </div>
        </div>
    </div>

<?php include('./footer.php') ?>