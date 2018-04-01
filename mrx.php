<?php
/**
 * Created by PhpStorm.
 * User: Eric
 * Date: 3/27/2018
 * Time: 3:00 PM
 */
// mrx is child class of Abstract_Character, anything both type of characters do
// should go in there.
class Mrx{
    // seperate move function for Mr. X?
    /**
    * @var String name Mr. X.
    */ 
    public $name;
    /**
    * @var int number of taxi tickets.
    */
    public $taxi;
    /**
    * @var int number of bus tickets.
    */
    public $bus;
    /**
    * @var int number of underground tickets.
    */
    public $train;
    /**
    * @var int number of black tickets.
    */
    public $blackTicket;
    /**
    * @var int number of double.
    */
    public $double;
    /**
    * @var object card.
    */
    private $card = new Card();
    /**
    * @var int the current position of Mr X.
    */
    private $position;
    /**
    * @var associative array for the travel log of Mr X.
    */
    private $travelLog = array();
    
    
    /**
    * @param name, number of taxi tickets, number of bus tickets, number of train tickets and number of black tickets of Mr. X
    */
    public function __construct($taxi, $bus, $train, $blackTicket){
        $this->name = 'Mr X';
        $this->taxi = $taxi;
        $this->bus = $bus;
        $this->blackTicket = $blackTicket;
        $this->double = 2;
        $this->position = $card.getCard();
        echo "Mr X {$this->_name} Created:<br>";
    }
    /**
    * @param the new position of the detective.
    */
    public function move($newPosition){
        $this->position = $newPosition;
        if(isset($_POST['taxi'])){
            $this->taxi --;
            $this->travelLog[$newPosition] = ['taxi'];
        }
        if(isset($_POST['bus'])){
            $this->bus --;
            $this->travelLog[$newPosition] = ['bus'];
        }
        if(isset($_POST['train'])){
            $this->bus --;
            $this->travelLog[$newPosition] = ['train'];
        }
        if(isset($_POST['boat'])){
            $this->blackTicket --;
            $this->travelLog[$newPosition] = ['blackTicket'];
        }
        if(isset($_POST['blackTicket'])){
            $this->blackTicket --;
            $this->travelLog[$newPosition] = ['blackTicket'];
        }
    }
    
    public function doubleMove($position1, $position2){
        move($position1);
        move($position2);
        $this->double --;
    }
    
    public function location_type(){
        echo "I took a (movement type) here";
        // print to travel log on screen
    }
    public function use_hide(){
        echo "Mr. X uses obscures his movements with a smoke bomb!";
    }
}
