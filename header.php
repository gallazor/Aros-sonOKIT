
<?php
$user = null;
include_once("functions.php");


session_start();


if(isset($_POST["logoutBtn"])){
$_SESSION['user'] = "";
header("Location: loginindex.php");
exit();
}
if($_SESSION['user'] == ""){
  header("Location: loginindex.php");
}
include_once("bootstrap.html");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title;?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body style="font-family: Segoe UI,Frutiger; background-color:#202020	;">
  <nav class="navbar navbar-expand-md navbar-light border-bottom mb-5" style="background-color:#F3C13A;">
    <a class="navbar-brand mb-2" href="index.php">Aros & Søn ApS</a>
      <button class="btn navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
    <div class="collapse navbar-collapse float-right" id="collapsibleNavbar">
      <ul class="nav  navbar-nav ml-auto my-auto">
          <li class="nav-item">
              <a class="nav-link text-dark" href="index.php" >Kundeliste</a>
          </li>
          <li class="nav-item">
              <a class="nav-link text-dark" href="note.php" >Noter</a>
          </li>

          <li class="nav-item">
              <?php if($_SESSION['user'] == ""){?>
              <a class="nav-link text-dark" href="loginindex.php" >Login</a>
            <?php } else {
              echo '<form action="index.php" method="post">
                  <button class="btn my-1 col-sm-12 btn-dark text-white btn-sm btn-block " type="submit" name="logoutBtn">Log out</button>
              </form>';
            } ?>
          </li>
      </ul>
  </div>
</nav>

<footer class="footer mt-auto navbar-light border-bottom fixed-bottom" style="background-color:#F3C13A;">
  <div class="container">
    <div class="py-2 text-center">
  &copy; 1993 -
  <script>
    document.write(new Date().getFullYear())
  </script> | Aros & Søn ApS <a
  </div>
</footer>
