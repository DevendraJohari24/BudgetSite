<?php
 require 'include/common.php';
 if (!isset($_SESSION['email'])) 
 {
     header('location: login.php'); 
 }
 ?>
<?php
   $title = $_POST['title'];
   $from_date = $_POST['from_date'];
   $to_date = $_POST['to_date'];
   $initial_budget =  $_POST['initial_budget'];
   $no_of_people = $_POST['no_of_people'];
   $j=1;
   $person_name = '';
  
   $user_id = $_SESSION['user_id'];
   echo $user_id;
   $user_registration_query = "INSERT INTO budget_plans(user_id, initial_budget, no_of_people, from_date, to_date, title)values('$user_id', '$initial_budget','$no_of_people','$from_date','$to_date','$title')";  
   $select_query_result = mysqli_query($con, $user_registration_query) or die(mysqli_error($con));
   $plan_check_query = "SELECT * FROM budget_plans WHERE user_id='$user_id' AND title='$title'";
   $plan_check_query_result = mysqli_query($con, $plan_check_query) or die(mysqli_error($con));
   $row_check = mysqli_fetch_array($plan_check_query_result);
   $plan_id = $row_check['id'];
   while($j<=$no_of_people){
       $person_name = $_POST["person$j"];
       $user_registration_query2 = "INSERT INTO budget_persons(user_id, person_name, plan_id)values('$user_id','$person_name','$plan_id')";  
       $select_query_result2 = mysqli_query($con, $user_registration_query2) or die(mysqli_error($con));
       $j = $j +1;
   }
   
   header("location: viewplan.php?id=$plan_id");
   
   ?>