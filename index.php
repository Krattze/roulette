<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;500&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="/css/mystyle.css">
</head>

<body>
	<?php include 'db_connect.php' ?>
	<?php require 'nav.php' ?>

	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="card-panel-roll">
					<div class="wheel">
						<div class="case" style=" background-position: 0px 0px">
							<div id="pointer">

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row" style="width: 90%;">
			<div class="col-6">
				<div class="card-panel-next">
					<div id="past">
						<?php
						$sql = "SELECT * FROM `rolls` ORDER BY id DESC LIMIT 1";
						$result = mysqli_query($conn, $sql);
						while ($row = mysqli_fetch_assoc($result)) {
							$roundIDMinus10 = $row['id'] - 11;
						}
						$sql2 = "SELECT * FROM `rolls` WHERE id > " . $roundIDMinus10 . " ORDER BY `ID` ASC";
						$result2 = mysqli_query($conn, $sql2);
						while ($row2 = mysqli_fetch_assoc($result2)) {
							if ($row2['roll'] == 0) {
								echo "<div class='ball ball-0'>" . $row2['roll'] . "</div>";
							} elseif ($row2['roll'] <= 7) {
								echo "<div class='ball ball-1'>" . $row2['roll'] . "</div>";
							} else {
								echo "<div class='ball ball-8'>" . $row2['roll'] . "</div>";
							}
						}
						?>
					</div>
				</div>
			</div>
			<div class="col-4">
				<div class="card-panel-next">
					<div class="row">
						<div class="col-6 enter-bet text-white text-center">Enter your bet</div>
						<div class="col-6"><input id="betAmount" type="number" placeholder="Bet Amount" step="1" style="height: 31px; width: 100%;"></div>
					</div>
				</div>
			</div>
			<div class="col-2">
				<div class="card-panel-next" id="win-alert">
					<div class="timer text-white text-center fs-4">Timer :<span id="countdowntimer"> 0</span></div>
				</div>
			</div>
		</div>
		<div class="row" style="width: 90%;">
			<div class="col-12" id="betButtons">
				<div class="card-panel-next">
					<button class="btn btn-bet red" id="red">1-7</button>
					<button class="btn btn-bet green" id="green">0</button>
					<button class="btn btn-bet black" id="black">8-14</button>
				</div>
			</div>
			<div class="col-12">
				<div class="card-panel-next">
					<div class="rows">
						<div class="redbet">
							<div class="row">
								<div class="name">Player</div>
								<div class="bet">Bet</div>
							</div>
						</div>
						<div class="greenbet">
							<div class="row">
								<div class="name">Player</div>
								<div class="bet">Bet</div>
							</div>
						</div>
						<div class="blackbet">
							<div class="row">
								<div class="name">Player</div>
								<div class="bet">Bet</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>

	<?php include 'logInModal.php'; ?>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
	<script>$(function () {
        window.setTimeout(function () {
            $('#my-alert').alert('close');
        }, 2000);
    });</script>
	<script src="/roulette.js"></script>
</body>

</html>