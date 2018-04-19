<?php 

    function checkMove($station, $vehicle){ 
        
        $move = false;
        if(($station != $_SESSION['stationD1']) AND ($station != $_SESSION['stationD2']) AND ($station != $_SESSION['stationD3']) AND 
           ($station != $_SESSION['stationD4']) AND ($station != $_SESSION['stationD5']) AND ($station != $_SESSION['stationD6'])){

                if($vehicle == 't'){

                    if($_SESSION['mrx']->taxi > 0)
                        $_SESSION['mrx']->move($station, 'taxi');

                    elseif($_SESSION['mrx']->blackTicket > 0)
                        $_SESSION['mrx']->move($station, 'blackTicket');
                } 

                if($vehicle == 'b'){

                    if($_SESSION['mrx']->bus > 0)
                        $_SESSION['mrx']->move($station, 'bus');
                        
                    elseif($_SESSION['mrx']->blackTicket > 0)
                        $_SESSION['mrx']->move($station, 'blackTicket');
                }

                if($vehicle == 's'){

                    if($_SESSION['mrx']->train > 0)
                        $_SESSION['mrx']->move($station, 'train');
                        
                    elseif($_SESSION['mrx']->blackTicket > 0)
                        $_SESSION['mrx']->move($station, 'blackTicket');
                } 

                if($vehicle == 'w' AND $_SESSION['mrx']->blackTicket > 0){
                    $_SESSION['mrx']->move($station, 'blackTicket'); 
                }  
                
                $move = true;
        } 
        return $move;
    }   

    function getData(){
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
    }

    
    
    function move(){
        $lines = explode(" ", $_SESSION['linesMrx']);
        $nodes = explode("-", $_SESSION['nodesMrx']);
        shuffle($nodes);
        $pos = $_SESSION['mrx']->station;
        $size = count($pos); 
        $sizeNodes = sizeof($nodes);  

        for ($i=0; $i < $sizeNodes ; $i++) { 
            
            $node = trim($nodes[$i]);    
            $vehicle = substr($node, -1);
            $station = substr($node, 0, -1);
            $_SESSION['stationMrx'] = $station;

            $checkMove = checkMove($station, $vehicle); 
            
            if($checkMove){
                getData();  
                if($size == 3 OR $size == 8){  
                    return true;
                }
                else {
                    return false;
                }
            }
        }
    }


    $_SESSION['doubleMove'] = move();
    if($_SESSION['doubleMove']){
        move(); 
        $_SESSION['mrx']->double --;
        $_SESSION['doubleMove'] = true;
    }

    $_SESSION['mrxTurn'] = false;
    $_SESSION['d1Turn'] = true;

    

     