<?php
    session_start();
    session_destroy();
?>

<html>
    <head>
        <title>End of Test</title>
        <link rel="stylesheet" href="boot/css/bootstrap.min.css">
        <script src="jquery.min.js"></script>
        <script src="boot/js/bootstrap.min.js"></script>
        <script>
            $(document).ready(function(){
                var x=0;
                var y = setInterval(function(){
                    if(x==5)
                    {
                        window.location.href = "index.php";
                    }
                    x++;
                },1000);
            });
        </script>
    </head>
    <body>
        <h1>Thanq for writing the test</h1>
    </body>
</html>