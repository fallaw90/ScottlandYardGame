<?php
/**
 * Created by PhpStorm.
 * User: Eric
 * Date: 3/27/2018
 * Time: 3:52 PM
 */


    
class AbstractData{
    /**
    * @var String name the detective.
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
    * @var object card.
    */
    private $card;
    /**
    * @var int the current position of the detective.
    */
    private $position;

    /**
    * @param name, number of taxi tickets, number of bus tickets, number of train tickets of the detective
    */
    public function __construct($name, $taxi, $bus, $train){
        $this->name = $name;
        $this->taxi = $taxi;
        $this->bus = $bus;
        $this->train = $train; 
        $this->card = new Card();
        $this->position = $this->card->getCard();  
    }

    public function getPosition(){
        return $this->position;
    }
}


/**
* Class Card
* Contain a list of cards and distribute a card to the players to start the game. 
*/
class Card{

    /**
    * @var array list of cards
    */

    public $cards = array();

    public function __construct(){ 

        $this->cards = [155, 103, 29, 50, 174, 132, 94, 13, 197, 138, 112, 26, 91, 141, 198, 117, 34, 53];       
    }   
        
    /**
    * @return Give the initial player's position to start the game
    */

    public function getCard(){
            
        shuffle($this->cards);

        return array_pop($this->cards);
    }
}
