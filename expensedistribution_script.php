<?php
 require 'include/common.php';
 if (!isset($_SESSION['email'])) 
 {
     header('location: login.php'); 
 }
 ?>

<?php 
function GetImageExtension($imagetype){
      
        if(empty($imagetype)) return false;
        switch($imagetype){
        case 'image/bmp': return '.bmp';
        case 'image/gif': return '.gif';
        case 'image/jpeg': return '.jpg';
        case 'image/png': return '.png';
        default: return false;
        }
    }
    
?>
<?php
   $title = $_POST['title'];
   $date_of = $_POST['date_of'];
   $amount = $_POST['amount'];
   $user_id = $_SESSION['user_id'];
   $person_name = $_POST['person_name'];
   $person_registration_query = "SELECT * FROM budget_persons WHERE user_id = '$user_id' AND person_name='$person_name' ";
   $person_query_result = mysqli_query($con, $person_registration_query) or die(mysqli_error($con));
   $total_rows_fetched = mysqli_num_rows($person_query_result);
   $row = mysqli_fetch_array($person_query_result);
   $person_id = $row['id'];
   $plan_id = $_SESSION['plan_id'];
   if (!empty($_FILES["fileToUpload"]["name"])) {
        $file_name=$_FILES["fileToUpload"]["name"];
        $temp_name=$_FILES["fileToUpload"]["tmp_name"];
        $imgtype=$_FILES["fileToUpload"]["type"];
        $ext= GetImageExtension($imgtype);
        $imagename=date("d-m-Y")."-".time().$ext;
        $target_path = "img/".$imagename;
        if(move_uploaded_file($temp_name, $target_path)){
        // Make a query to save data to your database.
           $user_registration_query = "INSERT INTO budget_expense(expense_title , date, amount, person_id, user_id, target_path, plan_id)values('$title', '$date_of','$amount','$person_id','$user_id','$target_path', '$plan_id')";  
           $select_query_result = mysqli_query($con, $user_registration_query) or die(mysqli_error($con));
        }   
    } else {
        $target_path = NULL;
        $user_registration_query = "INSERT INTO budget_expense(expense_title , date, amount, person_id, user_id, target_path, plan_id)values('$title', '$date_of','$amount','$person_id','$user_id','$target_path', '$plan_id')";  
           $select_query_result = mysqli_query($con, $user_registration_query) or die(mysqli_error($con));
}
    
    header('location: expensedistribution.php?id='.$plan_id);

   ?>