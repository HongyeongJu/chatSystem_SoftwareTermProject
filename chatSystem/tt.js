
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
            // JSON �������� Parsing
            res = JSON.parse(xmlHttp.responseText);
            finalDate = res.date;

            var myid = res.myid;
            // ä�ó��� �����ֱ�
            chatManager.show(res.data, myid, res.date);

            // �ߺ����� ���� �÷��� OFF
            idle = true;
        }
    }

    // ä�ó��� ��������
    //2
    this.proc = function()
    {
        // �ߺ����� ���� �÷��װ� ON�̸� �������� ����
        if(!idle)
        {
            return false;
        }

        // �ߺ����� ���� �÷��� ON
        idle = false;

        // Ajax ���
        xmlHttp.open("GET", "proc.php?date=" + encodeURIComponent(finalDate), true);
        xmlHttp.send();
    }

    // ä�ó��� �����ֱ�
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
        myid : ���� ���� ���̵�
        data[i].name  : �ۼ���
        ���ڸ� ���� ���� ��
    div chat__message chat_message-from-me
	    span chat__message-time
	    span chat__message-body
    ���ڰ� ������ ���� ��
    div chat__message chat__message-to-me
	    div chat__message-center
		    h3 chat__message-username
		    span chat__message-body
	    span chat__message-time
        */
        // ä�ó��� �߰�
        for(var i=0; i<data.length; i++)
        {
            //���ڸ� ���� ���� ��
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
            }else {     // ���ڸ� ���� ���� �ʾ��� ��
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

        // ���� �Ʒ��� ��ũ��
        o.scrollTop = o.scrollHeight;
    }

    // ä�ó��� �ۼ��ϱ�
    // 1
    this.write = function(frm)
    {
        var xmlHttpWrite	= new XMLHttpRequest();
        var msg				= frm.msg.value;
        var param			= [];

        // ������ �Էµ��� �ʾҴٸ� �������� ����
        if(msg.length == 0)
        {
            return false;
        }

        // POST Parameter ����
        param.push("msg=" + encodeURIComponent(msg));

        // Ajax ���
        xmlHttpWrite.open("POST", "write.php", true);
        xmlHttpWrite.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlHttpWrite.send(param.join('&'));

        // ���� �Է¶� ����
        frm.msg.value = '';

        // ä�ó��� ����
        chatManager.proc();
    }

    // interval���� ������ �ð� �Ŀ� ����
    setInterval(this.proc, interval);
}