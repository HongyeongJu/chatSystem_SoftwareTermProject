<?php
/**
 * Created by PhpStorm.
 * User: Hong
 * Date: 2019-05-02
 * Time: 오후 2:41
 */


include "../server_connect/connect.php";
$id = $_POST[id];
$name = $_POST[name];
$password = $_POST[password];
$password2 = $_POST[password2];
$birthday = $_POST[age];
$sex = $_POST[sex];
$phone = $_POST[phone];
$address = $_POST[address];

$sql = "select * from user where user_id ='$id';";
$result = mysql_query($sql, $connect);

$row = mysql_fetch_array($result);

$temp_age = explode("/", $birthday);
$age = date('Y') - $temp_age[2];



if($row[user_id] == $id) {
    echo "<script> alert('현재 아이디가 겹칩니다.');</script>";
}else if($password != $password2){
    echo "<script> alert('비밀번호가 서로 다릅니다');</script>";
}else {
    $sql = "insert into user values ('$id', '$name', $password, '$age' , '$sex', '$phone', '$address' , '1');";
    //echo $sql;
    $result = mysql_query($sql, $connect);
    if(!$result){
        echo "<script> alert('회원 가입 실패하였습니다')</script>";
    }
}


  echo "<script> location.replace('../login.php');</script>";

?>