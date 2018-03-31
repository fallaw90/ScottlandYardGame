<?php
    /**
     * Created by PhpStorm.
     * User: Eric
     * Date: 3/27/2018
     * Time: 3:00 PM
     */

include'cards.php';
class Player{
    /**
    * @var String name of the detective type.
    */ 
    public $name;
    /**
    * @var int number of ticket taxi.
    */
    public $taxi;
    /**
	* @var int number of ticket bus.
	*/
    public $bus;
    /**
	* @var int number of ticket train or underground.
	*/
    public $train;
    /**
	* @var int the current position of the detective.
	*/
    private $position = new cards();
    
    /**
	* @param name, number of tickets taxi, number of tickets bus and number of tickets train of the detective.
	*/
    public function __construct(Game $name, $taxi, $bus, $train){
        $this->name = $name;
        $this->taxi = $taxi;
        $this->bus = $bus;
        $this->train = $train;
        $this->position = $card.getCard();
    }
    
    /**
	* @param the new position of the detective.
	*/
    public function setPosition($newPosition){
       $this->position = $newPosition;
    }
    
    /**
	* @return the current position of the detective.
	*/
    public function getPosition(){
        return $this->position;
    }
    
   
}
