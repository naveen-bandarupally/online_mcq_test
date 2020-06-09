<?php
    session_start();
    if(isset($_SESSION['admlogin']))
    {
        $url = "admin.php";
        header('Location:'.$url);
    }
?>

<html>
    <head>
        <title>Admin | Login</title>
        <link rel="stylesheet" href="boot/css/bootstrap.min.css">
        <script src="jquery.min.js"></script>
        <script src="boot/js/bootstrap.min.js"></script>
        <style>
            .navgbar{
                width: 100%;
                height: 65px;
                background: black;
                box-shadow: 0px 2px 5px black;
            }
            .footer{
                width: 100%;
                height: 65px;
                background: black;
                box-shadow: 0px 2px 5px black;
            }
            .footer_content{
                text-align: center;
                padding: 20px 20px 20px 20px;
                color: white;
            }
            .navgbar_content{
                font-weight: bold;
            }
            .err{
                color: red;
                font-weight: bold;
                text-align: center;
            }
        </style>
        <script>
            $(document).ready(function(){
                var uerr=true;
                $("#uid").change(function(){
                    var uid = $("#uid").val();
                    $.ajax({
                        url:"chkadmlogin.php",
                        method:"post",
                        data:{type:1,uid:uid},
                        success:function(q){
                            if(q)
                            {
                                $("#hasuiderr").removeClass("has-error");
                                $("#uiderr").html("");
                                uerr = true;
                            }
                            else
                            {
                                uerr = false;
                                $("#hasuiderr").addClass("has-error");
                                $("#uiderr").html("<p>Invalid user id</p><br>");
                            }
                        }
                    });
                });
                $("#lform").submit(function(e){
                    var uid = $("#uid").val();
                    var pwd = $("#pwd").val();
                    if(uerr)
                    {
                        $.ajax({
                            url:"chkadmlogin.php",
                            method:"post",
                            data:{type:2,uid:uid,pwd:pwd},
                            success:function(q){
                                if(q)
                                {
                                    $("#haspwderr").removeClass("has-error");
                                    $("#pwderr").html("");
                                    window.location.href="admin.php";
                                }
                                else
                                {
                                    $("#haspwderr").addClass("has-error");
                                    $("#pwderr").html("<p>Invalid password</p><br>");
                                }
                            }
                        });
                    }
                    e.preventDefault();
                });
            });
        </script>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    <div class="navgbar">
                        <div class="footer_content navgbar_content">Admin Login</div>
                    </div><br><br>
                    <form class="form-horizontal" id="lform">
                        <div class="form-group" id="hasuiderr">
                            <label class="control-label col-sm-3">UserID:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="uid" placeholder="Enter user id" required>
                            </div>
                        </div>
                        <div class="col-sm-12 err" id="uiderr"></div>
                        <div class="form-group" id="haspwderr">
                            <label class="control-label col-sm-3">Password:</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="pwd" placeholder="Enter password" required>
                            </div>
                        </div>
                        <div class="col-sm-12 err" id="pwderr"></div>
                        <div class="form-group"><center>
                            <div class=" col-sm-12">
                                <button type="submit" class="btn btn-success">LOGIN</button>
                            </div></center>
                        </div>
                    </form><br><br>
                    <div class="footer">
                        <div class="footer_content">copyright @ Naveen Bandarupally</div>
                    </div>
                </div>
                <div class="col-sm-4"></div>
            </div>
        </div>
    </body>
</html>