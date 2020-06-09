<?php
 
include 'connectdb.php';

    if($con)
    {
        echo "<div class='row'>
                <form class='form-horizontal'>
                    <div class='form-group' id='haserrscode'>
                        <label class='col-sm-2 control-label'>Question</label>
                        <div class='col-sm-8'>
                            <textarea class='form-control' row='8'></textarea>
                        </div>
                        <div class='col-sm-2'></div>
                    </div>
                    <div class='row'>
                        <div class='col-sm-2'></div>
                        <div class='col-sm-4'>
                            <div class='form-group' id='haserrscode'>
                                <label class='col-sm-3 control-label'>Option 1</label>
                                <div class='col-sm-7'>
                                    <textarea class='form-control' row='8'></textarea>
                                </div>
                                <div class='col-sm-2'></div>
                            </div>
                        </div>
                        <div class='col-sm-4'>
                            <div class='form-group' id='haserrscode'>
                                <label class='col-sm-3 control-label'>Option 2</label>
                                <div class='col-sm-7'>
                                    <textarea class='form-control' row='8'></textarea>
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
                                <label class='col-sm-3 control-label'>Option 3</label>
                                <div class='col-sm-7'>
                                    <textarea class='form-control' row='8'></textarea>
                                </div>
                                <div class='col-sm-2'></div>
                            </div>
                        </div>
                        <div class='col-sm-4'>
                            <div class='form-group' id='haserrscode'>
                                <label class='col-sm-3 control-label'>Option 4</label>
                                <div class='col-sm-7'>
                                    <textarea class='form-control' row='8'></textarea>
                                </div>
                                <div class='col-sm-2'></div>
                            </div>
                        </div>
                        <div class='col-sm-2'></div>
                    </div>
                </form>
            </div>";
    }
    else
    {
        echo "Error occured while connecting to databse";
    }
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>