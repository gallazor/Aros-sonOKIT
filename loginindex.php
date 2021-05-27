<!DOCTYPE html>
<?php
session_start();
include('functions.php');
define('DBHOST', 'localhost');
define('DBUSER', 'root');
define('DBPASS', 'root');
define('DBNAME', 'arosdb2');
connect();

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

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href=
"https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
