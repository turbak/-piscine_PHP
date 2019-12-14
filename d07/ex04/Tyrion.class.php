<?php

class Tyrion extends Lannister {

	public function sleepWith($class)
	{
		if (!($class instanceof Lannister))
		{
			print "Let's do this\n";
		}
		else
		{
			print "Not even if I'm drunk !\n";
		}
	}
}