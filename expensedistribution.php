<?php
 require 'include/common.php';
 if (!isset($_SESSION['email'])) 
 {
     header('location: login.php'); 
 }
?>

<?php
$user_id = $_SESSION['user_id'];
$plan_id = $_GET['id'];
$user_knowing_query = "SELECT * FROM budget_expense u LEFT JOIN budget_persons up ON up.id = u.person_id WHERE up.plan_id='$plan_id' AND u.plan_id='$plan_id' AND u.user_id='$user_id' AND up.user_id='$user_id'";
$user_knowing_query_result = mysqli_query($con, $user_knowing_query) or die(mysqli_error($con));
$total_amount_spent = 0;
$plan_title_query = "SELECT * FROM budget_plans WHERE id='$plan_id' AND user_id='$user_id'";
$plan_title_query_result = mysqli_query($con, $plan_title_query) or die(mysqli_error($con));
$row_title = mysqli_fetch_array($plan_title_query_result);
$row_person_each = "SELECT * FROM budget_persons WHERE plan_id='$plan_id' AND user_id='$user_id'";
$row_person_each_result = mysqli_query($con, $row_person_each) or die(mysqli_error($con));

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
        <div class="container" style="position: relative">
            <div class="row">
                <div class="col-md-3"></div><!-- comment -->
                <div class="col-md-6">
            <div class="panel-group">
             <div class="panel panel-default">
                  <div class="panel-heading" style="background-color: green; color:white">
                     <div class="row">
                         <div class="col-md-9 col-sm-9">
                             <p class="text-center" style="font-size: 20px"><?php echo $row_title['title']; ?></p>
                         </div>
                         <div class="col-md-2 col-sm-9">
                             <div class="row">
                                 <div class="col-md-12 col-sm-12">
                                 </div>
                             </div>
                             <div class="row">
                                 <div class="col-md-12 col-sm-12">
                                 </div>
                             </div>
                             <div class="row">
                                 <div class="col-md-12 col-sm-12">
                                 </div>
                             </div>
                             <div class="row">
                                 <p style="" class="text-right"><span class="glyphicon glyphicon-user" style=""></span> <?php echo $row_title['no_of_people']; ?></p>
                             </div>
                         </div>
                      </div>
            </div>
            </div>
                        
            <div class="panel panel-default">
                <div class="panel-body" >
                    <table class="table" style="margin-bottom: -1%">
                        <tbody>
                        <tr>
                            <td>Initial Budget</td>
                            <td class='text-right' >&#8377 <?php echo $row_title['initial_budget']; ?></td>
                        </tr>
                        <?php
                        $sum_each=0;
                        while($row_person_each = mysqli_fetch_array($row_person_each_result)){
                            $person_each_id = $row_person_each['id'];
                            $each_person_query = "SELECT * FROM budget_persons up INNER JOIN budget_expense u ON up.id = u.person_id AND u.plan_id = up.plan_id WHERE u.person_id = '$person_each_id' AND up.id= '$person_each_id' AND u.user_id='$user_id' AND up.user_id = '$user_id'";
                            $each_person_query_result = mysqli_query($con, $each_person_query) or die(mysqli_error($con));
                            $sum_each=0;
                            while($row_each = mysqli_fetch_array($each_person_query_result)){
                             $sum_each =  $sum_each + $row_each['amount'];
                            }
                            ?>
                        <tr>
                            <td><?php echo $row_person_each['person_name']; ?></td><!-- comment -->
                            <td class='text-right' >&#8377 <?php echo $sum_each ;?></td>
                        </tr>
                        <?php } ?>
                        
                        <?php
                        while($row_person = mysqli_fetch_array($user_knowing_query_result)){
                            $total_amount_spent = $total_amount_spent + $row_person['amount'] ;
                        }?>
                        <tr>
                            <td>Total amount spent</td>
                            <td class='text-right' >&#8377 <?php   echo $total_amount_spent; ?></td>
                        </tr>
                        <?php
                        $remaining_amount = $row_title['initial_budget'] - $total_amount_spent;
                        
                        ?>
                        <tr>
                            <td>Remaining Amount</td>
                            <?php if($remaining_amount> 0){
                                echo "<td class='text-right'  style='color: green;'><b>&#8377 $remaining_amount</b></td>";
                                
                            } else if($remaining_amount<0){ 
                                echo "<td class='text-right'  style='color: red;'><b>&#8377 ".abs($remaining_amount)."</b></td>"; 
                            }else{
                                echo "<td class='text-right'  style=''><b>&#8377 $remaining_amount</b></td>"; 
                            }
                            ?>
                           
                        </tr>
                        <?php
                        $individual_shares = $row_title['initial_budget'] / $row_title['no_of_people'];
                        ?>
                        <tr>
                            <td>Individual Shares</td>
                            <td class='text-right' >&#8377 <?php   echo $individual_shares; ?></td>
                        </tr>
                        <?php
                        
                        $row_person_each_new = "SELECT * FROM budget_persons WHERE plan_id='$plan_id' AND user_id='$user_id'";
                        $row_person_each_new_result = mysqli_query($con, $row_person_each_new) or die(mysqli_error($con));
                        $sum_each_new=0;
                        $person_each_shares = 0;
                        while($row_person_each_share = mysqli_fetch_array($row_person_each_new_result)){
                            $person_each_id = $row_person_each_share['id'];
                            $each_person_query_new = "SELECT * FROM budget_persons up INNER JOIN budget_expense u ON up.id = u.person_id AND u.plan_id = up.plan_id WHERE u.person_id = '$person_each_id' AND up.id= '$person_each_id' AND u.user_id='$user_id' AND up.user_id = '$user_id'";
                            $each_person_query_new_result = mysqli_query($con, $each_person_query_new) or die(mysqli_error($con));
                            $sum_each_new=0;
                            $person_each_shares=0;
                            while($row_each_new = mysqli_fetch_array($each_person_query_new_result)){
                             $sum_each_new =  $sum_each_new + $row_each_new['amount'];
                            }
                            $person_each_shares = $sum_each_new - $individual_shares;
                            
                            ?>
                        <tr>
                            <td><?php echo $row_person_each_share['person_name']; ?></td>
                             <?php if($person_each_shares> 0){
                                echo "<td class='text-right'  style='color: green;'><b>Gets back &#8377 $person_each_shares</b></td>";
                                
                            } else if($person_each_shares<0){ 
                                echo "<td class='text-right'  style='color: red;'><b>Owes &#8377 ".abs($person_each_shares)."</b></td>"; 
                            }else{
                                echo "<td class='text-right'  style=''><b>All Settled up</b></td>"; 
                            }
                            ?>
                            
                        </tr><!-- comment -->
                        <?php  } ?>
                        
                        <tr>
                            <td></td>
                            <td></td>
                        </tr>
                        </tbody>
                    </table>
                    <center>
                        <a href="<?php echo "viewplan.php?id=$plan_id"; ?>"><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-arrow-left"></span> Go Back</button></a>
                    </center>
                </div>
            </div>
            </div>
                </div>
                <div class="col-md-4"></div>

            </div>
            
            
        </div>
        <div style="margin-bottom: 20%"></div>
        <?php
        include 'include/footer.php';
        ?>
    </body>
</html>