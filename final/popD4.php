<?php
	
	include 'abstractData.php';
	include 'mrx.php';
	include 'player.php'; 

	session_start();

	if (isset($_POST['taxi']) OR isset($_POST['bus']) OR isset($_POST['train'])) {
		
		$_SESSION['stationD4'] = $_SESSION['station']; 
		$_SESSION['linesD4'] = $_SESSION['lines'];
		$_SESSION['nodesD4'] = $_SESSION['nodes'];
		$_SESSION['d4']->setPosition($_SESSION['stationD4']);  

		if (isset($_POST['taxi'])){
			$_SESSION['d4']->taxi --; 
			$_SESSION['d4']->move($_SESSION['stationD4'], "taxi");
		}
		
		elseif (isset($_POST['bus'])){
			$_SESSION['d4']->bus --; 
			$_SESSION['d4']->move($_SESSION['stationD4'], "bus");
		}
				
		elseif (isset($_POST['train'])){
			$_SESSION['mrx']->train --;
			$_SESSION['mrx']->move($_SESSION['stationD4'], "train");
		}
		
		$_SESSION['d4Turn'] = false;
		$_SESSION['d5Turn'] = true;
		
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
		<h1 style="color: red;">Detective 4</h1>
		<h2>Choose a ticket to move at the station <?php echo $_SESSION['station']; ?></h2>

		<?php 

			$stationD4 = $_SESSION['stationD4'];    
			$nodesNewStation = explode("-", $_SESSION['nodes']);
			$taxi = false;
			$bus = false;
			$train = false; 

			for ($i=0; $i < sizeof($nodesNewStation) ; $i++) {  
				if($nodesNewStation[$i] == ($stationD4.'t'))
					$taxi = true;
				if($nodesNewStation[$i] == ($stationD4.'b'))
					$bus = true;
				if($nodesNewStation[$i] == ($stationD4.'s'))
					$train = true;
			}		
			
			if(($_SESSION['d4']->taxi > 0) AND $taxi) {
		?>
			<form method="POST" action="popD4.php">
				<input type="hidden" name="taxi" value="taxi">
				<input type="submit" value="Taxi">
			</form><br>
		<?php } 
			  if(($_SESSION['d4']->bus > 0) AND $bus) {
		?>
			 <form method="POST" action="popD4.php">
				<input type="hidden" name="bus" value="bus">
				<input type="submit" value="Bus">
			</form><br>
		<?php } 
			  if(($_SESSION['d4']->train > 0) AND $train) {
		?>
			<form method="POST" action="popD4.php">
				<input type="hidden" name="train" value="train">
				<input type="submit" value="Train">
			</form><br> 
		<?php }  
		?>

	</body>
</html>