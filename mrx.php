<?php
/**
 * Created by PhpStorm.
 * User: Eric
 * Date: 3/27/2018
 * Time: 3:00 PM
 */
// mrx is child class of Abstract_Character, anything both type of characters do
// should go in there. 
class Mrx extends AbstractData{ 

    public $blackTicket;
    /**
    * @var int number of double.
    */
    public $double;  
    /**
    * @var associative array for the travel log of Mr X.
    */
    private $travelLog;
    
    
    /**
    * @param number of taxi tickets, number of bus tickets, number of train tickets and number of black tickets of Mr. X
    */
    public function __construct($taxi, $bus, $train, $blackTicket){

        parent::__construct($name, $taxi, $bus, $train);
        
        $this->name = 'Mr X'; 
        $this->blackTicket = $blackTicket;
        $this->double = 2; 
        $this->travelLog = array(); 
    } 
    /**
    * @param the new position of the detective.
    */
    

    public function move($newPosition){
        $this->position = $newPosition; 

        //For test
        $this->travelLog[$newPosition] = 'taxi';
        $this->taxi --;
        
        if(isset($_POST['taxi'])){
            $this->taxi --;
            $this->travelLog[$newPosition] = 'taxi';
        }
        elseif(isset($_POST['bus'])){
            $this->bus --;
            $this->travelLog[$newPosition] = 'bus';
        }
        elseif(isset($_POST['train'])){
            $this->bus --;
            $this->travelLog[$newPosition] = 'train';
        }
        elseif(isset($_POST['boat'])){
            $this->blackTicket --;
            $this->travelLog[$newPosition] = 'blackTicket';
        }
        elseif(isset($_POST['blackTicket'])){
            $this->blackTicket --;
            $this->travelLog[$newPosition] = 'blackTicket';
        }
    }
    
    public function doubleMove($position1, $position2){
        $this->move($position1);
        $this->move($position2);
        $this->position = $position2;
        $this->double --;
    }

    public function getTravelLog(){
        return $this->travelLog;
    }


}
