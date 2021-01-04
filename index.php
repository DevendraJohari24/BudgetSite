<?php
 require 'include/common.php';
 if (isset($_SESSION['email'])) 
 {
     header('location: home.php'); 
 }
?>
<!DOCTYPE html>
<html>
    <head>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
     <link rel="stylesheet" href="css/cascade.css" type="text/css">

     <!--jQuery library--> 
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

     <!--Latest compiled and minified JavaScript--> 
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1">

     <title>Ct&#8377;l Budget</title>
 </head>
    <body>
        
        <?php
        include 'include/header.php';
        ?>
        <div style="background-image: url('image/alex-vidal.png');padding-bottom: 20%; background-repeat: no-repeat; background-position: right top">
            <div class="row">
                <div class="col-md-2">
                    
                </div>
                <div class="col-md-8">
                    <div id="banner_content">
                        <center>
                       <h2>We help you control your budget</h2>
                       <a href="home.php" class="btn btn-danger btn-lg active" style="background-color: darkorange">Start Today</a> </center>
                    </div>
                </div>
                <div class="col-md-2">
                    
                </div>
            </div>
        </div>
        <div style=""></div>
        <?php
        include 'include/footer.php';
        ?>

    </body>
</html>