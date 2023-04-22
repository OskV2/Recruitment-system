<?php

	include('../templates_sql/db_connect.php');

	$query = "SELECT * FROM application WHERE Status = '3' ORDER BY Data_rozmowy ASC";
	$result = mysqli_query($conn, $query);
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
                                        <div class="d-flex admin__collapse-item-ab">
											<a class="w-100" href="<?php echo '#' . $candidate ?>" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="<?php echo $candidate; ?>">
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

                                            <iframe class="d-none hide" name="hiddenFrame"></iframe>
                                            <form class="d-flex admin__collapse-item-ab-form" id="faza<?php echo $i ?>" action="../templates_sql/stage.php" method="post" target="hiddenFrame" onsubmit="setTimeout(function () { window.location.reload(); }, 10)">
                                                <input class="btn btn-outline-primary" form="faza<?php echo $i ?>" type="submit" name="test" id="test" value="Gotowe" /><br/>
                                                <input class="btn btn-outline-primary" form="faza<?php echo $i ?>" type="submit" name="test1" id="test1" value="Usuń" />
                                            </form>

											<?php /*

											<button id="gotoweKontakt" type="submit" form="vege<?php echo $i ?>" value="deal" name="deal">gotowe</button>
											<form id="faza<?php echo $i ?>" action="../templates_sql/stage.php" method="post" target="hiddenFrame" onsubmit="setTimeout(function () { window.location.reload(); }, 10)">
												<input class="btn btn-outline-primary" form="faza<?php echo $i ?>" type="submit" name="test1" id="test1" value="Usuń" />
												<input class="btn btn-outline-primary" type="text" name="identify" id="identify" value="<?php echo $rows['Phone']; ?>" style="display: none;">
											</form>

											*/ ?>

                                        </div>

                                        <div class="collapse admin__collapse-item-content" id="<?php echo $candidate ?>">
                                            <span class="admin__collapse-item-content-psel"></span>
                                            <div class="admin__collapse-item-content-info">
                                                <p>kurwa</p>
                                                <p>dodac tu reszte danych jakie chlop wrzuca</p>
                                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Labore autem natus, quod repellendus quisquam ab saepe nostrum velit laudantium, ex repellat, quibusdam molestias dolor voluptas laboriosam ipsa modi unde sint. Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum, doloremque officiis ratione debitis labore veniam eius. Laboriosam aperiam modi neque ad sunt. Reprehenderit asperiores laborum, exercitationem quis maiores possimus enim!Lorem</p>
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