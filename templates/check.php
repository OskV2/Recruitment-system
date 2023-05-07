<?php 

    /*** 
    *
    *   Template: Strona do sprawdzania statusu swojej rekrutacji
    *
    ***/

    include('../header.php')
?>

<main class="check">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="check__title">Wpisz numer swojego zgłoszenia</h1>
                <input class="check__input" type="number" placeholder="Np. 12345678" maxlength="8">
                <a class="btn btn-outline-primary ms-auto check__button" href="">Sprawdź</a>

                <div class="check__output">
                    <div class="row d-flex">
                        <div class="col-6 left">
                            
                            <div class="d-flex">
                                <span class="check__output-stats">Status twojego zgłoszenia:</span>
                            </div>

                            <div class="check__output-progress">

                            </div>
                            
                        </div>
                        <div class="col-6">
                            <div class="d-flex flex-column">
                                <span class="check__output-date">Data rozmowy:</span>
                                <span class="check__output-contract">Proponowana umowa: </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include('../footer.php') ?>