<?php
include "../server_connect/connect.php";
echo ("ㅎㅇㅎㅇ$_SESSION[user_id]");
?>

<!DOCTYPE html>
<html lang="ko">
<head>
<title>채팅시스템</title>
<meta charset="utf-8">
<script type="text/javascript" src="tt.js"></script>
<link rel="stylesheet" type="text/css" href="chat2.css" />
</head>
<body>

<style>
    .chat-box {
        position: fixed;
        top : 50px;
        left:300px;
        width: 300px;
    }

    .chat_form
    {
        width			: 1000px;
        padding			: 5px;
        margin-top		: 5px;
        border			: 1px solid #ffffff;
        background		: #007bff;
        font-size		: 0;
    }
    .chat_form input#name
    {
        width			: 40px;
        margin-right	: 5px;
        padding			: 2px;
        border			: 1px solid #ccc;
        font-size		: 9pt;
        font-family		: 'dotum', '돋움';
    }
    .chat_form input#msg
    {
        width			: 800px;
        margin-right	: 5px;
        padding			: 2px;
        border			: 1px solid #ccc;
        font-size		: 9pt;
        font-family		: 'dotum', '돋움';
    }
    .chat_form input#btn
    {
        width			: 48px;
        font-size		: 9pt;
        font-family		: 'dotum', '돋움';
    }


</style>
<div class="chat-box">
    <dl class="chat" id="list" style="margin:0px;"></dl>
    <form class="chat_form" onsubmit="chatManager.write(this); return false;" style="margin :0px;">
        <input name="msg" id="msg" type="text" />
        <input name="btn" id="btn" type="submit" value="입력" />
    </form>
</body>
</html>

</div>

