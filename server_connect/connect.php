<?php

session_start();
echo "<meta charset='utf-8'>";

$connect = mysql_connect("localhost", "chat_admin", "123");
mysql_select_db("chat_flatform_db", $connect);

mysql_query('SET NAMES utf8');

mysql_query("set session character_set_connection=utf8;");
mysql_query("set session character_set_results=utf8;");
mysql_query("set session character_set_client=utf8;");

mysql_set_charset("utf8", $connect);


?>