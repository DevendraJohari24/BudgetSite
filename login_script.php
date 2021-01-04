<?php
 require 'include/common.php';
 if (!isset($_SESSION['email'])) 
 {
     header('location: login.php'); 
 }
 ?>
<?php
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con,$_POST['password']);
    $encrypt_password = md5($password);
    $user_login_query = "SELECT id,email_id FROM budget_users WHERE email_id='$email' AND password = '$encrypt_password'";
    $user_login_query_result = mysqli_query($con, $user_login_query) or die(mysqli_error($con));
    $total_rows_fetched = mysqli_num_rows($user_login_query_result);
    if ($total_rows_fetched == 0){
        header('location: login.php?error=Invalid Email or Password!');
    }
    else {
        $row = mysqli_fetch_array($user_login_query_result);   
        $_SESSION['email'] = $row['email_id'];
        $_SESSION['user_id'] = $row['id'];
        header('location: home.php');
    }
    
?>
