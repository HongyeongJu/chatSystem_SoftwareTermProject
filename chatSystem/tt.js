
var chatManager = new function(){

    var idle 		= true;
    var interval	= 500;
    var xmlHttp		= new XMLHttpRequest();
    var finalDate	= '';

    // Ajax Setting
    // 3
    xmlHttp.onreadystatechange = function()
    {
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200)
        {
            // JSON 포맷으로 Parsing
            res = JSON.parse(xmlHttp.responseText);
            finalDate = res.date;

            var myid = res.myid;
            // 채팅내용 보여주기
            chatManager.show(res.data, myid, res.date);

            // 중복실행 방지 플래그 OFF
            idle = true;
        }
    }

    // 채팅내용 가져오기
    //2
    this.proc = function()
    {
        // 중복실행 방지 플래그가 ON이면 실행하지 않음
        if(!idle)
        {
            return false;
        }

        // 중복실행 방지 플래그 ON
        idle = false;

        // Ajax 통신
        xmlHttp.open("GET", "proc.php?date=" + encodeURIComponent(finalDate), true);
        xmlHttp.send();
    }

    // 채팅내용 보여주기
    // 4
    this.show = function(data, myid, date)
    {
        var o = document.getElementById('list');
        var dt, dd;

        var chat_message_from_me;
        var chat_message_to_me;
        var span;
        var div;
        var h3;

        /*
        myid : 현재 나의 아이디
        data[i].name  : 작성자
        문자를 내가 썻을 때
    div chat__message chat_message-from-me
	    span chat__message-time
	    span chat__message-body
    문자가 나에게 왔을 때
    div chat__message chat__message-to-me
	    div chat__message-center
		    h3 chat__message-username
		    span chat__message-body
	    span chat__message-time
        */
        // 채팅내용 추가
        for(var i=0; i<data.length; i++)
        {
            //문자를 내가 썻을 때
            if(myid == data[i].name){
                chat_message_from_me = document.createElement('div');
                chat_message_from_me.setAttribute("class", "chat__message chat__message-from-me");
                span = document.createElement('span');
                span.setAttribute("class", "chat__message-time");
                span.appendChild(document.createTextNode(date));
                chat_message_from_me.appendChild(span);
                span = document.createElement('span');
                span.setAttribute("class", "chat__message-body");
                span.appendChild(document.createTextNode(data[i].msg));
                chat_message_from_me.appendChild(span);
                o.appendChild(chat_message_from_me);
            }else {     // 문자를 내가 쓰지 않았을 때
                chat_message_to_me =document.createElement('div');
                chat_message_to_me.setAttribute("class", "chat__message chat__message-to-me");
                div =document.createElement('div');
                div.setAttribute("class", "chat__message-center");

                h3 = document.createElement('h3');
                h3.setAttribute("class", "chat__message-username");
                h3.appendChild(document.createTextNode(data[i].name));
                div.appendChild(h3);
                span = document.createElement('span');
                span.setAttribute("class", "chat__message-body");
                span.appendChild(document.createTextNode(data[i].msg));
                div.appendChild(span);
                chat_message_to_me.appendChild(div);
                span = document.createElement('span');
                span.setAttribute("class", "chat__message-time");
                span.appendChild(document.createTextNode(date));
                chat_message_to_me.appendChild(span);
                o.appendChild(chat_message_to_me);
            }
            /*
            dt = document.createElement('dt');
            dt.appendChild(document.createTextNode(data[i].name));
            o.appendChild(dt);

            dd = document.createElement('dd');
            dd.appendChild(document.createTextNode(data[i].msg));
            o.appendChild(dd);
            */
        }

        // 가장 아래로 스크롤
        o.scrollTop = o.scrollHeight;
    }

    // 채팅내용 작성하기
    // 1
    this.write = function(frm)
    {
        var xmlHttpWrite	= new XMLHttpRequest();
        var msg				= frm.msg.value;
        var param			= [];

        // 내용이 입력되지 않았다면 실행하지 않음
        if(msg.length == 0)
        {
            return false;
        }

        // POST Parameter 구축
        param.push("msg=" + encodeURIComponent(msg));

        // Ajax 통신
        xmlHttpWrite.open("POST", "write.php", true);
        xmlHttpWrite.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlHttpWrite.send(param.join('&'));

        // 내용 입력란 비우기
        frm.msg.value = '';

        // 채팅내용 갱신
        chatManager.proc();
    }

    // interval에서 지정한 시간 후에 실행
    setInterval(this.proc, interval);
}