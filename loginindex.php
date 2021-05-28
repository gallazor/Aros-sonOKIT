<!DOCTYPE html>
<?php
session_start();
include('functions.php');


$loginMessage;

if(isset($_POST['login'])){
  if(count(getEmployees($_POST['client_user_id']))>0){
    if($_POST['password'] == getEmployees($_POST['client_user_id'])[0]['pword']) {
        $_SESSION['user'] = $_POST['client_user_id'];
        header("Location: index.php");
        exit();
    } else {
      $loginMessage = "The password entered is invalid";
    }
  } else {
    $loginMessage = "Email does not exist";
  }
} else {
  $loginMessage = "You are not logged in";
}
?>
<html lang="en">


    <link rel="stylesheet" href="login.css">
    <title>Login Page</title>
</head>

<body>
    <form action="loginindex.php" method="post">
        <div class="login-box">
            <h1>Login</h1>

            <div class="textbox">
                <i class="fa fa-user" aria-hidden="true"></i>
                <input type="text" placeholder="E-mail"
                         name="client_user_id" value="">
            </div>

            <div class="textbox">
                <i class="fa fa-lock" aria-hidden="true"></i>
                <input type="password" placeholder="Password"
                         name="password" value="">
            </div>
            <p><?php echo $loginMessage ?></p>
            <input class="button" type="submit"
                     name="login" value="Sign In">
        </div>
    </form>
</body>

</html>
