<?php
    session_start();
    include 'connectdb.php';
    if(!isset($_SESSION["login"]))
    {
        $url = "index.php";
        header('Location:'.$url);
    }
    else
    {
        if(isset($_SESSION['test']))
        {
            $r = $_SESSION['name'];
            $GLOBALS['user'] = $r;
        }
        else
        {
            session_destroy();
            header('Location:index.php');
        }
    }
?>

<html>
    <head>
        <title>Exam | Home</title>
        <link rel="stylesheet" href="boot/css/bootstrap.min.css">
        <script src="jquery.min.js"></script>
        <script src="boot/js/bootstrap.min.js"></script>
        <style>
            .navgbar{
                width: 100%;
                min-height: 70px;
                height: auto;
                background: black;
                box-shadow: 0px 2px 5px black;
                position: sticky;
                top: 0;
                z-index: 999;
            }
            .footer{
                clear: both;
                bottom: 0;
                width: 100%;
                height: 65px;
                background: black;
                box-shadow: 0px 3px 7px black;
            }
            pre{
                white-space: pre-wrap;
                white-space: -moz-pre-wrap;
                white-space: -pre-wrap;
                white-space: -o-pre-wrap;
                word-wrap: break-word;
            }
            .footer_content{
                text-align: center;
                padding: 20px 20px 20px 20px;
            }
            ul{
                list-style-type: none;
            }
            li{
                position: relative;
                padding: 25px 5px 25px 5px;
                text-align: center;
                display: inline;
                float: left;
                color: white;
                text-transform: uppercase;
                font-weight: bold;
            }
            #submit{
                position: relative;
                left: 0px;
                top: 15px;
                width: 110px;
                padding: 15px 25px 15px 25px;
                border-radius: 5px;
                background: lightseagreen;                
            }
            #submit:hover{
                background: seagreen;
                cursor: pointer;
            }
            .row1{
                position:relative;
                top:10px;
                width: 100%;
                height: auto;
            }
            .col1{
                position: relative;
                width: 25%;
                height: auto;
                float: left;
            }
            .col2{
                position: relative;
                width: 75%;
                height: auto;
                float: left;
            }
            .circleout{
                width: 85px;
                height: 70px;
            }
            .circlein{
                position: absolute;
                top: 10px;
                width: 50px;
                height: 50px;
                border-radius: 8px;
                background: lightseagreen;
                box-shadow: 0px 3px 7px #393939;
            }
            .circlein:hover{
                cursor: pointer;
                box-shadow: 0px 5px 10px #393939;
            }
            .types{
                position: relative;
            }
            .circletype{
                width: auto;
                height: 60px;
                position: relative;
            }
            .typeout{
                position: absolute;
                top: 10px;
                min-width: 80%;
                max-width: auto;
                height: 50px;
                border-radius: 8px;
                box-shadow: 0px 3px 7px #393939;
            }
            .number{
                position: relative;
                top: 15px;
                color: aliceblue;
                text-transform: uppercase;
                font-weight: bold;
            }
            .headbar{
                position: relative;
                width: 100%;
                height: 50px;
                background: #393939;
                color: white;
                font-weight: bold;
                box-shadow: 0px 0px 7px #393939;
            }
            .question{
                width: 100%;
                height: auto;
                color: black;
                position: relative;
                padding: 20px 20px 20px 20px;
                word-wrap: break-word;
                font-weight: bold;
                box-shadow: 0px 3px 7px #393939;
            }
            .cqno{
                padding: 15px 5px 10px 5px;
                position: relative;
                width: auto;
                height: 50px;
                float: left;
                font-weight: bold;
                color: white;
                text-transform: uppercase;
            }
            .mark{
                padding: 15px 10px 10px 10px;
                position: relative;
                width: 100px;
                height: 50px;
                float: right;
                text-align: center;
                font-weight: bold;
                color: white;
                background: orange;
                text-transform: uppercase;
            }
            .mark:hover{
                box-shadow: 0px 5px 10px #393939;
                cursor: pointer;
            }
            .qnocircle{
                width: 50px;
                height: 50px;
                float: left;
                border-radius: 50%;
                background: orange;
                text-align: center;
            }
            #qno{
                position: relative;
                top: 15px;
            }
            .answers{
                width: 100%;
                height: auto;
                color: black;
                position: relative;
                top: 30px;
            }
            .option{
                height: auto;
/*                width: 50%;*/
            }
            .opt{
                position: relative;
                width: 90%;
                height: auto;
                background: white;
                padding: 20px 20px 20px 20px;
                word-wrap: break-word;
                box-shadow: 0px 3px 6px #393939;
            }
            .opt:hover{
                cursor: pointer;
                box-shadow: 0px 5px 10px #393939;
            }
            .a{
                background: green;
            }
            .b{
                background: lightseagreen;
            }
            .c{
                background: orange;
            }
            .d{
                background: #9d00ff;
            }
            .e{
                background: blue;
            }
            .current{
                border-radius: 50%;
                background: blue;
            }
            .optcard{
                position: relative;
                color: black;
                font-weight: bold;
                word-wrap: break-word;
            }
            .navigation{
                position: relative;
                width: 100%;
                height: 50px;
                text-align: center;
            }
            .prev{
                position: relative;
                width: 100px;
                height: 50px;
                background: green;
                float: left;
                box-shadow: 0px 3px 7px #393939;
                border-radius: 5px;
            }
            .next{
                position: relative;
                width: 100px;
                height: 50px;
                background: green;
                float: right;
                box-shadow: 0px 3px 7px #393939;
                border-radius: 5px;
            }
            .next:hover, .prev:hover{
                cursor: pointer;
                box-shadow: 0px 5px 10px #393939;
            }
            .bt{
                position: relative;
                top: 15px;
                text-transform: uppercase;
                font-weight: bold;
                color: aliceblue;
            }
        </style>
        <script>
            $(document).ready(function(){
                var h=0,m=0,s=0;
                var tid = "<?php echo $_SESSION['tid']; ?>";
                var regid = <?php echo $_SESSION['regid']; ?>;
                var noq = <?php echo $_SESSION['noq']; ?>;
                $.ajax({
                    url:"gettime.php",
                    method:"post",
                    data:{regid:regid,type:1},
                    success:function(q){
                        h = q;
                    }
                });
                $.ajax({
                    url:"gettime.php",
                    method:"post",
                    data:{regid:regid,type:2},
                    success:function(q){
                        m = q;
                    }
                });
                $.ajax({
                    url:"gettime.php",
                    method:"post",
                    data:{regid:regid,type:3},
                    success:function(q){
                        s = q;
                    }
                });
                var x = setInterval(function() {
                    if(h==0 && m==0 && s==0)
                    {
                        $.ajax({
                            url:"end.php",
                            method:"post",
                            data:{type:4},
                            success:function(){
                                window.location.href = "endtest.php";
                            }
                        });
                        clearInterval(x);
                    }
                    else 
                    {
                        if(s==0)
                        {
                            s = 59;
                            if(m==0)
                            {
                                m = 59;
                                h--;
                            }
                            else
                                m--;
                        }
                        else
                            s--;
                    }
                    if(h<10)
                        $("#hour").html("0"+h);
                    else
                        $("#hour").html(h);
                    if(m<10)
                        $("#minute").html("0"+m);
                    else
                        $("#minute").html(m);
                    if(s<10)
                        $("#second").html("0"+s);
                    else
                        $("#second").html(s);
                    $.ajax({
                        url:"updateTime.php",
                        method:"post",
                        data:{regid:regid,h:h,m:m,s:s},
                        success:function(){
                            
                        }
                    });
                }, 1000);
                window.addEventListener("blur",function(event){
                    $.ajax({
                        url:"end.php",
                        method:"post",
                        data:{type:5},
                        success:function(){
                            window.location.href = "endtest.php";
                        }
                    });
                });
                $(document).on('keydown keyup keypress',function(event, characterCode){
                    $.ajax({
                        url:"end.php",
                        method:"post",
                        data:{type:6},
                        success:function(){
                            window.location.href = "endtest.php";
                        }
                    });
                });
                $("#submit").click(function(){
                    clearInterval(x);
                    $.ajax({
                        url:"end.php",
                        method:"post",
                        data:{type:3},
                        success:function(){
                            window.location.href = "endtest.php";
                        }
                    });
                });
                $.ajax({
                    url:"getquescount.php",
                    method:"post",
                    data:{regid:regid,tid:tid},
                    success:function(q){
                        $("#qdesk").html(q);
                        $("#q1").addClass("current");
                    }
                });
                $.ajax({
                    url:"getquestion.php",
                    method:"post",
                    data:{regid:regid,tid:tid,qno:1},
                    success:function(q){
                        $("#box").html(q);
                        $("#prev").hide();
                    }
                });
                $("#next").click(function(){
                    var qno = Number($("#qno").html());
                    var id = "#q"+qno;
                    $(id).removeClass("current");
                    qno = qno+1;
                    id = "#q"+qno;
                    $.ajax({
                        url:"getquestion.php",
                        method:"post",
                        data:{regid:regid,tid:tid,qno:qno},
                        success:function(q){
                            $("#box").html(q);
                            $("#qno").html(qno);
                            if(qno==noq)
                                $("#next").hide();
                            else
                                $("#next").show();
                            $("#prev").show();
                            $(id).addClass("current");
                            $.ajax({
                                url:"setview.php",
                                method:"post",
                                data:{regid:regid,cid:qno-1},
                                success:function(q){
//                                    alert(q);
                                    $(id).addClass("current");
                                    $.ajax({
                                        url:"getquescount.php",
                                        method:"post",
                                        data:{regid:regid,tid:tid},
                                        success:function(q){
                                            $("#qdesk").html(q);
                                            $(id).addClass("current");
                                        }
                                    });
                                }
                           });
                        }
                    });
                });
                $("#prev").click(function(){
                    var qno = Number($("#qno").html());
                    var id = "#q"+qno;
                    $(id).removeClass("current");
                    qno = qno-1;
                    id = "#q"+qno;
                    $.ajax({
                        url:"getquestion.php",
                        method:"post",
                        data:{regid:regid,tid:tid,qno:qno},
                        success:function(q){
                            $("#box").html(q);
                            $("#qno").html(qno);
                            if(qno==1)
                                $("#prev").hide();
                            else
                                $("#prev").show();
                            $("#next").show();
                            $(id).addClass("current");
                            $.ajax({
                                url:"setview.php",
                                method:"post",
                                data:{regid:regid,cid:qno+1},
                                success:function(q){
//                                    alert(q);
                                    $(id).addClass("current");
                                    $.ajax({
                                        url:"getquescount.php",
                                        method:"post",
                                        data:{regid:regid,tid:tid},
                                        success:function(q){
                                            $("#qdesk").html(q);
                                            $(id).addClass("current");
                                        }
                                    });
                                }
                           });
                        }
                    });
                });
                $(document).on('click','[class^=opt]',function(){
                    var id = $(this).attr("id");
                    var opt = id;
                    id = "#"+id;
                    $("#a").css("background","white");
                    $("#b").css("background","white");
                    $("#c").css("background","white");
                    $("#d").css("background","white");
                    $(id).css("background","green");
                    var qno = Number($("#qno").html());
                    $.ajax({
                        url:"markanswer.php",
                        method:"post",
                        data:{regid:regid,qno:qno,opt:opt},
                        success:function(q){
                            
                        }
                    });
                });
                $(document).on('click','[class^=circlein]',function(){
                    var id = $(this).attr("id");
                    var l = id.length;
                    var qno = Number(id.slice(1,l));
                    var cid = Number($("#qno").html());
                    var curid = cid;
                    cid = "#q"+cid;
                    $(cid).removeClass("current");
                    $.ajax({
                        url:"getquestion.php",
                        method:"post",
                        data:{regid:regid,tid:tid,qno:qno},
                        success:function(q){
                            $("#box").html(q);
                            $("#qno").html(qno);
                            id = "#"+id;
                            if(qno==noq)
                            {
                                $("#next").hide();
                                $("#prev").show();
                            }
                            else if(qno==1)
                            {
                                $("#prev").hide();
                                $("#next").show();
                            }
                            else
                            {
                                $("#next").show();
                                $("#prev").show();
                            }
                            $.ajax({
                                url:"setview.php",
                                method:"post",
                                data:{regid:regid,cid:curid},
                                success:function(q){
//                                    alert(q);
                                    $(id).addClass("current");
                                    $.ajax({
                                        url:"getquescount.php",
                                        method:"post",
                                        data:{regid:regid,tid:tid},
                                        success:function(q){
                                            $("#qdesk").html(q);
                                            $(id).addClass("current");
                                        }
                                    });
                                }
                           });
                        }
                    });
                });
                $(document).on('click','[id^=mark]',function(){
                    var qno = Number($("#qno").html());
                    $.ajax({
                        url:"setmark.php",
                        method:"post",
                        data:{regid:regid,qno:qno},
                        success:function(q){
                            if(!q)
                            {
                                $("#mark").removeClass("c");
                                $("#mark").addClass("d");
                                $("#mark").html("unmark");
                            }
                            else
                            {
                                $("#mark").removeClass("d");
                                $("#mark").addClass("c");
                                $("#mark").html("mark");
                            }
                        }
                    });
                });
            });
        </script>
    </head>
    <body>
        <div class="container-fluid" >
            <div class="navgbar">
                <div class="container">
                    <ul>
                        <div class="row">
                            <div class="col-sm-6">
                                <li style="color:blue;"><?php echo $user ?></li>
                            </div>
                            <div class="col-sm-2">
                                <li style="width:auto;">TIME LEFT &nbsp;&nbsp;&nbsp;</li>
                            </div>
                            <div class="col-sm-2">
                                <li id="hour">00</li>
                                <li>:</li>
                                <li id="minute">00</li>
                                <li>:</li>
                                <li id="second">00</li>
                            </div>
                            <div class="col-sm-2">
                                <li id="submit">SUBMIT</li>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
            <div class="row1">
                <div class="col1">
                    <center>
                        <div class="row" id="qdesk"></div><br><hr><br>
                        <div class="types">
                            <div class="circletype"><div class="typeout a"><span class="number">ATTEMPTED</span></div></div>
                            <div class="circletype"><div class="typeout b"><span class="number">NOT ATTEMPTED</span></div></div>
                            <div class="circletype"><div class="typeout c"><span class="number">VIEWED</span></div></div>
                            <div class="circletype"><div class="typeout d"><span class="number">VIEW LATER</span></div></div>
                            <div class="circletype"><div class="typeout e"><span class="number">CURRENT</span></div></div><br><br>
                        </div>
                    </center>
                </div>
                <div class="col2">
                    <div id="box"></div><br>
                    <div class="navigation">
                        <div class="prev" id="prev"><span class="bt">previous</span></div>
                        <div class="next" id="next"><span class="bt">next</span></div>
                    </div><br><br>
                </div>
            </div>
            <div class="footer">
                    <div class="footer_content">copyright @ Naveen Bandarupally</div>
            </div>
        </div>
    </body>
</html>