<?php include('../header_admin.php'); ?>

    <main class="admin">
        <div class="container">
            <div class="admin__add">
                <h1 class="admin__title">Dodaj nowe stanowisko pracy</h1>
                <form id="formularz" action="../templates_sql/insert_add_job_offer.php" method="post" target="hiddenFrame" onsubmit="setTimeout(function () { window.location.reload(); }, 10)">        
                    <input class="admin__add-input" type="text" id="firma" name="firma" placeholder="Nazwa stanowiska">
                    <input class="admin__add-input" type="text" id="telefon" name="telefon" placeholder="Opis stanowiska">
                    <input class="admin__add-input" type="text" id="email" name="email" placeholder="Wymagania (wpisz kilka po przecinku zgodnie z przykładem - Javascript, Git, Język Angielski)">
                    <input class="admin__add-input" type="text" id="adres" name="adres" placeholder="Benefity (wpisz kilka po przecinku zgodnie z przykładem - Karta Multisport, Opieka Medyczna)">
        
                    <button class="btn btn-outline-primary" type="submit" name="submit">Utwórz</button>
                </form>
            </div>
        </div>
    </main>

<?php include('../footer.php'); ?>