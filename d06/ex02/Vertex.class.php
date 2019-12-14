<?php

require_once 'Color.class.php';

class Vertex
{
	private $_x;
	private $_y;
	private $_z;
	private $_w;
	private $_color;
	static $verbose = FALSE;

	function __construct(Array $kwargs)
	{
		if (array_key_exists('color', $kwargs))
			$this->_color = $kwargs['color'];
		else
			$this->_color = new Color(array('red' => 255, 'green' => 255, 'blue' => 255));
		if ((array_key_exists('x', $kwargs)) && (array_key_exists('y', $kwargs))
			&& (array_key_exists('z', $kwargs))) {
			$this->_x = $kwargs['x'];
			$this->_y = $kwargs['y'];
			$this->_z = $kwargs['z'];
		}
		if ((array_key_exists('w', $kwargs)))
			$this->_w = $kwargs['w'];
		else
			$this->_w = 1.0;
		if (self::$verbose)
			printf("Vertex( x: %1.2f, y: %1.2f, z:%1.2f, w:%1.2f, Color( red: %3d, green: %3d, blue: %3d ) ) constructed\n", $this->_x, $this->_y, $this->_z, $this->_w,
				$this->_color->red, $this->_color->green, $this->_color->blue);
	}

	function __toString()
	{
		if (self::$verbose)
			return sprintf("Vertex( x: %1.2f, y: %1.2f, z:%1.2f, w:%1.2f, Color( red: %3d, green: %3d, blue: %3d ) )", $this->_x, $this->_y, $this->_z, $this->_w,
				$this->_color->red, $this->_color->green, $this->_color->blue);
		else
			return sprintf("Vertex( x: %1.2f, y: %1.2f, z:%1.2f, w:%1.2f )", $this->_x,
				$this->_y, $this->_z, $this->_w);
	}

	function __destruct()
	{
		if (self::$verbose)
			printf("Vertex( x: %1.2f, y: %1.2f, z:%1.2f, w:%1.2f, Color( red: %3d, green: %3d, blue: %3d ) ) destructed\n", $this->_x, $this->_y, $this->_z, $this->_w,
			$this->_color->red, $this->_color->green, $this->_color->blue);
	}

	function doc()
	{
		return file_get_contents("Vertex.doc.txt");
	}

	/**
	 * @return float
	 */
	public function getX()
	{
		return $this->_x;
	}

	/**
	 * @param float $x
	 */
	public function setX($x)
	{
		$this->_x = $x;
	}

	/**
	 * @return float
	 */
	public function getY()
	{
		return $this->_y;
	}

	/**
	 * @param float $y
	 */
	public function setY($y)
	{
		$this->_y = $y;
	}

	/**
	 * @return float
	 */
	public function getZ()
	{
		return $this->_z;
	}

	/**
	 * @param float $z
	 */
	public function setZ($z)
	{
		$this->_z = $z;
	}

	/**
	 * @return float
	 */
	public function getW()
	{
		return $this->_w;
	}

	/**
	 * @param float $w
	 */
	public function setW($w)
	{
		$this->_w = $w;
	}

	/**
	 * @return Color
	 */
	public function getColor()
	{
		return $this->_color;
	}

	/**
	 * @param Color $color
	 */
	public function setColor($color)
	{
		$this->_color = $color;
	}
}