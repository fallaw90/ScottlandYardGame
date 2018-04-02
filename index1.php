<?php
 	 
 	include 'abstractData.php';
	include 'mrx.php';
	include 'player.php'; 
	$mrx = new Mrx(4, 3, 5, 7);
	$d1 = new Player('Detective 1', 2, 3, 5); 

	 
	echo "========================= Iditity Mr X ============================<br/>";
	echo 'Name: '.$mrx->name;
	echo "<br/>";
	echo 'Position: '.$mrx->getPosition();
	echo "<br/>";
	echo 'Number of taxi tickets: '.$mrx->taxi;
	echo "<br/>";
	echo 'Number of bus tickets: '.$mrx->bus;
	echo "<br/>";
	echo 'Number of train tickets: '.$mrx->train;
	echo "<br/>";
	echo 'Number of black tickes: '.$mrx->blackTicket;
	echo "<br/>";
	echo 'Number of double tickes: '.$mrx->double;
	$mrx->move(14, "taxi");
	$mrx->move(100, "train");
	echo "<br/>";
	echo 'Position after single move: '.$mrx->getPosition();
	$mrx->doubleMove(45, "blackTicket", 65, "bus");
	echo "<br/>";
	echo 'Position after double move move: '.$mrx->getPosition();
	echo "<br/>";
	echo 'Number of taxi tickets after 3 moves: '.$mrx->taxi;
 	echo "<br/>";
 	echo "Travel log:<br>";
	foreach ($mrx->getTravelLog() as $key => $value){
		echo "Position: $key Vehicle: $value"; 
		echo "<br/>";
	}

	echo "========================= Iditity Detective 1 ============================<br/>";
	echo 'Name: '.$d1->name;
	echo "<br/>";
	echo 'Position: '.$d1->getPosition();
	echo "<br/>";
	echo 'Number of taxi tickets: '.$d1->taxi;
	echo "<br/>";
	echo 'Number of bus tickets: '.$d1->bus;
	echo "<br/>";
	echo 'Number of train tickets: '.$d1->train; 
	$d1->move(156, "bus");
	$mrx->bus++;
	echo "<br/>";
	echo 'Position after move: '.$d1->getPosition(); 
	echo "<br/>";
	echo 'Number of bus tickets Mr X: '.$mrx->bus;


?>

