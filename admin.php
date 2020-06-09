<?php
    session_start();
    if(!isset($_SESSION['admlogin']))
    {
        $url = "adminlogin.php";
        header('Location:'.$url);
    }
?>

<html>
    <head>
        <title>Admin | Home</title>
        <link rel="stylesheet" href="boot/css/bootstrap.min.css">
        <script src="jquery.min.js"></script>
        <script src="boot/js/bootstrap.min.js"></script>
        <style>
            .navgbar{
                width: 100%;
                height: 70px;
                background: teal;
                box-shadow: 0px 2px 5px black;
            }
            .footer{
                clear: both;
                position: relative;
                bottom: 0;
                width: 100%;
                height: 65px;
                background: teal;
                box-shadow: 0px 3px 7px black;
            }
            .footer_content{
                text-align: center;
                color: white;
                padding: 20px 20px 20px 20px;
            }
            pre{
                white-space: pre-wrap;
                white-space: -moz-pre-wrap;
                white-space: -pre-wrap;
                white-space: -o-pre-wrap;
                word-wrap: break-word;
            }
            .err{
                color: red;
                font-weight: bold;
            }
            #h,#m,#s{
                width: auto;
                display: inline;
            }
            #signout{
                position: relative;
                left: 0px;
                top: 10px;
                width: auto;
                padding: 15px 25px 15px 25px;
                border-radius: 5px;
                background: lightseagreen;                
            }
            #signout:hover{
                background: seagreen;
                cursor: pointer;
            }
            .stat{
                padding: 5px 50px 5px 50px;
                border-radius: 5px;
                color: white;
            }
            .a{
                background: lightseagreen; 
            }
            .b{
                background: #0baa48; 
            }
            .c{
                background: #ff3a3a; 
            }
            .d{
                background: #4242fd; 
            }
            .e{
                background: orange;
            }
            .c:hover{
                background: #3ed957;
                cursor: pointer;
            }
            .navgbar .container ul{
                list-style-type: none;
            }
            .navgbar .container li{
                position: relative;
                width: auto;
                height: auto;
                padding: 25px 25px 25px 25px;
                text-align: center;
                display: inline block;
                float: right;
                color: white;
                text-transform: uppercase;
                font-weight: bold;
            }
            .navgbar .container li:hover{
                background: #0c6969;
                cursor: pointer;
                box-shadow: 0px 3px 7px #0c6969;
            }
            .nav-tabs > li {
                float:none;
                display:inline-block;
                zoom:1;
            }
            .nav-tabs {
                text-align:center;
            }
