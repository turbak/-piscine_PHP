<?php


abstract class GameObject
{
	protected $x;
	protected $y;
	protected $width;
	protected $height;
	protected $img;
	protected $name;
	protected $map;
	protected $type;

	public function getType()
	{
		return $this->type;
	}

	const NONE = 0;
	const OBSTACLE = 1;
	const PLAYER1 = 2;
	const PLAYER2 = 3;

	public function __construct($x, $y, $width, $height, $img, $name, $map, $type)
	{
		$this->x = $x;
		$this->y = $y;
		$this->width = $width;
		$this->height = $height;
		$this->img = $img;
		$this->name = $name;
		$this->map = $map;
		$this->type = $type;
	}

	public function getName()
	{
		return $this->name;
	}

	public function intersect_with($x, $y, $width, $height)
	{
		if ($x >= $this->x && ($x + $width <= $this->x + $this->width))
		{
			if ($y >= $this->y && ($y + $height <= $this->y + $this->height))
				return True;
		}
		return False;
	}
}