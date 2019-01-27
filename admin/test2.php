<?php
$data = [
	$names = ['Bin', 'Emmanuel', 'John'],

	$visits = [140, 600, 500]
];

$Bin = ($data[1][0] * 10) / 100 ."%";
$Emmanuel = ($data[1][1] * 10) / 100 ."%";
$John = ($data[1][2] * 10) / 100 ."%";

// Months.
$months = ['Jen', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];


// Page title.
$pageTitle = 'Chart';

// Include our header.php file
//require 'header.php';

$sql = "SELECT transactionDate FROM bank_transaction ORDER BY transactionID DESC";

$result = $conn->query($sql);

if ($result == true) {
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$split = explode('-', $row['transactionDate']);
			/* $transactionDate = $split[0] ."-". $split[1];

			echo "<br>";
			echo $transactionDate; */
			
		}
	}
}

?>

<div class="container">

	<div class="row" style="padding: 20px; width: 80%; margin: 0 auto;">
		<div class="chart col-md-12" style="padding: 0 0 20px 0">
			<div class="row">
				<div class="col-md-12 table-responsive">
					<h1>Visits</h1>

					<div class="col-md-12" style="border-left-width: 20px; border-left-color: brown;">
						<table>
							<tbody>
								<tr>
									<td>
										<span style="margin-right: 50px;">1996 - 2000</span>
									</td>
									<td style="width: 100%;">
										<div class="" style="width: <?php echo $Bin; ?>; height: 30px; background: lightgreen; margin-top: 10px;"></div>
									</td>
								</tr>
								
								<tr>
									<td>
										<span style="margin-right: 50px;">2001 - 2004</span>
									</td>
									<td style="width: 100%;">
										<div class="" style="width: <?php echo $Emmanuel; ?>; height: 30px; background: lightgreen; margin-top: 10px;"></div>
									</td>
								</tr>

								<tr style="margin-top: 20px;">
									<td>
										<span style="margin-right: 50px;">2005 - 2009</span>
									</td>
									<td style="width: 100%;">
										<div class="" style="width: <?php echo $John; ?>; height: 30px; background: lightgreen; margin-top: 10px;"></div>
									</td>
								</tr>

								<tr>
									<td><span style="margin-right: 50px;"></span></td>
									<td>
										<?php
										$i = 0;
										while ($i < 10) {
											$i += 1;

											$perc = $i * 10;

											if ($perc == 101) {
												$marginRight = "margin:". 0 ."px";
											} else {
												$marginRight = "margin:". 18 ."px";
											}


											echo "<span style='". $marginRight ."'>". $perc ."%</span>";
										}
										
										?>

									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
