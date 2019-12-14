<?php

require_once 'Vertex.class.php';
require_once 'Vector.class.php';

class Vector {
	private $_x;
	private $_y;
	private $_z;
	private $_w = 0;
	private $_orig;
	static $verbose = FALSE;

	function __construct(Array $kwargs)
	{
		if (array_key_exists('orig', $kwargs))
			$this->_orig = $kwargs['orig'];
		else
			$this->_orig = new Vertex( array( 'x' => 0.0, 'y' => 0.0, 'z' => 0.0, 'w' => 1.0 ) );
		if (array_key_exists('dest', $kwargs)) {
			$this->_x = $kwargs['dest']->getX() - $this->_orig->getX();
			$this->_y = $kwargs['dest']->getY() - $this->_orig->getY();
			$this->_z = $kwargs['dest']->getZ() - $this->_orig->getZ();
			$this->_w = 0;
		}
		if (self::$verbose)
			printf("Vector( x:%0.2f, y:%0.2f, z:%0.2f, w:%0.2f ) constructed\n", $this->_x, $this->_y, $this->_z, $this->_w);
	}

	function __destruct()
	{
		if (self::$verbose)
			printf("Vector( x:%0.2f, y:%0.2f, z:%0.2f, w:%0.2f ) destructed\n", $this->_x, $this->_y, $this->_z, $this->_w);
	}

	function __toString()
	{
		return sprintf("Vector( x:%0.2f, y:%0.2f, z:%0.2f, w:%0.2f )", $this->_x, $this->_y, $this->_z, $this->_w);
	}

	/**
	 * @return float
	 */
	public function magnitude()
	{
		return sqrt(($this->_x * $this->_x) + ($this->_y * $this->_y) + ($this->_z * $this->_z));
	}

	/**
	 * @return float
	 */
	public function dotProduct(Vector $rhs)
	{
		return (($this->_x * $rhs->getX()) + ($this->_y * $rhs->getY()) + ($this->_z * $rhs->getZ()));
	}

	public function crossProduct(Vector $rhs)
	{
		$x = $this->_y * $rhs->getZ() - $this->_z * $rhs->getY();
		$y = $this->_z * $rhs->getX() - $this->_x * $rhs->getZ();
		$z = $this->_x * $rhs->getY() - $this->_y * $rhs->getX();
		return new Vector(array('dest' => new Vertex(array('x' => $x, 'y' => $y, 'z' => $z))));
	}

	public function normalize()
	{
		$magn = $this->magnitude();
		if ($magn == 1) {
			return clone $this;
		}
		$x = $this->_x / $magn;
		$y = $this->_y / $magn;
		$z = $this->_z / $magn;
		return new Vector(array('dest' => new Vertex(array('x' => $x, 'y' => $y, 'z' => $z))));
	}

	public function add(Vector $rhs)
	{
		$x = $this->_x + $rhs->getX();
		$y = $this->_y + $rhs->getY();
		$z = $this->_z + $rhs->getZ();
		return new Vector( array( 'dest' => new Vertex(array ( 'x' => $x, 'y' => $y, 'z' => $z ) )));
	}

	public function scalarProduct($k)
	{
		$x = $k * $this->_x;
		$y = $k * $this->_y;
		$z = $k * $this->_z;
		return new Vector( array( 'dest' => new Vertex(array ( 'x' => $x, 'y' => $y, 'z' => $z ))));
	}

	public function sub(Vector $rhs)
	{
		$x = $this->_x - $rhs->_x;
		$y = $this->_y - $rhs->_y;
		$z = $this->_z - $rhs->_z;
		return new Vector( array( 'dest' => new Vertex(array ( 'x' => $x, 'y' => $y, 'z' => $z ) )));
	}

	/**
	 * @return float
	 */
	public function cos(Vector $rhs)
	{
		return ((($this->_x * $rhs->getX()) + ($this->_y * $rhs->getY()) +
				($this->_z * $rhs->getZ())) / sqrt((($this->_x * $this->_x) +
					($this->_y * $this->_y) + ($this->_z * $this->_z)) * (($rhs->getX() * $rhs->getX())
					+ ($rhs->getY() * $rhs->getY()) + ($rhs->getZ() * $rhs->getZ()))));
	}

	public function opposite()
	{
		return new Vector( array( 'dest' => new Vertex(array ( 'x' => -$this->_x, 'y' => -$this->_y, 'z' => -$this->_z ) )));
	}

	/**
	 * @return float
	 */
	public function getX()
	{
		return $this->_x;
	}

	/**
	 * @return float
	 */
	public function getY()
	{
		return $this->_y;
	}

	/**
	 * @return float
	 */
	public function getZ()
	{
		return $this->_z;
	}

	/**
	 * @return float
	 */
	public function getW()
	{
		return $this->_w;
	}

	public function doc()
	{
		return file_get_contents("Vector.doc.txt");
	}


}
