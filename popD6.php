<?php
	
	include 'abstractData.php';
	include 'mrx.php';
	include 'player.php'; 

	session_start();

	if (isset($_POST['taxi']) OR isset($_POST['bus']) OR isset($_POST['train'])) {
		
		$_SESSION['stationD6'] = $_SESSION['station']; 
		$_SESSION['linesD6'] = $_SESSION['lines'];
		$_SESSION['nodesD6'] = $_SESSION['nodes'];
		$_SESSION['d6']->setPosition($_SESSION['stationD6']);  

		if (isset($_POST['taxi'])){
			$_SESSION['d6']->taxi --; 
			$_SESSION['mrx']->taxi += 1;
		}
		
		elseif (isset($_POST['bus'])){
			$_SESSION['d6']->bus --; 
			$_SESSION['mrx']->bus += 1;
		}
				
		elseif (isset($_POST['train'])){
			$_SESSION['d6']->train --;
			$_SESSION['mrx']->train += 1;
		}
		
		$_SESSION['d6Turn'] = false;
		$_SESSION['mrxTurn'] = true;
		
		echo"<script>
				window.parent.opener.location.reload();
				window.close();
			</script>";
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Move</title>
	</head>

	<body style="text-align: center;">
		<h1 style="color: red;">Detective 6</h1>
		<h2>Choose a ticket to move at the station <?php echo $_SESSION['station']; ?></h2>

		<?php 

			$stationD6 = $_SESSION['stationD6'];    
			$nodesNewStation = explode("-", $_SESSION['nodes']);
			$taxi = false;
			$bus = false;
			$train = false; 

			for ($i=0; $i < sizeof($nodesNewStation) ; $i++) {  
				if($nodesNewStation[$i] == ($stationD6.'t'))
					$taxi = true;
				if($nodesNewStation[$i] == ($stationD6.'b'))
					$bus = true;
				if($nodesNewStation[$i] == ($stationD6.'s'))
					$train = true;
			}		
			
			if(($_SESSION['d6']->taxi > 0) AND $taxi) {
		?>
			<form method="POST" action="popD6.php">
				<input type="hidden" name="taxi" value="taxi">
				<input type="submit" value="Taxi">
			</form><br>
		<?php } 
			  if(($_SESSION['d6']->bus > 0) AND $bus) {
		?>
			 <form method="POST" action="popD1.php">
				<input type="hidden" name="bus" value="bus">
				<input type="submit" value="Bus">
			</form><br>
		<?php } 
			  if(($_SESSION['d1']->train > 0) AND $train) {
		?>
			<form method="POST" action="popD6.php">
				<input type="hidden" name="train" value="train">
				<input type="submit" value="Train">
			</form><br> 
		<?php }  
		?>

	</body>
</html>