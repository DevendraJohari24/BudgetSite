<?php
 require 'include/common.php';
 ?>
<?php
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con,$_POST['password']);
    $user_check_query = "SELECT id,email_id FROM budget_users WHERE email_id='$email'";
    $user_check_query_result = mysqli_query($con, $user_check_query) or die(mysqli_error($con));
    $total_check_fetched = mysqli_num_rows($user_check_query_result);
    if ($total_check_fetched == 0){
        echo "<script>alert('No User exist!')</script>";
        echo ("<script>location.href='signup.php'</script>");
    }else{
    $encrypt_password = md5($password);
    $user_login_query = "SELECT id,email_id FROM budget_users WHERE email_id='$email' AND password = '$encrypt_password'";
    $user_login_query_result = mysqli_query($con, $user_login_query) or die(mysqli_error($con));
    $total_rows_fetched = mysqli_num_rows($user_login_query_result);
    if ($total_rows_fetched == 0){
       echo "<script>alert('Invalid Credentials')</script>";
    }
    else {
        $row = mysqli_fetch_array($user_login_query_result);   
        $_SESSION['email'] = $row['email_id'];
        $_SESSION['user_id'] = $row['id'];
        echo "<script>alert('Login Successfully!')</script>";
        echo ("<script>location.href='home.php'</script>");
    }
    }
    
?>
