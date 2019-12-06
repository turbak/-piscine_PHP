<?php
function auth($login, $passwd)
{
	$data = unserialize(file_get_contents("../private/passwd"));
	if ($data)
	{
		foreach ($data as $key => $val) {
			if ($val["login"] === $login && $val["passwd"] === hash("sha256", $passwd))
				return TRUE;
		}
	}
	return FALSE;
}
?>