<?php
	
	include 'abstractData.php';
	include 'mrx.php';
	include 'player.php'; 
	
	session_start();
	
	if (isset($_POST['taxi']) OR isset($_POST['bus']) OR isset($_POST['train']) OR isset($_POST['blackTicket'])) {
		
		$_SESSION['stationMrx'] = $_SESSION['station']; 
		$_SESSION['linesMrx'] = $_SESSION['lines'];
		$_SESSION['nodesMrx'] = $_SESSION['nodes'];
		$_SESSION['mrx']->setPosition($_SESSION['stationMrx']);  

		if (isset($_POST['taxi'])){
			$_SESSION['mrx']->taxi --; 
			$_SESSION['mrx']->move($_SESSION['stationMrx'], "taxi");
		}
		
		elseif (isset($_POST['bus'])){
			$_SESSION['mrx']->bus --; 
			$_SESSION['mrx']->move($_SESSION['stationMrx'], "bus");
		}
				
		elseif (isset($_POST['train'])){
			$_SESSION['mrx']->train --;
			$_SESSION['mrx']->move($_SESSION['stationMrx'], "train");
		}
	
		elseif (isset($_POST['blackTicket'])) { 
			$_SESSION['mrx']->blackTicket --;
			$_SESSION['mrx']->move($_SESSION['stationMrx'], "blackTicket");
		}

		$_SESSION['mrxTurn'] = false;
		$_SESSION['d1Turn'] = true;
		
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
		<h1 style="color: red;">Mr X</h1>
		<h2>Choose a ticket to move at the station <?php echo $_SESSION['station']; ?></h2>

		<?php 

			$stationMrx = $_SESSION['stationMrx'];    
			$nodesNewStation = explode("-", $_SESSION['nodes']);
			$taxi = false;
			$bus = false;
			$train = false; 

			for ($i=0; $i < sizeof($nodesNewStation) ; $i++) {  
				if($nodesNewStation[$i] == ($stationMrx.'t'))
					$taxi = true;
				if($nodesNewStation[$i] == ($stationMrx.'b'))
					$bus = true;
				if($nodesNewStation[$i] == ($stationMrx.'s'))
					$train = true;
			} 

			if(($_SESSION['mrx']->taxi > 0) AND $taxi) {
		?>
			<form method="POST" action="popMrx.php">
				<input type="hidden" name="taxi" value="taxi">
				<input type="submit" value="Taxi">
			</form><br>
		<?php } 
			 if(($_SESSION['mrx']->bus > 0) AND $bus) {
		?>
			 <form method="POST" action="popMrx.php">
				<input type="hidden" name="bus" value="bus">
				<input type="submit" value="Bus">
			</form><br>
		<?php } 
			  if(($_SESSION['mrx']->train > 0) AND $train) {
		?>
			<form method="POST" action="popMrx.php">
				<input type="hidden" name="train" value="train">
				<input type="submit" value="Train">
			</form><br>
		<?php } 
			  if($_SESSION['mrx']->blackTicket > 0) {
		?>
			<form method="POST" action="popMrx.php">
				<input type="hidden" name="blackTicket" value="blackTicket">
				<input type="submit" value="Black Ticket">
			</form><br>
		<?php }  
		?>

	</body>
</html>