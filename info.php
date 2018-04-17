<?php

    include 'abstractData.php';
	include 'mrx.php';
	include 'player.php'; 

	session_start();

    echo "<h3 style='color: red'>Mr. X</h3>";
    echo "<strong>Current position :".$_SESSION['mrx']->getPosition()."</strong><br>";
    echo "Taxi tickets: ".$_SESSION['mrx']->taxi."<br>";
    echo "Bus tickets: ".$_SESSION['mrx']->bus."<br>";
    echo "Train tickets: ".$_SESSION['mrx']->train."<br>";
    echo "Black Tickets: ".$_SESSION['mrx']->blackTicket."<br><br>";
    
    echo "<h3 style='color: green'>Detective 1</h3>";
    echo "<strong>Current position :".$_SESSION['d1']->getPosition()."</strong><br>";
    echo "Taxi tickets: ".$_SESSION['d1']->taxi."<br>";
    echo "Bus tickets: ".$_SESSION['d1']->bus."<br>";
    echo "Train tickets: ".$_SESSION['d1']->train."<br><br>";

    echo "<h3 style='color: green'>Detective 2</h3>";
    echo "<strong>Current position :".$_SESSION['d2']->getPosition()."</strong><br>";
    echo "Taxi tickets: ".$_SESSION['d2']->taxi."<br>";
    echo "Bus tickets: ".$_SESSION['d2']->bus."<br>";
    echo "train tickets: ".$_SESSION['d2']->train."<br><br>";

    echo "<h3 style='color: green'>Detective 3</h3>";
    echo "<strong>Current position :".$_SESSION['d3']->getPosition()."</strong><br>";
    echo "Taxi tickets: ".$_SESSION['d3']->taxi."<br>";
    echo "Bus tickets: ".$_SESSION['d3']->bus."<br>";
    echo "Train tickets: ".$_SESSION['d3']->train."<br><br>";

    echo "<h3 style='color: green'>Detective 4</h3>";
    echo "<strong>Current position :".$_SESSION['d4']->getPosition()."</strong><br>";
    echo "Taxi tickets: ".$_SESSION['d4']->taxi."<br>";
    echo "Bus tickets: ".$_SESSION['d4']->bus."<br>";
    echo "Train tickets: ".$_SESSION['d4']->train."<br><br>";

    echo "<h3 style='color: green'>Detective 5</h3>";
    echo "<strong>Current position :".$_SESSION['d5']->getPosition()."</strong><br>";
    echo "Taxi tickets: ".$_SESSION['d5']->taxi."<br>";
    echo "Bus tickets: ".$_SESSION['d5']->bus."<br>";
    echo "Train tickets: ".$_SESSION['d5']->train."<br><br>";

    echo "<h3 style='color: green'>Detective 6</h3>";
    echo "<strong>Current position :".$_SESSION['d6']->getPosition()."</strong><br>";
    echo "Taxi tickets: ".$_SESSION['d6']->taxi."<br>";
    echo "Bus tickets: ".$_SESSION['d6']->bus."<br>";
    echo "Train tickets: ".$_SESSION['d6']->train."<br><br>";