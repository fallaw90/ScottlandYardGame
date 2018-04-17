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
    
    /**
    * @var int number of black tickets.
    */
    public $blackTicket;
    
    /**
    * @var int number of double tickets.
    */
    public $double; 
    
    /**
    * @var associative array for the travel log of Mr X.
    */
    private $travelLog; 
    /**
    * @param number of taxi tickets, number of bus tickets, number of train tickets and number of black tickets of Mr. X
    */
    public function __construct($name, $taxi, $bus, $train, $blackTicket){
        
        /**
        * @param name, number of taxi tickets, number of bus tickets, number of train tickets of the parent constructor
        */
        parent::__construct($name, $taxi, $bus, $train);
        
        $this->name = 'Mr. X';
        $this->blackTicket = $blackTicket;
        $this->double = 2; 
        $this->travelLog = array();  
    }
    
    /**
    * @param the new position and the vehicle that Mr. X takes to move on the new location.
    */
    public function move($newPosition, $ticket){
        $this->position = $newPosition;  
        
        //If Mr. X took a taxi
        if($ticket == 'taxi'){
            $this->taxi --;
            $this->travelLog[$newPosition] = 'taxi';
        }
        //If Mr. X took a bus
        elseif($ticket == 'bus'){
            $this->bus --;
            $this->travelLog[$newPosition] = 'bus';
        }
        //If Mr. X took a train
        elseif($ticket == 'train'){
            $this->train --;
            $this->travelLog[$newPosition] = 'train';
        } 
        //If Mr. X uses a black ticket. In this case we don't know what vehicle he took so we just put blackTicket on the travel log
        elseif($ticket == 'blackTicket'){
            $this->blackTicket --;
            $this->travelLog[$newPosition] = 'blackTicket';
        }
    }
    
    /**
    * @param the new positions of Mr. X
    */
    public function doubleMove($position1, $ticket1, $position2, $ticket2){
        $this->move($position1, $ticket1);
        $this->move($position2, $ticket2);
        $this->position = $position2;
        $this->double --;
    }
    
    /**
    * @return an associative array that represents Mr. X's travel log
    */
    public function getTravelLog(){
        return $this->travelLog;
    }

}
