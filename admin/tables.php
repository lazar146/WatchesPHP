<?php 


if(isset($_GET['table'])){
$imeTabele = $_GET['table'];
			
} 



?>






		<!-- //header-ends -->
		<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
				<div class="tables">
					<h3 class="title1">Tables</h3>
					<div class="panel-body widget-shadow">
						<h4>
						<?php
						echo $imeTabele."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a id='insert' href='indexA.php?tabela={$imeTabele}&page=inputStranica' class='btn btn-warning'>insert</a>";
						?>
						</h4>
						<table class="table">
							<thead>
								<tr>
								<?php
								$upit = "SHOW COLUMNS FROM $imeTabele";
								$rez = $konekcija -> query($upit);
								$rezultat = $rez -> fetchAll();

								$imena = array();

									foreach($rezultat as $i){
										$imena[]=$i["Field"];
									}
									foreach($imena as $i){
										echo "<th>$i</th>";
									}
								?>
								</tr>
							</thead>
							<tbody>
								<?php
									$upit1 = "SELECT * FROM $imeTabele";
									$rez1 = $konekcija -> query($upit1);
									$rezultat1 = $rez1 -> fetchAll();
									
									$sadrzaj = array();
									
									foreach($rezultat1 as $red){
										$sadrzajReda = array();
										foreach($red as $kolona => $value){
											$sadrzajReda[$kolona] = $value;
										}
										$sadrzaj[] = $sadrzajReda;
									}
								?>
								<?php foreach($rezultat1 as $red):?>
									<tr>
								<?php foreach($imena as $kolone):?>
									<td><?= $red[$kolone]?></td>
								<?php endforeach; $id=$imena[0]?>
									<td>
                                        <a id='insert' href='indexA.php?tabela=<?= $imeTabele ?>&red=<?= $red[$id] ?>&page=updateStranica' class='btn btn-success'>update</a>
										<button id="delete" class="btn btn-danger del" data-id="<?= $red[$id] ?>" data-name="<?= $imeTabele ?>">
											Delete
										</button>

								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
					
				</div>
			</div>
		</div>

</body><script src="js/main.js"></script>

<?php

?>

</html>