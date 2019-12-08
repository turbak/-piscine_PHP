<?php
if(file_exists("private/database"))
{
    $data = unserialize(file_get_contents("private/database"));
    foreach ($data as &$one)
    {
        echo "<tr>";
        echo "<td>". $one["name"] ."</td>";
        echo "<td><img src=\"".$one["img"]."\"></td>";
        echo "<td>".$one["q"]."</td>";
        echo "<td>".$one["price"]."</td>";
        echo "<td>".$one["cat"]."</td>";
		echo "<td>". "<button name=\"itemid\" value=" . $one["id"] . ">Купить</button> <br/>" . "<td>";
        echo "</tr>";
    }
}
?>