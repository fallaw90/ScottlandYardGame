<?php
    /**
     * Created by PhpStorm.
     * User: Eric
     * Date: 3/27/2018
     * Time: 3:00 PM
     */ 


class Player extends AbstractData{  
    
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
