<?php 

    /*** 
    *
    *   Template: Strona z ofertami pracy i formularzem rekrutacyjnym
    *
    ***/
    $server = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "rekrutacja";
    
    $conn = mysqli_connect($server, $username, $password, $dbname);
    $query="select * from job_offer"; 
    $result=mysqli_query($conn,$query); 
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
                        <select id="job" name="job">
                                <?php while ($rows = mysqli_fetch_assoc($result)) {
                                ?> 
                                <option value="<?php echo $rows['Job_Off_Id'] ?>" name="job"><?php echo $rows['Job_Off_Name'] ?></option>
                                <?php
                                }
                                // $resultvege->data_seek(0);
                                ?>
                        </select>
                    </div>
                    <h2 class="recruitment__offer-title">2. Przeczytaj ofertę</h2>
                    <div class="recruitment__offer-content">
                        <h3 class="recruitment__offer-subtitle">Opis stanowiska</h3>
                        <p class="recruitment__offer-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sodales ipsum est, posuere mattis nisi eleifend faucibus. Mauris condimentum sodales erat a sagittis. Ut accumsan sed justo et consequat. Donec tempus magna sit amet fermentum posuere. Nam dapibus lectus placerat risus pretium tincidunt. Etiam eu luctus ex. Phasellus commodo, leo gravida ornare congue, odio lacus lobortis ipsum, nec dignissim leo erat non tortor. Sed velit nibh, rhoncus vitae fermentum at, malesuada non ex. In nec volutpat dolor. Phasellus eget auctor nibh. Sed malesuada metus eget tristique ultricies. Quisque vestibulum felis nec fermentum consectetur. Nulla facilisi. Donec lorem massa, pretium efficitur felis eu, convallis dapibus libero. Morbi posuere turpis felis, nec lobortis nibh molestie at. Mauris est augue, convallis ut diam ut, ullamcorper sodales sem.</p>
                        
                        <h3 class="recruitment__offer-subtitle">Wymagania</h3>
                        <span>To nam dasz od siebie</span>
                        <ul class="recruitment__offer-requirements">
                            <li>
                                <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M24.0607 13.0607C24.6464 12.4749 24.6464 11.5251 24.0607 10.9393L14.5147 1.3934C13.9289 0.807611 12.9792 0.807611 12.3934 1.3934C11.8076 1.97919 11.8076 2.92893 12.3934 3.51472L20.8787 12L12.3934 20.4853C11.8076 21.0711 11.8076 22.0208 12.3934 22.6066C12.9792 23.1924 13.9289 23.1924 14.5147 22.6066L24.0607 13.0607ZM0 13.5H23V10.5H0V13.5Z" fill="#1A8FDD"/></svg>
                                <span>2 złote</span>
                            </li>
                        </ul>
                        
                        <h3 class="recruitment__offer-subtitle">Benefity</h3>
                        <span>A to otrzymasz w zamian</span>
                        <ul class="recruitment__offer-benefits">
                            <li>
                                <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.939341 10.9393C0.353554 11.5251 0.353554 12.4749 0.939341 13.0607L10.4853 22.6066C11.0711 23.1924 12.0208 23.1924 12.6066 22.6066C13.1924 22.0208 13.1924 21.0711 12.6066 20.4853L4.12132 12L12.6066 3.51472C13.1924 2.92893 13.1924 1.97919 12.6066 1.3934C12.0208 0.807611 11.0711 0.807611 10.4853 1.3934L0.939341 10.9393ZM25 10.5L2 10.5V13.5L25 13.5V10.5Z" fill="#1A8FDD"/></svg>
                                <span>harnaś</span>
                            </li>
                        </ul>
                    </div>
                </section>
                <section class="recruitment__form">
                    <h2 class="recruitment__form-title">3. Złóż swoje podanie</h2>
                    <div class="recruitment__form-content">
                    <form id="formularz" action="../insert.php" method="post" target="hiddenFrame" onsubmit="setTimeout(function () { window.location.reload(); }, 10)">
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
                                    <input class="recruitment__form-input" type="text" placeholder="E-mail *" id="email" name="email">
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
                                    <textarea class="recruitment__form-textarea" placeholder="Dodatkowe informacje" id="applink" name="applink"></textarea>
                                </div>
                            </div>
                            <input class="recruitment__form-input" type="number" id="job_input" name="job_input" value="1" hidden >
                            <button type="submit" name="submit">Utwórz</button>
                            <!-- <input class="recruitment__form-file" type="file" placeholder="Plik CV *"> -->
                            <!-- <input class="recruitment__form-file" type="file" placeholder="List motywacyjny *"> -->
                            <span>* - Pola i pliki wymagane</span>
                            <a href=""></a>
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div>
</main>
<script src="../src/js/recruitment.js"></script>
<?php
    include('../footer.php') 
?>