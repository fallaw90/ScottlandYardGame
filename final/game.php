<?php 
    
    include 'abstractData.php';
    include 'mrx.php';
    include 'player.php';

    session_start();

    //If move to another position
    if (isset($_POST['station'])) {

        $_SESSION['station'] = $_POST['station'];  
        $_SESSION['lines'] = $_POST['lines']; 
        $_SESSION['nodes'] = $_POST['nodes']; 

        function checkStation($linesPlayer, $nodesNewStation){ 
            $lines = explode(" ", $linesPlayer);
            $nodes = explode("-", $nodesNewStation);
            for ($i=0; $i < sizeof($lines) ; $i++) { 
                for ($j=0; $j < sizeof($nodes) ; $j++) { 
                    if($lines[$i] == $nodes[$j]){
                        if(($_SESSION['station'] != $_SESSION['stationMrx']) AND 
                           ($_SESSION['station'] != $_SESSION['stationD1']) AND 
                           ($_SESSION['station'] != $_SESSION['stationD2']) AND 
                           ($_SESSION['station'] != $_SESSION['stationD3']) AND 
                           ($_SESSION['station'] != $_SESSION['stationD4']) AND
                           ($_SESSION['station'] != $_SESSION['stationD5']) AND
                           ($_SESSION['station'] != $_SESSION['stationD6'])){
                            
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
            $checkStation = checkStation($_SESSION['linesMrx'], $_SESSION['nodes']);
            if($checkStation) 
                echo "<script> window.open('popMrx.php', 'Mr. X Popup', 'height=300, width=500'); </script>";
            else
                echo "<script> window.open('popMessage.php', 'Wrong Location choosen', 'height=200, width=500'); </script>";
        }

        elseif($_SESSION['d1Turn']){ 
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

    if($_SESSION['mrxTurn'])
        echo "<h2 style='text-align: center; color: red'>Mr. X turn: current position ".$_SESSION['stationMrx']."</h2>";
    elseif($_SESSION['d1Turn'])
        echo "<h2 style='text-align: center; color: red'>Detective 1 turn: current position ".$_SESSION['stationD1']."</h2>";
    elseif($_SESSION['d2Turn'])
        echo "<h2 style='text-align: center; color: red'>Detective 2 turn: current position ".$_SESSION['stationD2']."</h2>";
    elseif($_SESSION['d3Turn'])
        echo "<h2 style='text-align: center; color: red'>Detective 3 turn: current position ".$_SESSION['stationD3']."</h2>";
    elseif($_SESSION['d4Turn'])
        echo "<h2 style='text-align: center; color: red'>Detective 4 turn: current position ".$_SESSION['stationD4']."</h2>";
    elseif($_SESSION['d5Turn'])
        echo "<h2 style='text-align: center; color: red'>Detective 5 turn: current position ".$_SESSION['stationD5']."</h2>";
    elseif($_SESSION['d6Turn'])
            echo "<h2 style='text-align: center; color: red'>Detective 6 turn: current position ".$_SESSION['stationD6']."</h2>"; 

    include 'map.php';

?>

