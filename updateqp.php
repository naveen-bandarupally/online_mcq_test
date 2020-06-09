<?php
    session_start();
?>

<html>
    <head>
        <title>Update Question Paper</title>
        <link rel="stylesheet" href="boot/css/bootstrap.min.css">
        <script src="jquery.min.js"></script>
        <script src="boot/js/bootstrap.min.js"></script>
        <style>
            body{
                background: #212f3d;
                color: white;
                font-weight: bold;
            }
            .navgbar{
                width: 100%;
                height: 70px;
                background: #2e4053;
                box-shadow: 0px 2px 5px black;
            }
            .navgbar .container ul{
                list-style-type: none;
            }
            .navgbar .container li{
                position: relative;
                left: -30px;
                width: 25px;
                padding: 25px 5px 25px 5px;
                text-align: center;
                display: inline;
                float: right;
                color: white;
                text-transform: uppercase;
                font-weight: bold;
            }
            pre{
                white-space: pre-wrap;
                white-space: -moz-pre-wrap;
                white-space: -pre-wrap;
                white-space: -o-pre-wrap;
                word-wrap: break-word;
            }
            #close{
                position: relative;
                left: 0px;
                top: 10px;
                width: 110px;
                padding: 15px 25px 15px 25px;
                border-radius: 5px;
                background: lightseagreen;                
            }
            #close:hover{
                background: seagreen;
                cursor: pointer;
            }
            .footer{
                clear: both;
                position: relative;
                bottom: 0;
                width: 100%;
                height: 65px;
                background: #2e4053;
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
            #h,#m,#s{
                width: auto;
                display: inline;
            }
            .nav-tabs > li {
                float:none;
                display:inline-block;
                zoom:1;
            }
            .nav-tabs {
                text-align:center;
            }
        </style>
        <script>
            $(document).ready(function(){
                var tid = "<?php echo $_SESSION['tid'] ?>";
                $("#addq").submit(function(e){
                    var qes = $("#q").val();
                    var opt1 = $("#opt1").val();
                    var opt2 = $("#opt2").val();
                    var opt3 = $("#opt3").val();
                    var opt4 = $("#opt4").val();
                    var ans = $("#ans").val();
                    $.ajax({
                        url:"saveq.php",
                        method:"post",
                        data:{qes:qes,opt1:opt1,opt2:opt2,opt3:opt3,opt4:opt4,ans,ans},
                        success:function(q){
                            alert("saved");
                            $("#q").val("");
                            $("#opt1").val("");
                            $("#opt2").val("");
                            $("#opt3").val("");
                            $("#opt4").val("");
                            $("#ans").val("SELECT ANSWER");
                        }
                    });
                    e.preventDefault();
                });
                $("#delbt").click(function(){
                    $("#delete").load("loadques.php");
                });
                $("#modbt").click(function(){
                    $("#modify").load("loadmques.php");
                });
                $(document).on('click','[class^=qbt]',function(){
                    var id = $(this).attr("id");
                    $.ajax({
                        url:"delques.php",
                        method:"post",
                        data:{id:id},
                        success:function(){
                            alert("Deleted successfully");
                            $("#delete").load("loadques.php");
                        }
                    });
                });
                $(document).on('submit','[class^=ubt]',function(e){
                    var id = $(this).attr("id");
                    var qid = "#"+id+"q";
                    var opt1 = "#"+id+"o1";
                    var opt2 = "#"+id+"o2";
                    var opt3 = "#"+id+"o3";
                    var opt4 = "#"+id+"o4";
                    var ans = "#"+id+"ans";
                    var qid = $(qid).val();
                    var opt1 = $(opt1).val();
                    var opt2 = $(opt2).val();
                    var opt3 = $(opt3).val();
                    var opt4 = $(opt4).val();
                    var ans = $(ans).val();
                    $.ajax({
                        url:"updateques.php",
                        method:"post",
                        data:{id:id,ques:qid,opt1:opt1,opt2:opt2,opt3:opt3,opt4:opt4,ans:ans},
                        success:function(){
                            alert("Updated Successfully");
                            $("#modify").load("loadmques.php");
                        }
                    });
                    e.preventDefault();
                });
                $("#close").click(function(){
                    window.location.href = "admin.php";
                });
            });
        </script>
    </head>
    <body>
        <div class="container-fluid">
            <div class="navgbar">
                <div class="container">
                    <ul>
                        <li id="close">CLOSE</li>
                    </ul>
                </div>
            </div>
            <div class="container-fluid tab-pane fade in active" style="padding-top: 30px;">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#add">ADD QUESTION</a></li>
                    <li><a data-toggle="tab" href="#delete" id="delbt">DELETE QUESTION</a></li>
                    <li><a data-toggle="tab" href="#modify" id="modbt">MODIFY QUESTION</a></li>
                </ul>
                <div class="tab-content">
                    <br><br>
                    <div id="add" class="tab-pane fade in active">
                        <div class='row'>
                            <form class='form-horizontal' id="addq">
                                <div class='form-group' id='haserrscode'>
                                    <label class='col-sm-2 control-label'>Question</label>
                                    <div class='col-sm-8'>
                                        <textarea id="q" class='form-control' row='8' placeholder="Enter question.." required></textarea>
                                    </div>
                                    <div class='col-sm-2'></div>
                                </div>
                                <div class='row'>
                                    <div class='col-sm-2'></div>
                                    <div class='col-sm-4'>
                                        <div class='form-group' id='haserrscode'>
                                            <label class='col-sm-3 control-label'>Option A</label>
                                            <div class='col-sm-7'>
                                                <textarea id="opt1" class='form-control' row='8' placeholder="Enter option A.." required></textarea>
                                            </div>
                                            <div class='col-sm-2'></div>
                                        </div>
                                    </div>
                                    <div class='col-sm-4'>
                                        <div class='form-group' id='haserrscode'>
                                            <label class='col-sm-3 control-label'>Option B</label>
                                            <div class='col-sm-7'>
                                                <textarea id="opt2" class='form-control' row='8' placeholder="Enter option B.." required></textarea>
                                            </div>
                                            <div class='col-sm-2'></div>
                                        </div>
                                    </div>
                                    <div class='col-sm-2'></div>
                                </div>
                                <div class='row'>
                                    <div class='col-sm-2'></div>
                                    <div class='col-sm-4'>
                                        <div class='form-group' id='haserrscode'>
                                            <label class='col-sm-3 control-label'>Option C</label>
                                            <div class='col-sm-7'>
                                                <textarea id="opt3" class='form-control' row='8' placeholder="Enter option C.." required></textarea>
                                            </div>
                                            <div class='col-sm-2'></div>
                                        </div>
                                    </div>
                                    <div class='col-sm-4'>
                                        <div class='form-group' id='haserrscode'>
                                            <label class='col-sm-3 control-label'>Option D</label>
                                            <div class='col-sm-7'>
                                                <textarea id="opt4" class='form-control' row='8' placeholder="Enter option D.." required></textarea>
                                            </div>
                                            <div class='col-sm-2'></div>
                                        </div>
                                    </div>
                                    <div class='col-sm-2'></div>
                                </div><br><br>
                                <div class='row'>
                                    <div class='col-sm-2'></div>
                                    <div class='col-sm-4'>
                                        <div class='form-group' id='haserrscode'>
                                            <label class='col-sm-3 control-label'>Answer</label>
                                            <div class='col-sm-7'>
                                                <select class="form-control" id="ans" required>
                                                    <option selected disabled>SELECT ANSWER</option>
                                                    <option value="a">A</option>
                                                    <option value="b">B</option>
                                                    <option value="c">C</option>
                                                    <option value="d">D</option>
                                                </select>
                                            </div>
                                            <div class='col-sm-2'></div>
                                        </div>
                                    </div>
                                    <div class='col-sm-4'><center>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <button type="submit" class="btn btn-success btn-lg">save</button>
                                            </div>
                                        </div></center>
                                    </div>
                                    <div class='col-sm-2'></div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div id="delete" class="tab-pane fade">
                        
                    </div>
                    <div id="modify" class="tab-pane fade">
                        
                    </div>
                </div>
            </div>
            <div class="footer">
                <div class="footer_content">copyright @ Naveen Bandarupally</div>
            </div>
        </div>
    </body>
</html>