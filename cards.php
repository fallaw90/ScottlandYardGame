<?php

	/**
	* Class Cards
	* Contain a list of cards and distribute a card to the players to start the game. 
	*/
	class Cards{

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


	