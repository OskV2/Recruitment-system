<?php 

    /*** 
    *
    *   Template: Strona, na którą będzie przekierowanie po wysłaniu formularza rekrutacyjnego
    *
    ***/

    include('../header.php')
?>

<main class="landing">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="landing__content d-flex flex-column justify-content-center">
                    <h1 class="landing__content-title">Dziękujemy za przesłanie zgłosznia</h1>
                    <span class="landing__content-description">Twój numer zgłosznia:</span>
                    <span class="landing__content-number">1</span>
                    <span class="landing__content-text">Dzięki temu numerowi sprawdzisz status swojego zgłoszenia na stronie "<a href="check.php">Sprawdź aplikację</a>"</span>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include('../footer.php') ?>