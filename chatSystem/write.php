<?
session_start();

$id = $_SESSION[id];

if(isset($id)){
    $name = $id;
}else {
    $name = "unknown";
}

$db = new mysqli('localhost', 'game_admin', '123', 'game_flatform_db');
$db->query('SET NAMES utf8');
$db->query('
	INSERT INTO chat(name, msg, date)
	VALUES(
		"' . $db->real_escape_string($name) . '",
		"' . $db->real_escape_string($_POST['msg']) . '",
		NOW()
	)
');
?>