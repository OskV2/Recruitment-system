<?php

include('../templates_sql/db_connect.php');

$query = "SELECT * FROM application";
$result = $conn->query($query);
$i = 0;

$queryContract = "SELECT * FROM Contract_Type";
$resultContract = $conn->query($queryContract);

include('../header_admin.php');
?>

<main class="admin">
    <div class="container">
        <div class="admin__verification">
            <div class="row">
                <div class="col-12">
                    <h1 class="admin__title">Zgłoszenia po wstępnej akceptacji</h1>
                    <ul class="admin__collapse">
                        <?php while ($rows = $result->fetch(PDO::FETCH_ASSOC)):
                            $i += 1;
                            $candidate = 'candidate' . $i;
                            if ($rows['Status'] == '2'): ?>
                                <li class="admin__collapse-item">
                                    <div class="row d-flex admin__collapse-item-ab">
                                        <a class="col-9" href="<?php echo '#' . $candidate ?>" data-bs-toggle="collapse"
                                            role="button" aria-expanded="false" aria-controls="<?php echo $candidate; ?>">
                                            <div class="row d-flex">
                                                <div class="col-4 admin__collapse-item-ab-column">
                                                    <span>
                                                        <?php echo $rows['Name'] . ' ' . $rows['Surname']; ?>
                                                    </span>
                                                </div>
                                                <div class="col-4 admin__collapse-item-ab-column">
                                                    <span>
                                                        <?php echo $rows['Email']; ?>
                                                    </span>
                                                    <span>
                                                        <?php echo $rows['Phone']; ?>
                                                    </span>
                                                </div>
                                                <div class="col-4 admin__collapse-item-ab-column">
                                                    <span>
                                                        <?php
                                                        $Off_name = "SELECT Job_Off_Name FROM job_offer WHERE Job_Off_Id = :jobOffId";
                                                        $Off_name_result = $conn->prepare($Off_name);
                                                        $Off_name_result->bindParam(':jobOffId', $rows['Job_Off_Name'], PDO::PARAM_INT);
                                                        $Off_name_result->execute();
                                                        $Off_name_arr = $Off_name_result->fetch(PDO::FETCH_NUM);
                                                        echo $Off_name_arr[0];
                                                        ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="col-3 admin__collapse-item-ab-form">
                                            <a href="../templates_sql/increment_status.php?App_Id=<?php echo $rows['App_Id']; ?>"
                                                class="btn btn-outline-primary" target="_blank">Gotowe</a>
                                            <a href="../templates_sql/delete_application.php?App_Id=<?php echo $rows['App_Id']; ?>"
                                                class="btn btn-outline-alert" target="_blank">Odrzuć</a>
                                        </div>
                                    </div>

                                    <div class="collapse admin__collapse-item-content" id="<?php echo $candidate ?>">
                                        <span class="admin__collapse-item-content-psel"></span>
                                        <div class="admin__collapse-item-content-more">
                                            <div class="row">
                                                <div class="col-3 admin__collapse-item-content-more-column">
                                                    <span class="admin__collapse-item-content-more-column-title">MEDIA</span>
                                                    <a class="admin__collapse-item-content-more-column-link admin__collapse-item-content-more-column-link<?php echo !empty($rows['GitHub_Link']) ? '--enabled' : '--disabled'; ?>"
                                                        href="<?php echo $rows['GitHub_Link'] ?>" target="_blank">Github</a>
                                                    <a class="admin__collapse-item-content-more-column-link admin__collapse-item-content-more-column-link<?php echo !empty($rows['Linkdin_Link']) ? '--enabled' : '--disabled'; ?>"
                                                        href="<?php echo $rows['Linkdin_Link'] ?>" target="_blank">LinkedIn</a>
                                                </div>
                                                <div class="col-3 admin__collapse-item-content-more-column">
                                                    <span class="admin__collapse-item-content-more-column-title">PLIKI</span>
                                                    <a class="admin__collapse-item-content-more-column-link admin__collapse-item-content-more-column-link"
                                                        href="<?php ?>">Plik CV</a>
                                                    <a class="admin__collapse-item-content-more-column-link admin__collapse-item-content-more-column-link"
                                                        href="<?php ?>">List Motywacyjny</a>
                                                </div>
                                                <div class="col-3 admin__collapse-item-content-more-column">
                                                    <span>Dodatkowe informacje</span>
                                                    <p>
                                                        <?php ?>
                                                    </p>
                                                </div>
                                            </div>

                                            <span class="admin__collapse-item-content-psel"></span>

                                            <form action="../templates_sql/insert_admin_notes.php" method="post">
                                                <div class="row d-flex">

                                                    <div>
                                                    <input class="d-none" type="number" id="app_id" name="app_id"  value="<?php echo $rows['App_Id'] ?>">

                                                    </div>

                                                    <div class="col-3 admin__collapse-item-content-more-column">
                                                        <span class="admin__collapse-item-content-more-column-title">Termin
                                                            rozmowy</span>
                                                        <input class="admin__collapse-item-content-more-column-date"
                                                            type="datetime-local" name="date" id="date">
                                                    </div>
                                                    <div class="col-3 admin__collapse-item-content-more-column">
                                                        <span class="admin__collapse-item-content-more-column-title">Proponowana
                                                            umowa</span>
                                                        <select class="admin__collapse-item-content-more-column-select"
                                                            name="contract" id="contract"> 
                                                            <?php foreach ($resultContract as $contract) { ?>
                                                                <option value="<?php echo $contract[0] ?>">
                                                                    <?php echo $contract[1] ?>
                                                                </option>
                                                            <?php } ?>

                                                        </select>
                                                        <input class="d-none" type="number" id="selectedContract">
                                                    </div>
                                                    <div class="col-3 admin__collapse-item-content-more-column">
                                                        <span class="admin__collapse-item-content-more-column-title">Widełki
                                                            płacowe</span>
                                                        <input class="admin__collapse-item-content-more-column-input"
                                                            type="text" name="salary" id="salary"
                                                            placeholder="Np. 2k, 2000, 2000-3000">
                                                    </div>
                                                    <div class="col-3 admin__collapse-item-content-more-column">
                                                        <span class="admin__collapse-item-content-more-column-title">Dodatkowe
                                                            informacje</span>
                                                        <input class="admin__collapse-item-content-more-column-input"
                                                            type="text" name="notes" id="notes"
                                                            placeholder="Własne uwagi dot. kandydata"
                                                            value="EEEEE">
                                                    </div>
                                                </div>
                                                <button
                                                    class="btn btn-outline-primary ms-auto admin__collapse-item-content-more-save"
                                                    type="submit" name="submit">Zapisz</button>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include('../footer.php'); ?>