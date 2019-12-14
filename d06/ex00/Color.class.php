<?php
class Color {
	public $red = 0;
	public $green = 0;
	public $blue = 0;
	public static $verbose = FALSE;

	function __construct(Array $kwargs)
	{
		if (array_key_exists('rgb', $kwargs))
		{
			$this->red = intval($kwargs['rgb'] / ( 256 ** 2));
			$this->green = intval(($kwargs['rgb'] / 256) % 256);
			$this->blue = intval($kwargs['rgb'] % 256);
		}
		else if (array_key_exists('red', $kwargs) && array_key_exists('green', $kwargs)
			&& array_key_exists('blue', $kwargs))
		{

				$this->red = intval($kwargs['red']);
				$this->green = intval($kwargs['green']);
				$this->blue = intval($kwargs['blue']);
		}
		if (self::$verbose)
			printf ("Color( red: %3d, green: %3d, blue: %3d ) constructed.\n", $this->red, $this->green, $this->blue);
	}

	function __destruct()
	{
		if (self::$verbose)
			printf ("Color( red: %3d, green: %3d, blue: %3d ) destructed.\n", $this->red, $this->green, $this->blue);
	}

	function __toString()
	{
		return sprintf ("Color( red: %3d, green: %3d, blue: %3d )", $this->red, $this->green, $this->blue);
	}

	function doc()
	{
		return file_get_contents("Color.doc.txt");
	}

	function add($color)
	{
		$red = $color->red + $this->red;
		$green = $color->green + $this->green;
		$blue = $color->blue + $this->blue;
		if ($red > 255)
			$red = 255;
		if ($green > 255)
			$green = 255;
		if ($blue > 255)
			$blue = 255;
		return new Color(array('red' => $red, 'green' => $green, 'blue' => $blue));
	}

	function sub($color)
	{
		$red =  $color - $this->red;
		$green =  $color - $this->green;
		$blue =  $color - $this->blue;
		if ($red < 0)
			$red = 0;
		if ($green < 0)
			$green = 0;
		if ($blue < 0)
			$blue = 0;
		return new Color(array('red' => $red, 'green' => $green, 'blue' => $blue));
	}

	function mult($color)
	{
		$red = $color * $this->red;
		$green = $color * $this->green;
		$blue = $color * $this->blue;
		if ($red > 255)
			$red = 255;
		if ($green > 255)
			$green = 255;
		if ($blue > 255)
			$blue = 255;
		return new Color(array('red' => $red, 'green' => $green, 'blue' => $blue));
	}
}
?>