<?php
    /**
     * Created by PhpStorm.
     * User: Eric
     * Date: 3/27/2018
     * Time: 3:00 PM
     */ 

/**
* Class Player
* Allow to create a detective. 
*/    
class Player extends AbstractData{  
    
    /**
    * @param number of taxi tickets, bus tickets, train tickets and black tickets for the detective
    */
    public function __construct($name, $taxi, $bus, $train){
        parent::__construct($name, $taxi, $bus, $train);
    }
    
    /**
    * @param the new position of the detective.
    */
    public function move($newPosition){
        $this->position = $newPosition; 
        $mrx->bus ++;

        if(isset($_POST['taxi'])){
            $this->taxi --; 
            $mrx->taxi ++;
        }
        elseif(isset($_POST['bus'])){
            $this->bus --; 
            $mrx->bus ++;
        }
        elseif(isset($_POST['train'])){
            $this->train --; 
            $mrx->train ++;
        }   
    } 
     
}
