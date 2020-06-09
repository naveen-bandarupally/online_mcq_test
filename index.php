<?php
    session_start();
    if(isset($_SESSION["login"]))
    {
        $url = "test.php";
        header('Location:'.$url);
    }
?>

<html>
    <head>
        <title>Exam | Login</title>
        <link rel="stylesheet" href="boot/css/bootstrap.min.css">
        <script src="jquery.min.js"></script>
        <script src="boot/js/bootstrap.min.js"></script>
        <style>
            .navgbar{
                width: 100%;
                height: 70px;
                background: #9d00ff;
                box-shadow: 0px 2px 5px black;
            }
            .footer{
                clear: both;
                bottom: 0;
                width: 100%;
                height: 65px;
                background: #9d00ff;
                box-shadow: 0px 3px 7px black;
            }
            .footer_content{
                text-align: center;
                color: white;
                padding: 20px 20px 20px 20px;
            }
            .err{
                color: red;
                font-weight: bold;
            }
        </style>
        <script>
            $(document).ready(function(){
                var rerr=true,nerr=true,merr=true,perr=true,lrerr=true,lmerr=true,lperr=true,lterr=true,ltype=1;
                $("#formsubmit").submit(function(e){
                    if(nerr && perr && merr)
                    {
                        var rollno = $("#rollno").val();
                        var name = $("#name").val();
                        var phn = $("#phnno").val();
                        var mail = $("#mailid").val();
                        var gender = $("#gender").val();
                        var dept = $("#dept").val();
                        var year = $("#year").val();
                        $.ajax({
                            url:"register.php",
                            method:"post",
                            data:{rollno:rollno,name:name,phn:phn,mail:mail,gender:gender,dept:dept,year:year},
                            success:function(e){
                                alert("Registered Successfully");
                                $("#rollno").val("");
                                $("#name").val("");
                                $("#phnno").val("");
                                $("#mailid").val("");
                                $(".gen").prop('checked', false);
                                $("#dept").val("Choose Department");
                                $("#year").val("Choose Year");
                            }
                        });
                    }
                    e.preventDefault();
                });
                $("#rollno").change(function(){
                    rerr=true;
                    var rollno = $("#rollno").val();
                    $.ajax({
                        url:"check.php",
                        method:"post",
                        data:{type:1,rollno:rollno},
                        success:function(e){
                            if(!e)
                            {
                                $("#rollerr").html("<p class='err'>User already registered with this roll number<p>");
                                $("#haserrroll").addClass("has-error");
                                rerr=false;
                            }
                            else
                            {
                                $("#rollerr").html("");
                                $("#haserrroll").removeClass("has-error");
                            }
                        }
                    });
                });
                $("#name").change(function(){
                    nerr=true;
                    var name = $("#name").val();
                    if(!validatename(name))
                    {
                        $("#nameerr").html("<p class='err'>Enter a valid name<p>");
                        $("#haserrname").addClass("has-error");
                        nerr=false;
                    }
                    else
                    {
                        $("#nameerr").html("");
                        $("#haserrname").removeClass("has-error");
                    }
                });
                $("#mailid").change(function(){
                    merr=true;
                    var mail = $("#mailid").val();
                    if(!validatemail(mail))
                    {
                        merr=false;
                        $("#mailerr").html("<p class='err'>Enter a valid email id<p>");
                        $("#haserrmail").addClass("has-error");
                    }
                    else
                    {
                        $.ajax({
                            url:"check.php",
                            method:"post",
                            data:{type:2,mailid:mail},
                            success:function(e){
                                if(!e)
                                {
                                    $("#mailerr").html("<p class='err'>User already registered with this mail id<p>");
                                    $("#haserrmail").addClass("has-error");
                                    merr=false;
                                }
                                else
                                {
                                    $("#mailerr").html("");
                                    $("#haserrmail").removeClass("has-error");
                                }
                            }
                        });
                    }
                });
                $("#phnno").change(function(){
                    perr = true;
                    var phn = $("#phnno").val();
                    if(!validatephn(phn))
                    {
                        perr = false;
                        $("#phnerr").html("<p class='err'>Enter a valid phone number<p>");
                        $("#haserrphn").addClass("has-error");
                    }
                    else
                    {
                        $.ajax({
                            url:"check.php",
                            method:"post",
                            data:{type:3,phone:phn},
                            success:function(e){
                                if(!e)
                                {
                                    $("#phnerr").html("<p class='err'>User already registered with this phone number<p>");
                                    $("#haserrphn").addClass("has-error");
                                    perr=false;
                                }
                                else
                                {
                                    $("#phnerr").html("");
                                    $("#haserrphn").removeClass("has-error");
                                }
                            }
                        });
                    }
                });
                $("#lrollno").focusin(function(){
                    ltype=1;
                    $("#lrollno").prop("disabled", false);
                    $("#lmailid").prop("disabled", true);
                    $("#lphnno").prop("disabled", true);
                });
                $("#lmailid").click(function(){
                    ltype=2;
                    $("#lmalid").prop("disabled", false);
                    $("#lrollno").prop("disabled", true);
                    $("#lphnno").prop("disabled", true);
                });
                $("#lphnno").click(function(){
                    ltype=3;
                    $("#lphnno").prop("disabled", false);
                    $("#lmailid").prop("disabled", true);
                    $("#lrollno").prop("disabled", true);
                });
                $("#reset").click(function(){
                    ltype=1;
                    $("#lrollno").prop("disabled", false);
                    $("#lmailid").prop("disabled", false);
                    $("#lphnno").prop("disabled", false);
                    $("#testno").val("");
                    $("#scode").val("");
                    $("#lrollerr").html("");
                    $("#lhaserrroll").removeClass("has-error");
                    $("#lmailerr").html("");
                    $("#lhaserrmail").removeClass("has-error");
                    $("#lphnerr").html("");
                    $("#lhaserrphn").removeClass("has-error");
                    $("#testnoerr").html("");
                    $("#hastestnoerr").removeClass("has-error");
                    $("#attempterr").html("");
                });
                $("#lrollno").change(function(){
                    lrerr = true;
                    var rno = $("#lrollno").val();
                    $.ajax({
                        url:"login.php",
                        method:"post",
                        data:{type:1,rno:rno},
                        success:function(e){
                            if(!e)
                            {
                                $("#lrollerr").html("<p class='err'>Roll number doesn't exist<p>");
                                $("#lhaserrroll").addClass("has-error");
                                lrerr = false;
                            }
                            else
                            {
                                $("#lrollerr").html("");
                                $("#lhaserrroll").removeClass("has-error");
                            }
                        }
                    });
                });
                $("#lmailid").change(function(){
                    lmerr = true;
                    var mid = $("#lmailid").val();
                    $.ajax({
                        url:"login.php",
                        method:"post",
                        data:{type:2,mid:mid},
                        success:function(e){
                            if(!e)
                            {
                                $("#lmailerr").html("<p class='err'>Mail id doesn't exist<p>");
                                $("#lhaserrmail").addClass("has-error");
                                lmerr = false;
                            }
                            else
                            {
                                $("#lmailerr").html("");
                                $("#lhaserrmail").removeClass("has-error");
                            }
                        }
                    });
                });
                $("#lphnno").change(function(){
                    lperr = true;
                    var pno = $("#lphnno").val();
                    $.ajax({
                        url:"login.php",
                        method:"post",
                        data:{type:3,pno:pno},
                        success:function(e){
                            if(!e)
                            {
                                $("#lphnerr").html("<p class='err'>Phone number doesn't exist<p>");
                                $("#lhaserrphn").addClass("has-error");
                                lperr = false;
                            }
                            else
                            {
                                $("#lphnerr").html("");
                                $("#lhaserrphn").removeClass("has-error");
                            }
                        }
                    });
                });
                $("#testno").change(function(){
                    lterr = true;
                    var tno = $("#testno").val();
                    $.ajax({
                        url:"login.php",
                        method:"post",
                        data:{type:4,tno:tno},
                        success:function(e){
                            if(!e)
                            {
                                $("#testnoerr").html("<p class='err'>Test number doesn't exist<p>");
                                $("#hastestnoerr").addClass("has-error");
                                lterr = false;
                            }
                            else
                            {
                                $("#testnoerr").html("");
                                $("#hastestnoerr").removeClass("has-error");
                            }
                        }
                    });
                });
                $("#lformsubmit").submit(function(e){
                    e.preventDefault();
                    var scode = $("#scode").val();
                    var tno = $("#testno").val();
                    var a="";
                    if(lrerr && lperr && lmerr && lterr)
                    {
                        $.ajax({
                            url:"logincheck.php",
                            method:"post",
                            data:{tno:tno,scode:scode},
                            success:function(q){
                                if(q)
                                {
                                    $("#scodeerr").html("");
                                    $("#hascodeerr").removeClass("has-error");
                                    if(ltype==1)
                                    {
                                        var rno = $("#lrollno").val();
                                        $.ajax({
                                            url:"loginses.php",
                                            method:"post",
                                            data:{type:1,rno:rno,tno:tno},
                                            success:function(w){
                                                if(w)
                                                {
                                                    $("#attempterr").html("");
                                                    window.location.href = "test.php";
                                                }
                                                else
                                                {
                                                    $("#attempterr").html("<p class='err'>You have attempted the test.<br>Only one attempt per person.<p>");
                                                }
                                            }
                                        });
                                    }
                                    else if(ltype==2)
                                    {
                                        var mid = $("#lmailid").val();
                                        $.ajax({
                                            url:"loginses.php",
                                            method:"post",
                                            data:{type:2,mid:mid,tno:tno},
                                            success:function(w){
                                                if(w)
                                                {
                                                    $("#attempterr").html("");
                                                    window.location.href = "test.php";
                                                }
                                                else
                                                {
                                                    $("#attempterr").html("<p class='err'>You have attempted the test.<br>Only one attempt per person.<p>");
                                                }
                                            }
                                        });
                                    }
                                    else
                                    {
                                        var pno = $("#lphnno").val();
                                        $.ajax({
                                            url:"loginses.php",
                                            method:"post",
                                            data:{type:3,pno:pno,tno:tno},
                                            success:function(w){
                                                if(w)
                                                {
                                                    $("#attempterr").html("");
                                                    window.location.href = "test.php";
                                                }
                                                else
                                                {
                                                    $("#attempterr").html("<p class='err'>You have attempted the test.<br>Only one attempt per person.<p>");
                                                }
                                            }
                                        });
                                    }
                                }
                                else
                                {
                                    $("#scodeerr").html("<p class='err'>Wrong password<p>");
                                    $("#hascodeerr").addClass("has-error");
                                }
                            }
                        });
                    }
                });
            });
            function validatename(name)
            {
                var check = /^[a-zA-Z]+[a-zA-Z \s]+$/;
                if(name.match(check) && name.length >= 5)
                    return true;
                return false;
            }
            function validatemail(mail)
            {
                var check = /^[a-zA-Z0-9](\.?[a-zA-Z0-9]_?){5,}@(gmail.com|yahoo.com|outlook.com|live.com)$/;
                if(mail.match(check))
                    return true;
                else
                    return false;
            }
            function validatephn(phn)
            {
                var check = /^[6-9][0-9]{9}$/;
                if(phn.match(check))
                    return true;
                else
                    return false;
            }
        </script>
    </head>
    <body>
        <div class="container-fluid">
            <div class="navgbar">
                <div class="container">
                    
                </div>
            </div><br>
            <center>
            <did class="row">
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-10">
                            <h1>Register</h1>
                            <p class="err">All fields are mandatory</p>
                        </div>
                    </div><br>
                    <div class="form" id="formsubmit">
                        <form class="form-horizontal">
                            <div class="form-group" id="haserrroll">
                                <label class="col-sm-3 control-label">Roll Number</label>
                                <div class="col-sm-4">
                                    <input class="form-control" id="rollno" type="text" placeholder="Enter roll number..." required>
                                </div>
                                <div class="col-sm-5" id="rollerr"></div>
                            </div>
                            <div class="form-group" id="haserrname">
                                <label class="col-sm-3 control-label">Name</label>
                                <div class="col-sm-4">
                                    <input class="form-control" id="name" type="text" placeholder="Enter Name..." required>
                                </div>
                                <div class="col-sm-5" id="nameerr"></div>
                            </div>
                            <div class="form-group" id="haserrmail">
                                <label class="col-sm-3 control-label">Mail ID</label>
                                <div class="col-sm-4">
                                    <input class="form-control" id="mailid" type="text" placeholder="Enter Mail id..." required>
                                </div>
                                <div class="col-sm-5" id="mailerr"></div>
                            </div>
                            <div class="form-group" id="haserrphn">
                                <label class="col-sm-3 control-label">Phone Number</label>
                                <div class="col-sm-4">
                                    <input class="form-control" id="phnno" type="text" placeholder="Enter Phone number..." required>
                                </div>
                                <div class="col-sm-5" id="phnerr"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Gender</label>
                                <div class="col-sm-2">
                                    <label class="radio-inline"><input type="radio" id="gender" name="gender" class="gen" value="male" required>Male</label>
                                </div>
                                <div class="col-sm-2">
                                    <label class="radio-inline"><input type="radio" id="gender" name="gender" class="gen" value="female" required>Female</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Department</label>
                                <div class="col-sm-4">
                                    <select class="form-control" id="dept" required>
                                        <option selected disabled>Choose Department</option>
                                        <option value="CSE">CSE</option>
                                        <option value="ECE">ECE</option>
                                        <option value="EEE">EEE</option>
                                        <option value="IT">IT</option>
                                    </select>
                                </div> 
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Year</label>
                                <div class="col-sm-4">
                                    <select class="form-control" id="year" required>
                                        <option selected disabled>Choose Year</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                    </select>
                                </div> 
                            </div>
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-success btn-lg">submit</button>
                                </div>
                            </div>
                        </form><br> 
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-10">
                            <h1>Sign in</h1>
                        </div>
                    </div><br>
                    <div class="form" id="lformsubmit">
                        <form class="form-horizontal">
                            <div class="form-group" id="lhaserrroll">
                                <label class="col-sm-3 control-label">Roll Number</label>
                                <div class="col-sm-4">
                                    <input class="form-control" id="lrollno" type="text" placeholder="Enter roll number..." required>
                                </div>
                                <div class="col-sm-5" id="lrollerr"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-10">
                                    <p class="err">or</p>
                                </div>
                            </div>
                            <div class="form-group" id="lhaserrmail">
                                <label class="col-sm-3 control-label">Mail ID</label>
                                <div class="col-sm-4">
                                    <input class="form-control" id="lmailid" type="text" placeholder="Enter Mail id..." required>
                                </div>
                                <div class="col-sm-5" id="lmailerr"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-10">
                                    <p class="err">or</p>
                                </div>
                            </div>
                            <div class="form-group" id="lhaserrphn">
                                <label class="col-sm-3 control-label">Phone Number</label>
                                <div class="col-sm-4">
                                    <input class="form-control" id="lphnno" type="text" placeholder="Enter Phone number..." required>
                                </div>
                                <div class="col-sm-5" id="lphnerr"></div>
                            </div><br>
                            <div class="form-group" id="hastestnoerr">
                                <label class="col-sm-3 control-label">Test Number</label>
                                <div class="col-sm-4">
                                    <input class="form-control" id="testno" type="text" placeholder="Enter Test number..." required>
                                </div>
                                <div class="col-sm-5" id="testnoerr"></div>
                            </div>
                            <div class="form-group" id="hascodeerr">
                                <label class="col-sm-3 control-label">Secret code</label>
                                <div class="col-sm-4">
                                    <input class="form-control" id="scode" type="password" placeholder="Enter Secret code..." required>
                                </div>
                                <div class="col-sm-5" id="scodeerr"></div>
                            </div>
                            <div id="attempterr"></div>
                            <div class="form-group">
                                <div class="col-sm-4">
                                    <button id="reset" type="reset" class="btn btn-success btn-lg">Reset</button>
                                </div>
                                <div class="col-sm-4">
                                    <button type="lsubmit" class="btn btn-success btn-lg">Enter test</button>
                                </div>
                            </div>
                        </form><br>
                    </div>
                </div>
            </did>
        </center>
        <div class="footer">
            <div class="footer_content">copyright @ Naveen Bandarupally</div>
        </div>
        </div>
    </body>
</html>