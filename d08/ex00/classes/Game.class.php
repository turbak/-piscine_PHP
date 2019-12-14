<?php

require_once 'Map.class.php';
require_once 'Obstacle.class.php';
require_once 'Ship.class.php';
require_once 'Player.class.php';
require_once 'Destroyer.class.php';
require_once 'GameObject.class.php';

class Game
{
	private $_map;
	private $_obstacles;
	private $_players;

	/**
	 * @return array
	 */
	public function getPlayers()
	{
		return $this->_players;
	}
	private $_player_active;

	const MAP_WIDTH = 150;
	const MAP_HEIGHT = 100;

	const OBSTACLES_COUNT = 5;
	const PARKING_OFFSET = 10;

	const PLAYER1_WIN = 1;
	const PLAYER2_WIN = 2;
	const DRAW = 3;
	const NOT_FINISHED = 0;

	const DAT_NAME = 'gamemap.dat';

	public function __construct()
	{
		$this->_map = new Map(Game::MAP_WIDTH, Game::MAP_HEIGHT);
		for ($i = 0; $i < Game::OBSTACLES_COUNT; $i++)
		{
			$this->_obstacles[] = new Obstacle(
				rand(self::PARKING_OFFSET, self::MAP_WIDTH - self::PARKING_OFFSET - 1),
				rand(0, self::MAP_HEIGHT - 1),
				1, 1, null, "obstacle", $this->_map);
		}
		$this->_players = array();
		$this->_players[0] = new Player('Player 1', GameObject::PLAYER1);
		$this->_players[1] = new Player('Player 2', GameObject::PLAYER2);
		$this->_players[0]->add_ship(new Destroyer(0,0, $this->_map, GameObject::PLAYER1));
		$this->_players[1]->add_ship(new Destroyer(10,10, $this->_map, GameObject::PLAYER2));
		$data = serialize($this);
		file_put_contents(self::DAT_NAME, $data);
	}

	public static function load_class()
	{
		if (file_exists(self::DAT_NAME))
		{
			$f = file_get_contents(self::DAT_NAME);
			return (unserialize($f));
		}
		$class = new Game();
		$class->_player_active = intval(0);
		$class->_players[intval($class->_player_active)]->new_turn();
		self::save_class($class);
		return ($class);
	}

	public static function save_class($class)
	{
		$data = serialize($class);
		file_put_contents(self::DAT_NAME, $data);
	}

	public function get_current_player()
	{
		return ($this->_players[intval($this->_player_active)]);
	}

	public function change_active_player()
	{
		$this->_player_active = ! intval($this->_player_active);
		$this->_players[intval($this->_player_active)]->new_turn();
	}



	public function get_objects()
	{
		$objects = array();
		foreach ($this->_obstacles as $obs)
			$objects[] = $obs;
		foreach ($this->_players as $player)
		{
			$ships = $player->getShips();

			foreach ($ships as $ship)
				$objects[] = $ship;
		}
		return $objects;
	}

	private function end_game()
	{
		if ($this->_players[0]->get_ships_count() == 0 &&
			$this->_players[1]->get_ships_count() == 0)
			return self::DRAW;
		if ($this->_players[0]->get_ships_count() == 0)
			return self::PLAYER2_WIN;
		if ($this->_players[1]->get_ships_count() == 0)
			return self::PLAYER1_WIN;
		return self::NOT_FINISHED;
	}

}
