<?php 

    /*** 
    *
    *   Template: Strona z ofertami pracy i formularzem rekrutacyjnym
    *
    ***/

    include('../header.php') 
    //write code below
?>

<main class="recruitment">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <section class="recruitment__hero">
                    <h1 class="recruitment__hero-title">Szukasz pracy? To proste!</h1>
                    <h2 class="recruitment__hero-description">Tylko trzy kroki dzielą cię od rozpoczęcia procesu rekrutacji</h2>
                </section>

                <section class="recruitment__offer">
                    <h2 class="recruitment__offer-title">1. Wybierz stanowisko, które cię interesuje</h2>
                    <div class="recruitment__offer-content">
                        <div class="d-flex">
                            <select class="w-100 recruitment__offer-select" id="select" name="job"></select>
                        </div>
                    </div>

                    <h2 class="recruitment__offer-title">2. Przeczytaj ofertę</h2>
                    <div class="recruitment__offer-content">
                        <h3 class="recruitment__offer-subtitle">Opis stanowiska</h3>
                        <p class="recruitment__offer-description" id="description"></p>
                        
                        <h3 class="recruitment__offer-subtitle">Wymagania</h3>
                        <span>To nam dasz od siebie</span>
                        <ul class="recruitment__offer-requirements" id="requirements"></ul>
                        
                        <h3 class="recruitment__offer-subtitle">Benefity</h3>
                        <span>A to otrzymasz w zamian</span>
                        <ul class="recruitment__offer-benefits" id="benefits"></ul>
                    </div>
                </section>
                <section class="recruitment__form">
                    <h2 class="recruitment__form-title">3. Złóż swoje podanie</h2>
                    <div class="recruitment__form-content">
                    <form id="formularz" action="../templates_sql/insert_recruitment.php" method="post" target="hiddenFrame" onsubmit="setTimeout(function () { window.location.reload(); }, 10)">
                            <input class="d-none" type="number" name="selectedOfferId" id="selectedOfferId" value="" />

                            <div class="d-flex">
                                <div class="recruitment__form-name">
                                    <input class="w-100 recruitment__form-input" type="text" placeholder="Imię *" id="imie" name="imie">
                                </div>
                                <div class="recruitment__form-surname">
                                    <input class="recruitment__form-input" type="text" placeholder="Nazwisko *" id="nazwisko" name="nazwisko">
                                </div>
                            </div> 
                            <div class="d-flex">
                                <div class="recruitment__form-email">
                                    <input class="recruitment__form-input" type="text" placeholder="E-mail *"  id="email" name="email">
                                </div>
                                <div class="recruitment__form-phone">
                                    <input class="recruitment__form-input" type="text" placeholder="Numer telefonu *" id="telefon" name="telefon">
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="recruitment__form-href">
                                    <input class="recruitment__form-input" type="text" placeholder="Link do konta Github" id="link" name="link">
                                </div>
                            </div> 
                            <div class="d-flex">
                                <div class="recruitment__form-more">
                                    <textarea rows="4" class="recruitment__form-textarea" placeholder="Dodatkowe informacje" id="applink" name="applink"></textarea>
                                </div>
                            </div>
                            <button class="btn btn-outline-primary" type="submit" name="submit">Utwórz</button>
                            <input class="recruitment__form-file" type="file" id="cv" placeholder="Plik CV *">
                            <input class="recruitment__form-file" type="file" id="lm" placeholder="List motywacyjny *">
                            <span>* - Pola i pliki wymagane</span>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div>
</main>

<?php
    include('../footer.php') 
?>