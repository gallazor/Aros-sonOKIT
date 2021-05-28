<?php
$conn = [];

define('DBHOST', 'localhost');
define('DBPASS', 'root');
define('DBUSER', 'root');
define('DBNAME', 'arosdb2');

connect();



function connect() { //connect to DB
    global $conn; //set var to global
    $conn = mysqli_connect(DBHOST, DBUSER, DBPASS); //mysqli_connect(host,user,pw)
    if(!$conn) { //if not connected then kill (test if error)
        die(mysqli_error($conn));   //kill
    }
    mysqli_select_db($conn, DBNAME); //select DB that's to be used
}




function customers_data() {
  global $conn;
  $sql = "SELECT users.firstname, users.lastname, contact.company_name, contact.contact_id
  FROM users, contact
  WHERE contact.userid = users.userid";
  $result = mysqli_query($conn, $sql) or die("Error");
  if(mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result)) {

      echo "<tr>
              <td style='border: none;'>". $row['firstname'] ."</a></td>
              <td style='border: none;'>". $row['lastname'] ."</td>
              <td  class='btn col-sm-6 btn-warning text-danger btn-sm btn-block my-2 py-1 mx-auto font-weight-bold '><a class= text-dark href='kunde.php?cid=" . $row['contact_id'] . "'>". $row['company_name'] ."</td>
            </tr>";
    }
    echo "</table>";
  }
  else {
    echo "0 result";
  }
}


function getClient($var) {
    global $conn;
    $sql = "SELECT * FROM contact where contact_id = '". $var. "'";
    $result = mysqli_query($conn, $sql);
    $client = [];
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)) {
            $client[] = $row;
        }
    }
    return $client;
}
function getNote($var) {
    global $conn;
    $sql = "SELECT * FROM newnote where contact_id = '". $var. "'";
    $result = mysqli_query($conn, $sql);
    $note = [];
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)) {
            $note[] = $row;
        }
    }
    return $note;
}

function getEmployees($var) {
    global $conn;
    $sql = "SELECT * FROM employees where email = '". $var. "'";
    $result = mysqli_query($conn, $sql);
    $employees = [];
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)) {
            $employees[] = $row;
        }
    }
    return $employees;
}

function getUser($var) {
    global $conn;
    $sql = "SELECT * FROM users where userid = '". $var. "'";
    $result = mysqli_query($conn, $sql);
    $user = [];
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)) {
            $user[] = $row;
        }
    }
    return $user;
}

function debug($data) {
  echo '<pre>';
  print_r($data);
  echo '</pre>';
}


if(isset($_GET['delete'])){
  global $conn;
  $note_id = $_GET['delete'];
  $delete = true;
  $sql = "DELETE FROM `newnote` WHERE `note_id` = $note_id";
  $result = mysqli_query($conn, $sql);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  if(isset($_POST['note_idEdit'])){

    $note_id = $_POST["note_idEdit"];
    $title = $_POST["titleEdit"];
    $discription = $_POST["discriptionEdit"];


  $sql = "UPDATE `newnote` SET `title` = '$title' , `note` = '$discription' WHERE `newnote`.`note_id` = $note_id";
  $result = mysqli_query($conn, $sql);
  if($result){
    $update = true;
  }else{
    echo "Der skete en fejl";
  }

  }
  else{
  $title = $_POST["title"];
  $discription = $_POST["note"];


$sql = "INSERT INTO `newnote` (`title`, `note`) VALUES ('$title', '$discription')";
$result = mysqli_query($conn, $sql);



if($result){

    $insert = true;
}
else{
    echo "Der skete en fejl";
}
  }
}
