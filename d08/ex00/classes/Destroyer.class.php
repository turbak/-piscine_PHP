<?php

class Destroyer extends Ship {

	public function __construct($x, $y, $map, $player_id)
	{

		parent::__construct($x, $y, 3, 1, "d08/ex00/src/SwordFrigate.jpg",
			"Sword Of Absolution", $map, 4, 10, 18, 3, 0, null, $player_id);
	}
}
