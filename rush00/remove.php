<?php
session_start();
if ($_POST["remid"]) {
		$id = $_POST["remid"];
		$data = file_get_contents("private/database");
		$data = unserialize($data);
		if ($data) {
			foreach ($data as $key => $val) {
				if ($val["id"] == $id) {
					unset($data[$key]);
				}
			}
			file_put_contents("private/database", serialize($data));
		}
}
?>