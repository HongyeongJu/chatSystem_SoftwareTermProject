<?php
/**
 * Created by PhpStorm.
 * User: Hong
 * Date: 2019-05-02
 * Time: 오후 2:41
 */


include "../server_connect/connect.php";

$user_id = $_POST[user_id];
$password = $_POST[password];
$name = $_POST[name];
$admission_year = $_POST[admission_year];
$birthday = $_POST[birthday];
$gender = $_POST[gender];
$address = $_POST[address];
$phone = $_POST[phone];
$major = $_POST[major];

$sql = "select * from user where user_id ='$user_id';";
$result = mysql_query($sql, $connect);

$row = mysql_fetch_array($result);

/*
$temp_age = explode("/", $birthday);
$age = date('Y') - $temp_age[2];
*/


if($row[user_id] == $user_id) {
    echo "<script> alert('현재 아이디가 겹칩니다.');</script>";
}else {
    $sql2 = 'SET NAMES utf8';
    mysql_query($sql2, $connect);
    $sql = "insert into user values ('$user_id', '$password', '$name', '$admission_year' , '$birthday', '$gender', '$address' , '$phone', '$major');";
    echo $sql;
    $result = mysql_query($sql, $connect);
    if(!$result){
        echo "<script> alert('회원 가입 실패하였습니다')</script>";
    }
}
/*
$sql = "select * from user where user_id ='$user_id';";
$result = mysql_query($sql, $connect);

$row = mysql_fetch_array($result);

echo "$row[name]";
*/

  echo "<script> location.replace('../login.php');</script>";

?>