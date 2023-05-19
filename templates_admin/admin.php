<?php

include('../templates_sql/db_connect.php');

$query = "SELECT * FROM application"; 

$result = $conn->query($query);  
$i = 0;

$result2 = $conn->query($query);  
$j = 0;

include('../header_admin.php');
?>

<main class="admin">
    <div class="container">
        <div class="admin__verification">
            <div class="row">
                <div class="col-12">
                    <h1 class="admin__title">Zartudnieni pracownicy</h1>
                    <ul class="admin__collapse">
                        <?php while ($rows = $result->fetch(PDO::FETCH_ASSOC)):
                            $i += 1;
                            $candidate = 'candidate' . $i;
                            if ($rows['Status'] == '4'): ?>
                                <li class="admin__collapse-item">
                                    <div class="row d-flex admin__collapse-item-ab">
                                        <a class="col-9" href="<?php echo '#' . $candidate ?>" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="<?php echo $candidate; ?>">
                                            <div class="row d-flex">
                                                <div class="col-3 admin__collapse-item-ab-column">
                                                    <span><?php echo $rows['Name'] . ' ' . $rows['Surname']; ?></span>
                                                </div>
                                                <div class="col-3 admin__collapse-item-ab-column">
                                                    <span><?php echo $rows['Email']; ?></span>
                                                    <span><?php echo $rows['Phone']; ?></span>
                                                </div>
                                                <div class="col-3 admin__collapse-item-ab-column">
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
                                                <div class="col-3 admin__collapse-item-ab-column">
                                                    <span>Płaca: <?php echo !empty($rows['Placa']) ? $rows['Placa'] : 'Nie podano'; ?> zł</span>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="col-3 admin__collapse-item-ab-form">
                                            <a href="../templates_sql/fire_employee.php?App_Id=<?php echo $rows['App_Id']; ?>" class="btn btn-outline-alert">Zwolnij pracownika</a>
                                        </div>
                                    </div>

                                    <div class="collapse admin__collapse-item-content" id="<?php echo $candidate ?>">
                                        <span class="admin__collapse-item-content-psel"></span>
                                        <div class="admin__collapse-item-content-more">
                                            <div class="row">
                                                <div class="col-3 admin__collapse-item-content-more-column">
                                                    <span class="admin__collapse-item-content-more-column-title">MEDIA</span>
                                                    <a class="admin__collapse-item-content-more-column-link admin__collapse-item-content-more-column-link<?php echo !empty($rows['GitHub_Link']) ? '--enabled' : '--disabled'; ?>" href="<?php echo $rows['GitHub_Link'] ?>" target="_blank">Github</a>
                                                    <a class="admin__collapse-item-content-more-column-link admin__collapse-item-content-more-column-link<?php echo !empty($rows['Linkdin_Link']) ? '--enabled' : '--disabled'; ?>" href="<?php echo $rows['Linkdin_Link'] ?>" target="_blank">LinkedIn</a>
                                                </div>
                                                <div class="col-3 admin__collapse-item-content-more-column">
                                                    <span class="admin__collapse-item-content-more-column-title">PLIKI</span>
                                                    <a class="admin__collapse-item-content-more-column-link admin__collapse-item-content-more-column-link" href="<?php ?>">Plik CV</a>
                                                    <a class="admin__collapse-item-content-more-column-link admin__collapse-item-content-more-column-link" href="<?php ?>">List Motywacyjny</a>
                                                </div>
                                                <div class="col-6 admin__collapse-item-content-more-column">
                                                    <span class="admin__collapse-item-content-more-column-title">Dodatkowe informacje</span>
                                                    <p><?php echo !empty($rows['Dod_Info']) ? $rows['Dod_Info'] : 'Brak dodatkowych informacji' ; ?></p>
                                                </div>
                                            </div>
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

    <div class="container">
        <div class="admin__verification">
            <div class="row">
                <div class="col-12">
                    <h1 class="admin__title">Osoby odrzucone w trakcie procesu rekrutacji</h1>
                    <ul class="admin__collapse">
                        <?php while ($rows2 = $result2->fetch(PDO::FETCH_ASSOC)):
                            $j += 1;
                            $candidate2 = 'candidate' . $j;
                            if ($rows2['Status'] == '5'): ?>
                                <li class="admin__collapse-item">
                                    <div class="row d-flex admin__collapse-item-ab">
                                        <a class="col-9" href="<?php echo '#' . $candidate2 ?>" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="<?php echo $candidate2; ?>">
                                            <div class="row d-flex">
                                                <div class="col-4 admin__collapse-item-ab-column">
                                                    <span><?php echo $rows2['Name'] . ' ' . $rows2['Surname']; ?></span>
                                                </div>
                                                <div class="col-4 admin__collapse-item-ab-column">
                                                    <span><?php echo $rows2['Email']; ?></span>
                                                    <span><?php echo $rows2['Phone']; ?></span>
                                                </div>
                                                <div class="col-4 admin__collapse-item-ab-column">
                                                    <span>
                                                        <?php
                                                        $Off_name2 = "SELECT Job_Off_Name FROM job_offer WHERE Job_Off_Id = :jobOffId";
                                                        $Off_name_result2 = $conn->prepare($Off_name2);
                                                        $Off_name_result2->bindParam(':jobOffId', $rows2['Job_Off_Name'], PDO::PARAM_INT);
                                                        $Off_name_result2->execute();
                                                        $Off_name_arr2 = $Off_name_result2->fetch(PDO::FETCH_NUM);
                                                        echo $Off_name_arr2[0];
                                                        ?>
                                                    </span>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="col-3 admin__collapse-item-ab-form">
                                            <a href="../templates_sql/restore_application.php?App_Id=<?php echo $rows2['App_Id']; ?>" class="btn btn-outline-primary">Przywróć</a>
                                            <a href="../templates_sql/fire_employee.php?App_Id=<?php echo $rows2['App_Id']; ?>" class="btn btn-outline-alert">Usuń</a>
                                        </div>
                                    </div>

                                    <div class="collapse admin__collapse-item-content" id="<?php echo $candidate2 ?>">
                                        <span class="admin__collapse-item-content-psel"></span>
                                        <div class="admin__collapse-item-content-more">
                                            <div class="row">
                                                <div class="col-3 admin__collapse-item-content-more-column">
                                                    <span class="admin__collapse-item-content-more-column-title">MEDIA</span>
                                                    <a class="admin__collapse-item-content-more-column-link admin__collapse-item-content-more-column-link<?php echo !empty($rows2['GitHub_Link']) ? '--enabled' : '--disabled'; ?>" href="<?php echo $rows2['GitHub_Link'] ?>" target="_blank">Github</a>
                                                    <a class="admin__collapse-item-content-more-column-link admin__collapse-item-content-more-column-link<?php echo !empty($rows2['Linkdin_Link']) ? '--enabled' : '--disabled'; ?>" href="<?php echo $rows2['Linkdin_Link'] ?>" target="_blank">LinkedIn</a>
                                                </div>
                                                <div class="col-3 admin__collapse-item-content-more-column">
                                                    <span class="admin__collapse-item-content-more-column-title">PLIKI</span>
                                                    <a class="admin__collapse-item-content-more-column-link admin__collapse-item-content-more-column-link" href="<?php ?>">Plik CV</a>
                                                    <a class="admin__collapse-item-content-more-column-link admin__collapse-item-content-more-column-link" href="<?php ?>">List Motywacyjny</a>
                                                </div>
                                                <div class="col-6 admin__collapse-item-content-more-column">
                                                    <span class="admin__collapse-item-content-more-column-title">Dodatkowe informacje</span>
                                                    <p><?php echo !empty($rows2['Dod_Info']) ? $rows2['Dod_Info'] : 'Brak dodatkowych informacji' ; ?></p>
                                                </div>
                                            </div>
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

<?php include('../footer.php') ?>