<?php

class UnholyFactory {
	private static $fabric = [];

	public function absorb($class) {
		foreach (self::$fabric as $man)
		{
			if ($man instanceof $class) {
				print "(Factory already absorbed a fighter of type " . $man->name . ")" . PHP_EOL;
				return;
			}
		}
		if (!($class instanceof Fighter)) {
			print "(Factory can't absorb this, it's not a fighter)" . PHP_EOL;
			return;
		}
		array_push(self::$fabric, $class);
		print "(Factory absorbed a fighter of type " . $class->name . ")" . PHP_EOL;
	}

	public function fabricate($rf) {
		foreach (self::$fabric as $man)
		{
			if ($man->name == $rf) {
				$buf = $man;
				print "(Factory fabricates a fighter of type " . $rf . ")"  . PHP_EOL;
				unset($this->fabric, $man);
				return $buf;
			}
		}
		print "(Factory hasn't absorbed any fighter of type " . $rf . ")" . PHP_EOL;
		return null;
	}
}