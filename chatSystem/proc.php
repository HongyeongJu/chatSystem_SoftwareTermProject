<?
session_start();

$myid = $_SESSION[user_id];      // ���� id�� �޴´�.


if(!$_GET['date'])
{
	$_GET['date'] = date('Y-m-d H:i:s');
}

$db = new mysqli('localhost', 'chat_admin', '123', 'chat_flatform_db');
$db->query('SET NAMES utf8');
$res = $db->query('SELECT * FROM chat WHERE date > "' . $_GET['date'] . '"');
$data = array();
$date = $_GET['date'];

while($v = $res->fetch_array(MYSQLI_ASSOC))
{
	$data[] = $v;
	$date = $v['date'];
}

echo json_encode(array('date' => $date, 'data' => $data, 'myid' => $myid));
?>