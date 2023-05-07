<?php 

    /*** 
    *
    *   Template: Strona, na którą będzie przekierowanie po wysłaniu formularza rekrutacyjnego
    *
    ***/

    include('../templates_sql/db_connect.php');

    include('../header.php');

    if(isset($_POST['submit'])){
        if(!empty($_POST['imie']) && !empty($_POST['nazwisko']) && !empty($_POST['email']) && !empty($_POST['telefon'])){
            $imie = $_POST['imie'];
            $nazwisko = $_POST['nazwisko'];
            $email= $_POST['email'];
            $telefon = $_POST['telefon'];
            $github_link = $_POST['github_link'];
            $linkedin_link = $_POST['linkedin_link'];
            $job = $_POST['selectedOfferId'];
            $Dod_Info = $_POST['additional_info'];
    
            $query = "insert into application(Name,Surname,Email,Phone,GitHub_link,Linkdin_Link,Status,Job_Off_Name,Dod_Info) values('$imie','$nazwisko','$email','$telefon','$github_link','$linkedin_link',1,'$job','$Dod_Info')";
    
            if($conn->query($query)){ 
                // $query = "SELECT TOP 1 App_Id FROM dbo.Application ORDER BY App_Id DESC"; 
                // $result = $conn->query($query); 
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
             <?php } else {
                echo "nie działa";
            }
        }
        else { ?>
            <main class="landing">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="landing__content d-flex flex-column justify-content-center">
                                <h1 class="landing__content-title">Dziękujemy za przesłanie zgłosznia</h1>
                                <span class="landing__content-description">Cos poszło nie tak, spróbój wypełnić formularz jeszcze raz</br>Upewnij się, ze wypelniles wszystkie wymagane pola</span>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        <?php }
    }
?>

<?php include('../footer.php') ?>