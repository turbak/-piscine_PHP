<?php

require_once 'GameObject.class.php';
class Obstacle extends GameObject
{
	public function __construct($x, $y, $width, $height, $img, $name, $map)
	{
		parent::__construct($x, $y, $width, $height, $img, $name, $map, self::OBSTACLE);
	}
}