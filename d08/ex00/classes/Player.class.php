<?php

require_once 'Dice.class.php';
class Player
{
	protected $name;
	private $_ships;
	private $_die_val;
	private $_selected_ship;
	private $_type_id;


	public function getTypeId()
	{
		return $this->_type_id;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getSelectedShip()
	{
		return $this->_selected_ship;
	}

	public function setSelectedShip($selected_ship)
	{
		$this->_selected_ship = $selected_ship;
	}

	public function getDieVal()
	{
		return $this->_die_val;
	}

	public function getShips()
	{
		return $this->_ships;
	}

	public function get_ships_count()
	{
		return count($this->_ships);
	}

	public function __construct($name, $type_id)
	{
		$this->name = $name;
		$this->_type_id = $type_id;
	}

	public function add_ship($ship)
	{
		$this->_ships[] = $ship;
	}

	public function new_turn()
	{
		$this->_die_val = Dice::roll();
		$this->_selected_ship = null;
	}


}