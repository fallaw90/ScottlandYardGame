<?php
	
	include 'abstractData.php';
	include 'mrx.php';
	include 'player.php'; 

	session_start();

	if (isset($_POST['taxi']) OR isset($_POST['bus']) OR isset($_POST['train'])) {
		
		$_SESSION['stationD3'] = $_SESSION['station']; 
		$_SESSION['linesD3'] = $_SESSION['lines'];
		$_SESSION['nodesD3'] = $_SESSION['nodes'];
		$_SESSION['d3']->setPosition($_SESSION['stationD3']);  

		if (isset($_POST['taxi'])){
			$_SESSION['d3']->taxi --; 
			$_SESSION['d3']->move($_SESSION['stationD3'], "taxi");
		}
		
		elseif (isset($_POST['bus'])){
			$_SESSION['d3']->bus --; 
			$_SESSION['d3']->move($_SESSION['stationD3'], "bus");
		}
				
		elseif (isset($_POST['train'])){
			$_SESSION['mrx']->train --;
			$_SESSION['mrx']->move($_SESSION['stationD3'], "train");
		}
		
		$_SESSION['d3Turn'] = false;
		$_SESSION['d4Turn'] = true;
		
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
		<h1 style="color: red;">Detective 3</h1>
		<h2>Choose a ticket to move at the station <?php echo $_SESSION['station']; ?></h2>

		<?php  

			$stationD3 = $_SESSION['stationD3'];    
			$nodesNewStation = explode("-", $_SESSION['nodes']);
			$taxi = false;
			$bus = false;
			$train = false; 

			for ($i=0; $i < sizeof($nodesNewStation) ; $i++) {  
				if($nodesNewStation[$i] == ($stationD3.'t'))
					$taxi = true;
				if($nodesNewStation[$i] == ($stationD3.'b'))
					$bus = true;
				if($nodesNewStation[$i] == ($stationD3.'s'))
					$train = true;
			}		
			
			if(($_SESSION['d3']->taxi > 0) AND $taxi) {
		?>
			<form method="POST" action="popD3.php">
				<input type="hidden" name="taxi" value="taxi">
				<input type="submit" value="Taxi">
			</form><br>
		<?php } 
			  if(($_SESSION['d3']->bus > 0) AND $bus) {
		?>
			 <form method="POST" action="popD3.php">
				<input type="hidden" name="bus" value="bus">
				<input type="submit" value="Bus">
			</form><br>
		<?php } 
			  if(($_SESSION['d3']->train > 0) AND $train) {
		?>
			<form method="POST" action="popD3.php">
				<input type="hidden" name="train" value="train">
				<input type="submit" value="Train">
			</form><br> 
		<?php }  
		?>

	</body>
</html>