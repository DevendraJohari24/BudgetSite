<?php
 require 'include/common.php';
 if (!isset($_SESSION['email'])) 
 {
     header('location: login.php'); 
 }
?>
<?php
        $user_id = $_SESSION['user_id'];
       $plan_query = "SELECT * FROM budget_plans WHERE user_id='$user_id'";
       $plan_query_result = mysqli_query($con, $plan_query) or die(mysqli_error($con));
       $total_rows_fetched = mysqli_num_rows($plan_query_result);

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
        <?php
        
        if($total_rows_fetched==0){
        
        ?>
        <div class="container">
            <h2>You don't have any active plans.</h2>
        </div>
        <br>
        <div class="container" style="position: relative">
                <div class="row">
                    <div class="col-md-3">
                        <div class="" style="background-color: blanchedalmond ; border: 3px solid green; width: 160px ;height: 160px">
                        <center>
                                 <a href="createnewplan.php"><p style="margin-top: 40%;margin-bottom: 40%"><span class="glyphicon glyphicon-plus-sign" style="color: green"></span> Create a New Plan</p></a>
                             </center>
                        </div>
                    </div>
                </div>
        </div>
        <?php } 
        else if($total_rows_fetched>0){
        
        ?>
        
        <div class="container">
            <h2>You have <?php echo $total_rows_fetched  ?> active Plans.</h2>
        </div>
        <br>
        <div class="container" style="position: relative">
            <div class="row">
                <?php while ($row_plan = mysqli_fetch_array($plan_query_result)){ ?>
                <div class="col-md-4">

                    <div class="panel-group">
                                 <div class="panel panel-default">
                                     <div class="panel-heading"  style="background-color: green; color:white">
                                         <div class="row">
                                             <div class="col-md-10">
                                            <h4 class="text-center"><?php echo $row_plan['title']; ?></h4>
                                        </div>
                                        <div class="col-md-2">
                                            <p style="font-size: medium; padding-top: 8px" class="text-right"><span class="glyphicon glyphicon-user" style=""></span> <?php echo $row_plan['no_of_people'];  ?></p>
                                        </div>

                                          </div>
                                </div>
                               </div>
                                <div class="panel panel-default" style="width: 100%; margin-bottom: -4%;">
                                    <div class="panel-body" >
                                        <table class="table" style="margin-bottom: 0%">
                                            <tbody>
                                               <tr>
                                                <td><b>Budget</b></td>
                                                <!-- comment -->
                                                <td class="text-right" style="">&#8377 <?php echo $row_plan['initial_budget'] ?></td>
                                               </tr><!-- comment -->
                                               <tr>
                                                 <td><b>Date</b></td>
                                                 <td class="text-right"><?php 
                                                        $date_from = $row_plan['from_date'] ;
                                                        $date1=date_create($date_from);
                                                        $date_to = $row_plan['to_date'] ;
                                                        $date2= date_create($date_to);
                                                        $date_format1 = date_format($date1,"dS M -");
                                                        $date_format2 = date_format($date2,"dS M-Y");
                                                        echo "$date_format1.$date_format2"; 
                                                        ?></td>
                                               </tr><!-- comment -->
                                               <tr><td></td>
                                                   <td></td>
                                               </tr>


                                            </tbody>

                                        </table>
                                        <center>
                                            <a href="<?php echo "viewplan.php?id=".$row_plan['id']; ?>"><button type="button" style="width:100% " class="btn btn-success">View Plan</button></a>
                                        </center>
                                    </div>
                                </div>
                    </div>

                </div>
                <?php } ?>
                
                
              <div class="col-md-4">
                  
                  <div style="margin-top: 20%;">
                        <div class="" style="background-color: blanchedalmond ;border: 3px solid green; width: 200px ;height: 200px">
                        <center>
                                 <a href="createnewplan.php"><p style="margin-top: 40%;margin-bottom: 40%"><span class="glyphicon glyphicon-plus-sign" style="color: green"></span> Create a New Plan</p></a>
                             </center>
                        </div>
                  </div>
                  
                    </div>
            </div>
         </div>
        <div style="margin-bottom: 30%"></div>
        <?php } ?>
        <?php
        include 'include/footer.php';
        ?>
   
        
    </body>
</html>


        
