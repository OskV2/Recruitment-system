<?php

	include('../templates_sql/db_connect.php');

	$query = "SELECT * FROM application";
	$result = mysqli_query($conn, $query);
	$i = 0;

	include('../header_admin.php');
?>

	<main class="admin">
        <div class="container">
            <div class="admin__verification">
                <div class="row">
                    <div class="col-12">
						<h1 class="admin__title">Zgłoszenia po wstępnej akceptacji</h1>
                        <ul class="admin__collapse">
                            <?php while($rows=mysqli_fetch_assoc($result)):
                                $i += 1;
                                $candidate = 'candidate' . $i;
                                if($rows['Status'] =='2'): ?> 
                                    <li class="admin__collapse-item">
                                        <div class="row d-flex admin__collapse-item-ab">
											<a class="col-9" href="<?php echo '#' . $candidate ?>" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="<?php echo $candidate; ?>">
                                                <div class="row d-flex">
                                                    <div class="col-4 admin__collapse-item-ab-column">
                                                        <span><?php echo $rows['Name'] . ' ' . $rows['Surname']; ?></span>
                                                    </div>
                                                    <div class="col-4 admin__collapse-item-ab-column">
                                                        <span><?php echo $rows['Email']; ?></span>
                                                        <span><?php echo $rows['Phone']; ?></span>
                                                    </div>
                                                    <div class="col-4 admin__collapse-item-ab-column">
                                                        <span>
                                                            <?php
                                                                $Off_name="SELECT Job_Off_Name FROM job_offer WHERE Job_Off_Id={$rows['Job_Off_Name']}";
                                                                $Off_name_result=mysqli_query($conn,$Off_name);
                                                                $Off_name_arr = $Off_name_result->fetch_array();
                                                                echo $Off_name_arr[0];
                                                            ?>
                                                        </span>
                                                    </div>
                                                </div>
                                            </a>
                                            <div class="col-3 admin__collapse-item-ab-form">
                                                <a href="../templates_sql/increment_status.php?App_Id=<?php echo $rows['App_Id']; ?>" class="btn btn-outline-primary" target="_blank">Gotowe</a>
                                                <a href="../templates_sql/delete_application.php?App_Id=<?php echo $rows['App_Id']; ?>" class="btn btn-outline-alert" target="_blank">Odrzuć</a>
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
                                                    <div class="col-3 admin__collapse-item-content-more-column">
                                                        <span>Dodatkowe informacje</span>
                                                        <p><?php ?></p>
                                                    </div>
                                                </div>

												<span class="admin__collapse-item-content-psel"></span>

												<form action="../templates_sql/insert_admin_notes.php" method="post" onsubmit="setTimeout(function () { window.location.reload(); }, 10)">
													<div class="row d-flex">

														<input class="d-none" type="number" value="<?php $rows['App_Id'] ?>" id="app_id">
														
														
														<p><?php echo var_dump($rows['App_Id']); ?></p>


														<div class="col-3 admin__collapse-item-content-more-column">
															<span class="admin__collapse-item-content-more-column-title">Termin rozmowy</span>
															<input class="admin__collapse-item-content-more-column-date" type="datetime-local" name="date" id="date">
														</div>
														<div class="col-3 admin__collapse-item-content-more-column">
															<span class="admin__collapse-item-content-more-column-title">Proponowana umowa</span>
															<select class="admin__collapse-item-content-more-column-select" name="contract" id="contract"></select>
															<input class="d-none" type="number" id="selectedContract">
														</div>
														<div class="col-3 admin__collapse-item-content-more-column">
															<span class="admin__collapse-item-content-more-column-title">Widełki płacowe</span>
															<input class="admin__collapse-item-content-more-column-input" type="text" name="salary" id="salary" placeholder="Np. 2k, 2000, 2000-3000">
														</div>
														<div class="col-3 admin__collapse-item-content-more-column">
															<span class="admin__collapse-item-content-more-column-title">Dodatkowe informacje</span>
															<input class="admin__collapse-item-content-more-column-input" type="text" name="notes" id="notes" placeholder="Własne uwagi dot. kandydata">
														</div>
													</div>
													<button class="btn btn-outline-primary ms-auto admin__collapse-item-content-more-save" type="submit" name="submit">Zapisz</button>
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

<?php include ('../footer.php'); ?>