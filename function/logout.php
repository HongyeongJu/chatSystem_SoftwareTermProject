<?php
/**
 * Created by PhpStorm.
 * User: Hong
 * Date: 2019-05-07
 * Time: ¿ÀÈÄ 4:06
 */
session_start();

unset($_SESSION[id]);

echo "<script> location.replace('../index.php');</script>";

?>