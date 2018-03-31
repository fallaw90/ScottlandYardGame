<?php

	/**
	* class TralLog
	* Travel log of Mr X
	*/
	class TravelLog{

		/**
		* @var array Positions of Mr X during the game
		*/

		public $position = array(); 	

		/**
		* @param Add a new position for Mr X
		*/
		
		public function setPosition($pos){ 
			if(sizeof($this->position) <= 24)
				array_push($this->position, $pos); 
		}

		/**
		* @return Return the current position of Mr X or null if he doesn't move
		*/

		public function getPosition(){ 

			if(sizeof($this->position) > 0)
				return array_pop($this->position);
			else
				return null;

		}
	}


