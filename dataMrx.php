<?php
    
    include 'abstractData.php';
	include 'mrx.php';
	include 'player.php'; 

	session_start();

    $lines = explode(" ", $_SESSION['linesMrx']);
    $nodes = explode("-", $_SESSION['nodesMrx']);
    shuffle($nodes);   

    function check($station, $vehicle){ 
            
        if(($station != $_SESSION['stationD1']) AND ($station != $_SESSION['stationD2']) AND ($station != $_SESSION['stationD3']) AND 
           ($station != $_SESSION['stationD4']) AND ($station != $_SESSION['stationD5']) AND ($station != $_SESSION['stationD6'])){

                if($vehicle == 't' AND $_SESSION['mrx']->taxi > 0){
                        $_SESSION['mrx']->move($station, 'taxi'); 
                }

                if($vehicle == 'b' AND $_SESSION['mrx']->bus > 0){
                    $_SESSION['mrx']->move($station, 'bus'); 
                } 

                if($vehicle == 's' AND $_SESSION['mrx']->train > 0){
                    $_SESSION['mrx']->move($station, 'train'); 
                } 

                if($vehicle == 'w' AND $_SESSION['mrx']->blackTicket > 0){
                    $_SESSION['mrx']->move($station, 'blackTicket'); 
                } 

                elseif($_SESSION['mrx']->blackTicket > 0 AND $_SESSION['mrx']->bus <= 0 AND $_SESSION['mrx']->taxi <= 0 AND $_SESSION['mrx']->train <= 0){ 
                    $_SESSION['mrx']->move($station, 'blackTicket');
                } 
        } 
    }   
 
    $tl = $_SESSION['mrx']->getTravelLog();
    $size = count($tl);
    for ($i=0; $i < sizeof($nodes) ; $i++) { 
        
        $node = trim($nodes[$i]);    
        $vehicle = substr($node, -1);
        $station = substr($node, 0, -1);
        $_SESSION['stationMrx'] = $station;
        
        if(($station != $_SESSION['stationD1']) AND ($station != $_SESSION['stationD2']) AND ($station != $_SESSION['stationD3']) AND 
           ($station != $_SESSION['stationD4']) AND ($station != $_SESSION['stationD5']) AND ($station != $_SESSION['stationD6'])){

                if(($size == 3 OR $size == 8 OR $size == 13 OR $size == 18 OR $size == 24) AND ($i+1 < sizeof($nodes))){

                        $node1 = trim($nodes[$i+1]);    
                        $vehicle1 = substr($node1, -1);
                        $station1 = substr($node1, 0, -1);
                        $_SESSION['stationMrx'] = $station1;

                        if(($station1 != $_SESSION['stationD1']) AND ($station1 != $_SESSION['stationD2']) AND ($station1 != $_SESSION['stationD3']) AND 
                           ($station1 != $_SESSION['stationD4']) AND ($station1 != $_SESSION['stationD5']) AND ($station1 != $_SESSION['stationD6'])){

                                check($station, $vehicle);
                                check($station1, $vehicle1);
                                $_SESSION['doubleMove'] = true;
                                break;
                        }
                        elseif($i < sizeof($nodes)-1){
                            continue;
                        }
                }  
                check($station, $vehicle);
                $_SESSION['doubleMove'] = false;
                break; 
        } 
    }   

    $doc = new DOMDocument();
    @$doc->loadHTMLFile("map.php"); 
    // gets all AREAs
    $areas = $doc->getElementsByTagName('area');
    // traverse the object with all areas
    foreach($areas as $area){
    // if the current $area has ID attribute, gets and outputs the ID and content
        if($area->hasAttribute('id')) {
            $station = $area->getAttribute('id');  
            //If the station equal to the new station of Mr. X
            if ($station == $_SESSION['stationMrx']) {   
                $_SESSION['linesMrx'] = $area->getAttribute('target');
                $_SESSION['nodesMrx'] = $area->getAttribute('alt'); 
                break;
            }
        }
                        
    } 


    $_SESSION['mrxTurn'] = false;
    $_SESSION['d1Turn'] = true; 

    header('Location: game.php');

?>
     