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


$sql = "select * from user where user_id ='$user_id';";
$result = mysql_query($sql, $connect);

$row = mysql_fetch_array($result);

if(isset($row)) {
    if($password == $row[password]){
        //Login Success
        $_SESSION[user_id] = $user_id;
        echo "<script> location.replace('../chatSystem/chat.php');</script>";
    }else {
        // Login Failed
        echo "<script>alert('비밀번호가 일치하지 않습니다.'); </script>";
    }

}else {
    echo "<script> alert('아이디가 없습니다'); </script>";
}
echo "<script> location.replace('../login.php');</script>";

?>