<?php

class Jaime extends Lannister {
	public function sleepWith($class)
	{
		if ($class instanceof Cersei)
		{
			print "With pleasure, but only in a tower in Winterfell, then.\n";
		}
		else if (!($class instanceof Lannister))
		{
			print "Let's do this\n";
		}
		else
		{
			print "Not even if I'm drunk !\n";
		}
	}
}