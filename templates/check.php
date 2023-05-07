<?php 

    /*** 
    *
    *   Template: Strona do sprawdzania statusu swojej rekrutacji
    *
    ***/

    include('../header.php');


    if(isset($_POST['submit'])){
        
        
        $App_Id = $_POST['App_Id'];

        $sql = 'SELECT Status,Umowa,Data_rozmowy  FROM dbo.Application WHERE App_Id = App_Id = :App_Id';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':App_Id', $App_Id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    }

?>

<main class="check">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="check__title">Wpisz numer swojego zgłoszenia</h1>
                <form method="post" onsubmit="setTimeout(function () { window.location.reload(); }, 10)">
                <input class="check__input" type="number" placeholder="Np. 12345678" maxlength="8" id="App_Id" name="App_Id">
                <input class="btn btn-outline-primary ms-auto check__button" type="submit" value="Sprawdź">
                </form>
             

                <div class="check__output">
                    <div class="row d-flex">
                        <div class="col-6 left">
                            
                            <div class="d-flex">
                                <span class="check__output-stats">Status twojego zgłoszenia: <?php echo $result['Status']; ?></span>
                            </div>

                            <div class="check__output-progress">

                            </div>
                            
                        </div>
                        <div class="col-6">
                            <div class="d-flex flex-column">
                                <span class="check__output-date">Data rozmowy: <?php echo $result['Data_rozmowy']; ?></span>
                                <span class="check__output-contract">Proponowana umowa: <?php echo $result['Umowa']; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include('../footer.php') ?>