/*
            #tab2{
                height: 100%;
                max-height: auto;
            }
*/
            th{
                text-align:center;
            }
            tr,td{
                text-align:center;
                text-transform: uppercase;
                font-variant: small-caps;
            }
        </style>
        <script>
            $(document).ready(function(){
                var terr=true,serr=true,nerr=true,reserr=true;
                $("#testid").change(function(){
                    var id = $("#testid").val();
                    $.ajax({
                        url:"checktid.php",
                        method:"post",
                        data:{id:id},
                        success:function(q){
                            if(!q)
                            {
                                $("#testiderr").html("<p class='err'>Test ID already exists.<br> please choose another id.<p>");
                                $("#haserrtestid").addClass("has-error");
                                terr = false;
                            }
                            else
                            {
                                $("#testiderr").html("");
                                $("#haserrtestid").removeClass("has-error");
                            }
                        }
                    });
                });
                $("#qpform").submit(function(e){
                    if(terr)
                    {
                        var tid = $("#testid").val();
                        var scode = $("#scode").val();
                        var h = $("#h").val();
                        var m = $("#m").val();
                        var s = $("#s").val();  
                        $.ajax({
                            url:"addqp.php",
                            method:"post",
                            data:{tid:tid,scode:scode,h:h,m:m,s:s},
                            success:function(q){
                                alert("Test added successfully");
                                $("#h").val("HH");
                                $("#m").val("MM");
                                $("#s").val("SS");
                                $("#testid").val("");
                                $("#scode").val("");
                            }
                        });
                    }
                    e.preventDefault();
                });
                $("#uqpform").submit(function(e){
                    var id = $("#utid").val();
                    $.ajax({
                        url:"checktid.php",
                        method:"post",
                        data:{id:id},
                        success:function(q){
                            if(q)
                            {
                                $("#utiderr").html("<p class='err'>Test ID doesn't exists<p>");
                                $("#haserrutid").addClass("has-error");
                            }
                            else
                            {
                                $("#utiderr").html("");
                                $("#haserrutid").removeClass("has-error");
                                $.ajax({
                                    url:"testses.php",
                                    method:"post",
                                    data:{id:id},
                                    success:function(w){
                                        window.location.href = "updateqp.php";
                                    }
                                });
                            }
                        }
                    });
                    e.preventDefault();
                });
                $("#delete").submit(function(e){
                    var id = $("#dtid").val();
                    $.ajax({
                        url:"checktid.php",
                        method:"post",
                        data:{id:id},
                        success:function(q){
                            if(q)
                            {
                                $("#dtiderr").html("<p class='err'>Test ID doesn't exists<p>");
                                $("#haserrdtid").addClass("has-error");
                            }
                            else
                            {
                                $("#dtiderr").html("");
                                $("#haserrdtid").removeClass("has-error");
                                $.ajax({
                                    url:"deletetest.php",
                                    method:"post",
                                    data:{id:id},
                                    success:function(){
                                        alert("Deleted Successfully");
                                        $("#dtid").val("");
                                    }
                                });
                            }
                        }
                    });
                    e.preventDefault(); 
                });
                $("#signout").click(function(){
                    $.ajax({
                        url:"admlogout.php",
                        method:"post",
                        success:function(){
                            window.location.href = "adminlogin.php";
                        }
                    });
                });
                $("#resform").submit(function(e){
                    var tid = $("#restid").val();
                    $.ajax({
                        url:"checktid.php",
                        method:"post",
                        data:{id:tid},
                        success:function(q){
                            if(q)
                            {
                                $("#restiderr").html("<p class='err'>Test ID doesn't exists<p>");
                                $("#haserrtidres").addClass("has-error");
                                $("#resultspane").html("");
                            }
                            else
                            {
                                $("#restiderr").html("");
                                $("#haserrtidres").removeClass("has-error");
                                $.ajax({
                                    url:"getresults.php",
                                    method:"post",
                                    data:{tid:tid},
                                    success:function(q){
                                        $("#resultspane").html(q);
                                    }
                                });
                            }
                        }
                    });
                    e.preventDefault();
                });
                
                $("#statusform").submit(function(e){
                    var tid = $("#stttid").val();
                    $.ajax({
                        url:"checktid.php",
                        method:"post",
                        data:{id:tid},
                        success:function(q){
                            if(q)
                            {
                                $("#stttiderr").html("<p class='err'>Test ID doesn't exists<p>");
                                $("#haserrtidstt").addClass("has-error");
                                $("#statuspane").html("");
                            }
                            else
                            {
                                $("#stttiderr").html("");
                                $("#haserrtidstt").removeClass("has-error");
                                $.ajax({
                                    url:"getstatus.php",
                                    method:"post",
                                    data:{tid:tid},
                                    success:function(q){
                                        $("#statuspane").html(q);
                                    }
                                });
                            }
                        }
                    });
                    e.preventDefault();
                });
                $(document).on({
                    mouseenter: function(){
                        var id = $(this).attr("id");
                        id = "#"+id;
                        $(id).html("UNLOCK"); 
                    },
                    mouseleave: function(){
                        var id = $(this).attr("id");
                        id = "#"+id;
                        $(id).html("LOCKED");
                    }
                },'[class^=lock]');
                $(document).on('click','[class^=lock]',function(){
                    var id = $(this).attr("id");
                    var idl = "#"+id;
                    $.ajax({
                        url:"setstatus.php",
                        method:"post",
                        data:{id:id},
                        success:function(){
                            $(idl).html("UNLOCKED");
                            $(idl).removeClass("c");
                            $(idl).addClass("d");
                            $(idl).removeClass("lock");
                        }
                    });
                });
            });
        </script>
    </head>
    <body>
        <div class="container-fluid">
            <div class="navgbar">
                <div class="container">
                    <ul>
                        <li id="signout">SIGN OUT</li>
                    </ul>
                </div>
            </div><br><br><br>
        </div>
        <div class="container-fluid tab-pane fade in active">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#tab1">UPDATE | DELETE | CREATE</a></li>
                <li><a data-toggle="tab" href="#tab2">RESULTS</a></li>
                <li><a data-toggle="tab" id="status" href="#tab3">CURRENT ENROLLS</a></li>
            </ul>
            <div class="tab-content">
                <br><br>
                <div id="tab1" class="tab-pane fade in active">
                    <center>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h1>Update Questions</h1>
                                </div>
                            </div><br>
                            <div class="form" id="">
                                <form class="form-horizontal" id="uqpform">
                                    <div class="form-group" id="haserrutid">
                                        <label class="col-sm-3 control-label">Test Id</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" id="utid" type="text" placeholder="Enter test id..." required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-primary btn-lg">Update</button>
                                        </div>
                                    </div>
                                </form><br> 
                            </div>
                            <div class="col-sm-12" id="utiderr"></div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h1>Delete Test</h1>
                                </div>
                            </div><br>
                            <div class="form" id="delete">
                                <form class="form-horizontal">
                                    <div class="form-group" id="haserrdtid">
                                        <label class="col-sm-3 control-label">Test Id</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" id="dtid" type="text" placeholder="Enter test id..." required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-danger btn-lg">Delete</button>
                                        </div>
                                    </div>
                                </form><br> 
                            </div>
                            <div class="col-sm-12" id="dtiderr"></div>
                        </div>
                    </div><br><br>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h1>Create Test Paper</h1>
                                    <p class="err">All fields are mandatory</p>
                                </div>
                            </div><br>
                            <div class="form">
                                <form class="form-horizontal" id="qpform">
                                    <div class="form-group" id="haserrtestid">
                                        <label class="col-sm-4 control-label">Test Id</label>
                                        <div class="col-sm-4">
                                            <input class="form-control" id="testid" type="text" placeholder="Enter test id..." required>
                                        </div>
                                        <div class="col-sm-4" id="testiderr"></div>
                                    </div>
                                    <div class="form-group" id="haserrscode">
                                        <label class="col-sm-4 control-label">Secret Code</label>
                                        <div class="col-sm-4">
                                            <input class="form-control" id="scode" type="password" placeholder="Enter Secret code..." required>
                                        </div>
                                        <div class="col-sm-4" id="scodeerr"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Max Time</label>
                                        <div class="col-sm-4">
                                            <select class="form-control" id="h" required>
                                                <option selected disabled>HH</option>
                                                <option value="0">00</option>
                                                <option value="1">01</option>
                                                <option value="2">02</option>
                                                <option value="3">03</option>
                                                <option value="4">04</option>
                                                <option value="5">05</option>
                                                <option value="6">06</option>
                                                <option value="7">07</option>
                                                <option value="8">08</option>
                                                <option value="9">09</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                            </select>
                                            <select class="form-control" id="m" required>
                                                <option selected disabled>MM</option>
                                                <option value="0">00</option>
                                                <option value="1">01</option>
                                                <option value="2">02</option>
                                                <option value="3">03</option>
                                                <option value="4">04</option>
                                                <option value="5">05</option>
                                                <option value="6">06</option>
                                                <option value="7">07</option>
                                                <option value="8">08</option>
                                                <option value="9">09</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>
                                                <option value="32">32</option>
                                                <option value="33">33</option>
                                                <option value="34">34</option>
                                                <option value="35">35</option>
                                                <option value="36">36</option>
                                                <option value="37">37</option>
                                                <option value="38">38</option>
                                                <option value="39">39</option>
                                                <option value="40">40</option>
                                                <option value="41">41</option>
                                                <option value="42">42</option>
                                                <option value="43">43</option>
                                                <option value="44">44</option>
                                                <option value="45">45</option>
                                                <option value="46">46</option>
                                                <option value="47">47</option>
                                                <option value="48">48</option>
                                                <option value="49">49</option>
                                                <option value="50">50</option>
                                                <option value="51">51</option>
                                                <option value="52">52</option>
                                                <option value="53">53</option>
                                                <option value="54">54</option>
                                                <option value="55">55</option>
                                                <option value="56">56</option>
                                                <option value="57">57</option>
                                                <option value="58">58</option>
                                                <option value="59">59</option>
                                            </select>
                                            <select class="form-control" id="s" required>
                                                <option selected disabled>SS</option>
                                                <option value="0">00</option>
                                                <option value="1">01</option>
                                                <option value="2">02</option>
                                                <option value="3">03</option>
                                                <option value="4">04</option>
                                                <option value="5">05</option>
                                                <option value="6">06</option>
                                                <option value="7">07</option>
                                                <option value="8">08</option>
                                                <option value="9">09</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                                <option value="31">31</option>
                                                <option value="32">32</option>
                                                <option value="33">33</option>
                                                <option value="34">34</option>
                                                <option value="35">35</option>
                                                <option value="36">36</option>
                                                <option value="37">37</option>
                                                <option value="38">38</option>
                                                <option value="39">39</option>
                                                <option value="40">40</option>
                                                <option value="41">41</option>
                                                <option value="42">42</option>
                                                <option value="43">43</option>
                                                <option value="44">44</option>
                                                <option value="45">45</option>
                                                <option value="46">46</option>
                                                <option value="47">47</option>
                                                <option value="48">48</option>
                                                <option value="49">49</option>
                                                <option value="50">50</option>
                                                <option value="51">51</option>
                                                <option value="52">52</option>
                                                <option value="53">53</option>
                                                <option value="54">54</option>
                                                <option value="55">55</option>
                                                <option value="56">56</option>
                                                <option value="57">57</option>
                                                <option value="58">58</option>
                                                <option value="59">59</option>
                                            </select>
                                        </div> 
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-success btn-lg">Create</button>
                                        </div>
                                    </div>
                                </form><br> 
                            </div>
                        </div>
                    </div>
                    </center>
                </div>
                <div id="tab2" class="tab-pane fade">
                    <center>
                    <div class="row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h1>Enter Test id to get results</h1>
                                </div>
                            </div><br>
                            <div class="form">
                                <form class="form-horizontal" id="resform">
                                    <div class="form-group" id="haserrtidres">
                                        <label class="col-sm-3 control-label">Test Id</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" id="restid" type="text" placeholder="Enter test id..." required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" id="restiderr"></div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-success btn-lg">GET RESULTS</button>
                                        </div>
                                    </div>
                                </form><br> 
                            </div>
                        </div>
                        <div class="col-sm-2"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-8 table-responsive" id="resultspane"></div>
                        <div class="col-sm-2"></div>
                    </div><br><br>
                    </center>
                </div>
                <div id="tab3" class="tab-pane fade">
                    <center>
                    <div class="row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h1>Enter Test id to get current enrolled students</h1>
                                </div>
                            </div><br>
                            <div class="form">
                                <form class="form-horizontal" id="statusform">
                                    <div class="form-group" id="haserrtidstt">
                                        <label class="col-sm-3 control-label">Test Id</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" id="stttid" type="text" placeholder="Enter test id..." required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" id="stttiderr"></div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-success btn-lg">GET STATUS</button>
                                        </div>
                                    </div>
                                </form><br> 
                            </div>
                        </div>
                        <div class="col-sm-2"></div>
                    </div>
                    <div class="container table-responsive" id="statuspane">
                        
                    </div></center><br><br>
                </div>
            </div>
            <div class="footer">
                <div class="footer_content">copyright @ Naveen Bandarupally</div>
            </div>
        </div>
    </body>
</html>