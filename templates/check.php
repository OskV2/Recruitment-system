<?php 

/*** 
*
*   Template: Strona do sprawdzania statusu swojej rekrutacji
*
***/

include('../header.php');
include('../templates_sql/db_connect.php');

if(isset($_POST['App_Id']) && !empty($_POST['App_Id'])){
  $App_Id = $_POST['App_Id'];
  $sql = "SELECT Status,Data_rozmowy,App_Id FROM dbo.Application WHERE App_Id = :App_Id";
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
                <form method="post" action="">
                    <input class="check__input" type="number" placeholder="Np. 12345678" maxlength="8" id="App_Id" name="App_Id">
                    <input class="btn btn-outline-primary ms-auto check__button" type="submit" name="submit" value="Sprawdź">
                </form>

                <?php 
                    if(isset($result)): 
                        if (!empty($result['Status'])): ?>
                            <div class="check__output">
                                <h2 class="check__output-title">Zgłoszenie numer: <span><?php echo $result['App_Id']; ?></span></h2>
                                <div class="row d-flex">
                                    <div class="col-6 left">
                                        <div class="d-flex justify-content-center">
                                            <span class="check__output-stats">Status twojego zgłoszenia: 
                                                <span class="check__output-stats-value" id="status">
                                                    <?php
                                                    $App_Status_Name = "SELECT App_Status_Name FROM dbo.Application_Status WHERE App_Status_Id = {$result['Status']}";
                                                    $App_Status_Name_Restult = $conn->query($App_Status_Name);
                                                    $App_Status_Name_arr = $App_Status_Name_Restult->fetch(PDO::FETCH_ASSOC);
                                                    echo $App_Status_Name_arr['App_Status_Name'];
                                                    ?>
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="d-flex justify-content-center">
                                            <span class="check__output-date">Data rozmowy: <span class="check__output-date-value" id="date"><?php echo !empty(@$result['Data_rozmowy']) ? @$result['Data_rozmowy'] : 'Data rozmowy nie została jeszcze ustalona'; ?></span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="check__output">
                                <div class="check__output-error">
                                    <h2 class="check__output-error-title">Nie znaleziono zgłoszenia o podanym numerze</h2>
                                    <span class="check__output-error-description">Twoje zgłoszenie mogło zostać usunięte po odrzuceniu</br>Upewnij się, że podałeś właściwy numer zgłoszenia</span>
                                </div>
                            </div>
                        <?php endif;
                    endif; 
                ?>

                <div class="check__legend">
                    <h2 class="check__legend-title">Jak odczytywać wyniki wyszukiwania?</h2>
                    <ul class="check__legend-list">
                        <li class="check__legend-listitem"><img src="../src/img/Arrow_right.svg" alt=""><span>1. Nowe - twoje zgłoszenie nie zostało jeszcze przejrzane</span></li>
                        <li class="check__legend-listitem"><img src="../src/img/Arrow_right.svg" alt=""><span>2. Po wstępnej akceptacji - zgłoszenie jest po pierwszym etapie akceptacji. Oznacza to, że zostało wstępnie zaakceptowane i ustalana jest data rozmowy rekrutacyjnej. Data rozmowy zostanie wyświetlona kiedy zostanie ustalona, ale może ona jeszcze zostać zmieniona. Jeżeli wstępnie ustalona data rozmowy Ci nie odpowiada skontaktuj się z nami poprzez E-Mail lub zadzwoń na numer telefonu podany w stopce strony.</span></li>
                        <li class="check__legend-listitem"><img src="../src/img/Arrow_right.svg" alt=""><span>3. Umówiony na rozmowę rekrutacyjną - w tym etapie zobaczysz ostateczną datę rozmowy, która nie podlega zmianie.</span></li>
                        <li class="check__legend-listitem"><img src="../src/img/Arrow_right.svg" alt=""><span>4. Zatrudniony</span></li>
                        <li class="check__legend-listitem"><img src="../src/img/Arrow_right.svg" alt=""><span>5. Zgłoszenie odrzucone</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include ('../footer.php'); ?>
