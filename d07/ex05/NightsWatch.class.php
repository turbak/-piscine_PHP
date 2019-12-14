<?php

class NightsWatch {
	private $recruits = [];

	public function recruit($class) {
		array_push($this->recruits, $class);
	}

	public function fight() {
		foreach ($this->recruits as $man) {
			if ($man instanceof IFighter)
				$man->fight();
		}
	}
}