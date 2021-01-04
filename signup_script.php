<?php
 require 'include/common.php';
  if (isset($_SESSION['email'])) 
 {
     header('location: home.php'); 
 }
 ?>
<?php
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $contact = mysqli_real_escape_string($con, $_POST['contact']);
    if(strlen($contact)>10){
        header('location: signup.php?contact_error=Enter 10 digit correct Contact number!');
    }
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $regex_email = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
    if(!preg_match($regex_email, $email)){
        header('location: signup.php?email_error=Enter Correct Email ID!');
    }
    $password = mysqli_real_escape_string($con,$_POST['password']);
    if(strlen($password) < 6){
        header('location: signup.php?password_error=Your Password is too Short!');
    }
    elseif (strlen($password) >10) {
    header('location: signup.php?password_error=Your Password is too Long!');
    }
    $encrypt_password = md5($password);
    $user_login_query = "SELECT id,email_id FROM budget_users WHERE email_id='$email'";
    $user_login_query_result = mysqli_query($con, $user_login_query) or die(mysqli_error($con));
    $total_rows_fetched = mysqli_num_rows($user_login_query_result);
    if ($total_rows_fetched != 0){
        header('location: signup.php?email_error=Email Already Exist!');
    }
    else {
        $user_registration_query = "INSERT INTO budget_users(name , email_id , password, phone )values('$name','$email','$encrypt_password','$contact')";  
        $select_query_result = mysqli_query($con, $user_registration_query) or die(mysqli_error($con));
        echo 'User successfully Inserted!';
        $_SESSION['email'] = $email;
        $_SESSION['user_id'] = mysqli_insert_id($con);
        header('location: home.php');
    }
    
?>
