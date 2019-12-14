<?php

require_once("classes/Game.class.php");

function get_obj_xy($x, $y, $objs)
{
	foreach ($objs as $obj) {
		if ($obj->intersect_with($x, $y, 1, 1))
			return $obj;
	}
	return null;
}

function check_xy($x, $y, $objs)
{
	foreach ($objs as $obj) {
		if ($obj->intersect_with($x, $y, 1, 1))
			return $obj->getType();
	}
	return GameObject::NONE;
}

function get_table($objs)
{
	$table = '<table>';
	for ($i = 0; $i < 100; $i++) {
		$table .= "<tr id=\"$i\">";
		for ($j = 0; $j < 150; $j++) {
			$form_id = $j . ' ' . $i;

			$table .= "<td id=\"$j\">" .
				"<form id=\"$form_id\" method=\"get\" action=\"index.php\">
<input type=\"hidden\" name=\"pos\" value=\"$j $i\"><div class=\"";

			$ch = check_xy($j, $i, $objs);
			if ($ch == GameObject::PLAYER1)
				$table .= "cellp1 cell";
			else if ($ch == GameObject::PLAYER2)
				$table .= "cellp2 cell";
			else if ($ch == GameObject::OBSTACLE)
				$table .= "cellobs cell";
			else
				$table .= "cell";
			$table .= "\" ";
			$table .= "onclick=\"document.getElementById('$form_id').submit();\"></div></form></td>";
		}
		$table .= '</tr>';
	}
	$table .= '</table>';
	return $table;
}


$objs = array();
$f = null;

if ($f = Game::load_class()) {
	$objs = $f->get_objects();
}

if (isset($_GET['next_turn']))
{
	if ($_GET['next_turn'] == 'ok')
	{
		$f->change_active_player();
	}
	Game::save_class($f);
}

$player = $f->get_current_player();
$name = $player->getName();
$die_val = intval($player->getDieVal());

if (isset($_GET['pos']) && $player->getSelectedShip() == null)
{
	$val = explode(" ", $_GET['pos']);
	if (($obj = get_obj_xy($val[0], $val[1], $objs)) != null)
	{
		if ($obj->getType() == $player->getTypeId())
		{
			$player->setSelectedShip($obj);
			Game::save_class($f);
		}
	}
}


if (isset($_GET['rotate']) && $player->getSelectedShip() != null)
{
	$ship = $player->getSelectedShip();
	if ($_GET['rotate'] == 'left')
		$ship->rotate_left();
	else if ($_GET['rotate'] == 'right')
		$ship->rotate_right();
	Game::save_class($f);
}

if (isset($_GET['shield']) && $player->getSelectedShip() != null)
{
	$ship = $player->getSelectedShip();
	if ($_GET['shield'] == 'add')
		$ship->addShield();
	Game::save_class($f);
}

if (isset($_GET['move']) && $player->getSelectedShip() != null)
{
	$ship = $player->getSelectedShip();
	if ($_GET['move'] == 'move')
		$ship->move();
	Game::save_class($f);
}



$body = get_table($objs);

$body .= <<<PANEL_TOP
<div class="panel">
	<p>$name</p>
	<p>Diy: $die_val</p>
PANEL_TOP;

if (($ship = $player->getSelectedShip()) != null)
{
	$body .= "<p>";
	$body .= "Name: " . $ship->getName() . "<br />";
	$body .= "PP: " . $ship->getPp() . "<br />";
	$body .= "HP: " . $ship->getHp() . "<br />";
	$body .= "Speed: " . $ship->getSpeed() . "<br />";
	$body .= "Shield: " . $ship->getShield() . "<br />";
	$body .= "</p>";

	$body .= <<<PANEL_BOTTOM
	<form method="get" action="index.php">
		<p><button name="rotate" value="left">rotate_left</button>
		<button name="rotate" value="right">rotate_right</button>
		<button name="move" value="move">MOVE</button>
		</p>
		<p>
		<select>
		<option>1</option>
		<option>2</option>
		</select>
		<button name="fire" value="fire">FIRE</button>
		</p>
		<p>
		<button name="shield" value="add">Shield add</button>
		<button name="next_turn" value="ok">Next turn</button>
		</p>
	</form>
PANEL_BOTTOM;

}
$body .= <<<PANEL_BOTTOM
</div>
PANEL_BOTTOM;


echo add_template("Warhammer 40000", $body);
