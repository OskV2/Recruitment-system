<?php

	include('../templates_sql/db_connect.php');

	$query = "SELECT * FROM Application WHERE Status = '3' ORDER BY Data_rozmowy ASC";
	$result = $conn->query($query);
	$i = 0;

	include('../header_admin.php');
?>

	<main class="admin">
        <div class="container">
            <div class="admin__interview">
                <div class="row">
                    <div class="col-12">
						<h1 class="admin__title">Kandydaci umówieni na rozmowę rekrutacyjną</h1>
                        <ul class="admin__collapse">
                            <?php while($rows= $result->fetch(PDO::FETCH_ASSOC)):
                                $i += 1;
                                $candidate = 'candidate' . $i;
                                if($rows['Status'] =='3'): ?> 
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
                                                                $Off_name="SELECT Job_Off_Name FROM job_offer WHERE Job_Off_Id={$rows['Job_Off_Name']}";
                                                                $Off_name_result=$conn->query($Off_name);
                                                                $Off_name_arr = $Off_name_result->fetch(PDO::FETCH_ASSOC);
                                                                echo $Off_name_arr['Job_Off_Name'];
                                                            ?>
                                                        </span>
                                                    </div>
													<div class="col-3 admin__collapse-item-ab-column">
														<span><?php echo $rows['Data_rozmowy']; ?></span>
													</div>
                                                </div>
                                            </a>
                                            <div class="col-3 admin__collapse-item-ab-form">
                                                <a href="../templates_sql/increment_status.php?App_Id=<?php echo $rows['App_Id']; ?>" class="btn btn-outline-primary">Gotowe</a>
                                                <a href="../templates_sql/delete_application.php?App_Id=<?php echo $rows['App_Id']; ?>" class="btn btn-outline-alert">Odrzuć</a>
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

                                                <span class="admin__collapse-item-content-psel"></span>

                                                <div class="row">
                                                    <div class="col-3 admin__collapse-item-content-more-column">
                                                        <span class="admin__collapse-item-content-more-column-title">Proponowana umowa</span>
                                                        <span>
                                                            <?php
                                                                if (!empty($rows['Umowa'])) {
                                                                    $App_Status_Name = "SELECT Con_Type_Name FROM dbo.Contract_Type WHERE Con_Type_Id = {$rows['Umowa']}";
                                                                    $App_Status_Name_Restult = $conn->query($App_Status_Name);
                                                                    $App_Status_Name_arr = $App_Status_Name_Restult->fetch(PDO::FETCH_ASSOC);
                                                                    echo $App_Status_Name_arr['Con_Type_Name'];
                                                                } else {
                                                                    echo 'Nie podano';
                                                                }
                                                            ?>
                                                        </span>
                                                    </div>
                                                    <div class="col-3 admin__collapse-item-content-more-column">
                                                        <span class="admin__collapse-item-content-more-column-title">Widełki płacowe</span>
                                                        <span><?php echo !empty($rows['Placa']) ? $rows['Placa'] : 'Nie podano'; ?></span>
                                                    </div>
                                                    <div class="col-6 admin__collapse-item-content-more-column">
                                                        <span class="admin__collapse-item-content-more-column-title">Dodatkowe informacje</span>
                                                        <span><?php echo !empty($rows['Notatki']) ? $rows['Notatki'] : 'Nie podano'; ?></span>
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