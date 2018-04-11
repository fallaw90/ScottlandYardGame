<?php
	
	include 'abstractData.php';
	include 'mrx.php';
	include 'player.php'; 

	session_start();

	if (isset($_POST['taxi']) OR isset($_POST['bus']) OR isset($_POST['train'])) {
		
		$_SESSION['stationD1'] = $_SESSION['station']; 
		$_SESSION['linesD1'] = $_SESSION['lines'];
		$_SESSION['nodesD1'] = $_SESSION['nodes'];
		$_SESSION['d1']->setPosition($_SESSION['stationD1']);  

		if (isset($_POST['taxi'])){
			$_SESSION['d1']->taxi --; 
			$_SESSION['d1']->move($_SESSION['stationD1'], "taxi");
		}
		
		elseif (isset($_POST['bus'])){
			$_SESSION['d1']->bus --; 
			$_SESSION['d1']->move($_SESSION['stationD1'], "bus");
		}
				
		elseif (isset($_POST['train'])){
			$_SESSION['mrx']->train --;
			$_SESSION['mrx']->move($_SESSION['stationD1'], "train");
		}
		
		$_SESSION['d1Turn'] = false;
		$_SESSION['d2Turn'] = true;

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
		<h1 style="color: red;">Detective 1</h1>
		<h2>Choose a ticket to move at the station <?php echo $_SESSION['station']; ?></h2>

		<?php 
		 
			$stationD1 = $_SESSION['stationD1'];    
			$nodesNewStation = explode("-", $_SESSION['nodes']);
			$taxi = false;
			$bus = false;
			$train = false; 

			for ($i=0; $i < sizeof($nodesNewStation) ; $i++) {  
				if($nodesNewStation[$i] == ($stationD1.'t'))
					$taxi = true;
				if($nodesNewStation[$i] == ($stationD1.'b'))
					$bus = true;
				if($nodesNewStation[$i] == ($stationD1.'s'))
					$train = true;
			}		
			
			if(($_SESSION['d1']->taxi > 0) AND $taxi) {
		?>
			<form method="POST" action="popD1.php">
				<input type="hidden" name="taxi" value="taxi">
				<input type="submit" value="Taxi">
			</form><br>
		<?php } 
			  if(($_SESSION['d1']->bus > 0) AND $bus) {
		?>
			 <form method="POST" action="popD1.php">
				<input type="hidden" name="bus" value="bus">
				<input type="submit" value="Bus">
			</form><br>
		<?php } 
			  if(($_SESSION['d1']->train > 0) AND $train) {
		?>
			<form method="POST" action="popD1.php">
				<input type="hidden" name="train" value="train">
				<input type="submit" value="Train">
			</form><br> 
		<?php }  
		?>

	</body>
</html>