<?php 
    
    include 'abstractData.php';
    include 'mrx.php';
    include 'player.php';

    session_start();

    if(($_SESSION['stationD1'] == $_SESSION['stationMrx']) OR ($_SESSION['stationD2'] == $_SESSION['stationMrx']) OR 
       ($_SESSION['stationD3'] == $_SESSION['stationMrx']) OR ($_SESSION['stationD4'] == $_SESSION['stationMrx']) OR 
       ($_SESSION['stationD5'] == $_SESSION['stationMrx']) OR ($_SESSION['stationD6'] == $_SESSION['stationMrx'])){

        echo"Congratulation! You found Mr. X at the station ".$_SESSION['stationMrx']; 
        exit();
    }  

        function checkStation($linesPlayer, $nodesNewStation){ 
            $lines = explode(" ", $linesPlayer);
            $nodes = explode("-", $nodesNewStation);
            for ($i=0; $i < sizeof($lines) ; $i++) { 
                for ($j=0; $j < sizeof($nodes) ; $j++) { 
                    if($lines[$i] == $nodes[$j]){
                        if(($_SESSION['station'] != $_SESSION['stationD1']) AND ($_SESSION['station'] != $_SESSION['stationD2']) AND 
                           ($_SESSION['station'] != $_SESSION['stationD3']) AND ($_SESSION['station'] != $_SESSION['stationD4']) AND
                           ($_SESSION['station'] != $_SESSION['stationD5']) AND ($_SESSION['station'] != $_SESSION['stationD6'])){
                            
                           return true;
                           
                           }

                           else{
                                echo"<script>
                                        alert('Someone else is already in this location!');  
                                    </script>"; 
                           } 
                    }
                } 
            }
            return false;
        }
 
    if($_SESSION['mrxTurn']){  

        header('Location: dataMrx.php'); 
    }

    if (isset($_POST['station'])) {

        $_SESSION['station'] = $_POST['station'];  
        $_SESSION['lines'] = $_POST['lines']; 
        $_SESSION['nodes'] = $_POST['nodes']; 

        if($_SESSION['d1Turn']){ 
            $checkStation = checkStation($_SESSION['linesD1'], $_SESSION['nodes']);
            if($checkStation) 
                echo "<script> window.open('popD1.php', 'Detective 1 Popup', 'height=300, width=500'); </script>";
            else
                echo "<script> window.open('popMessage.php', 'Wrong Location choosen', 'height=200, width=500'); </script>";
        }

		elseif($_SESSION['d2Turn']){ 
            $checkStation = checkStation($_SESSION['linesD2'], $_SESSION['nodes']);
            if($checkStation) 
                echo "<script> window.open('popD2.php', 'Detective 2 Popup', 'height=300, width=500'); </script>";
            else
                echo "<script> window.open('popMessage.php', 'Wrong Location choosen', 'height=200, width=500'); </script>";
        }

        elseif($_SESSION['d3Turn']){ 
            $checkStation = checkStation($_SESSION['linesD3'], $_SESSION['nodes']);
            if($checkStation) 
                echo "<script> window.open('popD3.php', 'Detective 3 Popup', 'height=300, width=500'); </script>";
            else
                echo "<script> window.open('popMessage.php', 'Wrong Location choosen', 'height=200, width=500'); </script>";
        }

        elseif($_SESSION['d4Turn']){ 
            $checkStation = checkStation($_SESSION['linesD4'], $_SESSION['nodes']);
            if($checkStation) 
                echo "<script> window.open('popD4.php', 'Detective 4 Popup', 'height=300, width=500'); </script>";
            else
                echo "<script> window.open('popMessage.php', 'Wrong Location choosen', 'height=200, width=500'); </script>";
        }

        elseif($_SESSION['d5Turn']){ 
            $checkStation = checkStation($_SESSION['linesD5'], $_SESSION['nodes']);
            if($checkStation) 
                echo "<script> window.open('popD5.php', 'Detective 5 Popup', 'height=300, width=500'); </script>";
            else
                echo "<script> window.open('popMessage.php', 'Wrong Location choosen', 'height=200, width=500'); </script>";
        }

        elseif($_SESSION['d6Turn']){ 
            $checkStation = checkStation($_SESSION['linesD6'], $_SESSION['nodes']);
            if($checkStation) 
                echo "<script> window.open('popD6.php', 'Detective 6 Popup', 'height=300, width=500'); </script>";
            else
                echo "<script> window.open('popMessage.php', 'Wrong Location choosen', 'height=200, width=500'); </script>";    
        }
    }

		
	
    if($_SESSION['d1Turn'])
        echo "<h2 style='text-align: center; color: green'>Detective 1: current position ".$_SESSION['stationD1']."</h2>";
    elseif($_SESSION['d2Turn'])
        echo "<h2 style='text-align: center; color: green'>Detective 2: current position ".$_SESSION['stationD2']."</h2>";
    elseif($_SESSION['d3Turn'])
        echo "<h2 style='text-align: center; color: green'>Detective 3: current position ".$_SESSION['stationD3']."</h2>";
    elseif($_SESSION['d4Turn'])
        echo "<h2 style='text-align: center; color: green'>Detective 4: current position ".$_SESSION['stationD4']."</h2>";
    elseif($_SESSION['d5Turn'])
        echo "<h2 style='text-align: center; color: green'>Detective 5: current position ".$_SESSION['stationD5']."</h2>";
    elseif($_SESSION['d6Turn'])
        echo "<h2 style='text-align: center; color: green'>Detective 6: current position ".$_SESSION['stationD6']."</h2>"; 

    $tl = $_SESSION['mrx']->getTravelLog();   
    echo "<h3>Travel log of Mr. X</h3>"; 
    $cpt = 1;
    foreach ($tl as $key => $value) {  
        if($cpt == 3 OR $cpt == 8 OR $cpt == 13 OR $cpt == 18 OR $cpt == 24){
            echo "<strong style='color: red;'>Station ".$key."  :  ".$value."</strong><br>";
        } 
        else
            echo "<strong style='color: red;'>".$value."</strong><br>";
        $cpt++;
    }
    if($_SESSION['doubleMove'])
        "<strong style='color: green;'>Double move</strong><br>";

    
    echo "<br><strong>Current position :".$_SESSION['mrx']->getPosition()."</strong><br>";
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
    
    include 'map.php';

?>

