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
                            <?php while($rows=mysqli_fetch_assoc($result)):
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
                                                                $Off_name_result=mysqli_query($conn,$Off_name);
                                                                $Off_name_arr = $Off_name_result->fetch_array();
                                                                echo $Off_name_arr[0];
                                                            ?>
                                                        </span>
                                                    </div>
													<div class="col-3 admin__collapse-item-ab-column">
														<span><?php echo $rows['Data_rozmowy']; ?></span>
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

	<?php /* ?>
	
	<table class="table" align="center" border="2px">
		<tr>
			<th colspan="8">
				<h2>Nowe zlecenia</h2>
			</th>
		</tr>
		<th> Aplikant </th>
		<th> email </th>
		<th> telefon </th>
		<th> CV </th>
		<th> Github </th>
		<th> Stanowisko </th>
		<th> Data spotkania </th>
		<th> akcja </th>
		<iframe name="hiddenFrame" class="hide" style="display: none;"></iframe>
		</tr>

		<?php while ($rows = mysqli_fetch_assoc($result)) {
			$i += 1;
			if ($rows['Status'] == '3') {
				?>
				<tr>
					<td>
						<?php echo $rows['Name']; ?>
						<?php echo $rows['Surname']; ?>
					</td>
					<td>
						<?php echo $rows['Email']; ?>
					</td>
					<td>
						<?php echo $rows['Phone']; ?>
					</td>
					<td>
						<?php echo $rows['App_Link']; ?>
					</td>
					<td>
						<?php echo $rows['GitHub_Link']; ?>
					</td>
					<td>
						<?php
						$Off_name = "SELECT Job_Off_Name FROM job_offer WHERE Job_Off_Id={$rows['Job_Off_Name']}";
						$Off_name_result = mysqli_query($conn, $Off_name);
						$Off_name_arr = $Off_name_result->fetch_array();
						echo $Off_name_arr[0];
						?>
					</td>
					<td>
                    <?php echo $rows['Data_rozmowy']; ?>
					</td>

					<td>
						<button id="gotoweKontakt" type="submit" form="vege<?php echo $i ?>" value="deal"
							name="deal">gotowe</button>

						<form id="faza<?php echo $i ?>" action="../templates_sql/stage.php" method="post" target="hiddenFrame"
							onsubmit="setTimeout(function () { window.location.reload(); }, 10)">
							<input form="faza<?php echo $i ?>" type="submit" name="test1" id="test1" value="Usuń" />
							<input type="text" name="identify" id="identify" value="<?php echo $rows['Phone']; ?>"
								style="display: none;">
						</form>
					</td>
				</tr>
				<?php
			}
		}
		?>
	</table>

	<?php */ ?>


<?php include('../footer.php') ?>