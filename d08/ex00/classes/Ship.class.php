<?php

require_once 'GameObject.class.php';
abstract class Ship extends GameObject
{
	protected $hp;
	protected $pp;
	protected $speed;
	protected $inert;
	protected $shield;

	protected $weapons;
	protected $direction;
	protected $stationary = 0;
	protected $player = 0;

	const NORTH = 1;
	const EAST = 2;
	const SOUTH = 3;
	const WEST = 4;

	public function getHp()
	{
		return $this->hp;
	}

	public function getPp()
	{
		return $this->pp;
	}

	public function getWeapons()
	{
		return $this->weapons;
	}

	public function getShield()
	{
		return $this->shield;
	}

	public function getSpeed()
	{
		return $this->speed;
	}

	public function __construct($x, $y, $width, $height, $img, $name, $map, $hp, $ep, $speed, $inert, $shield, $weapons, $type)
	{
		parent::__construct($x, $y, $width, $height, $img, $name, $map, $type);
		$this->direction = $type == GameObject::PLAYER1 ? self::EAST : self::WEST;
        $this->hp = $hp;
        $this->pp = $ep;
        $this->speed = $speed;
        $this->inert = $inert;
        $this->shield = $shield;
        $this->weapons = $weapons;
	}

	public function move()
    {
    	switch ($this->direction)
		{
			case self::NORTH:
				$this->y -= $this->speed;
				break;
			case self::EAST:
				$this->x += $this->speed;
				break;
			case self::SOUTH:
				$this->y += $this->speed;
				break;
			case self::WEST:
				$this->x -= $this->speed;
				break;
		}
    }

    public function inertmov()
	{
		$this->move($this->inert);
	}

    protected function check_boundaries()
	{

	}

	private function swap_wh()
	{
		$temp = $this->width;
		$this->width = $this->height;
		$this->height = $temp;
	}

	public function rotate_right()
	{
		$this->direction += 1;
		if ($this->direction > self::WEST)
			$this->direction = self::NORTH;
		$this->swap_wh();
	}
	public function rotate_left()
	{
		$this->direction -= 1;
		if ($this->direction < self::NORTH)
			$this->direction = self::WEST;
		$this->swap_wh();
	}

	public function addShield()
	{
		if ($this->pp > 0) {
			$this->pp -= 1;
			$this->shield += 1;
		}
	}

}