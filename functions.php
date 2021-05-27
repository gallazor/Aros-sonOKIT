<?php
$conn;

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
//function getClientname($var, $var2) {
//    global $conn;
//    $sql = "SELECT * FROM users, contact where contact_id = '". $var. $var2. "'";
//    $result = mysqli_query($conn, $sql);
//    $client = [];
//    if(mysqli_num_rows($result)>0){
//        while($row = mysqli_fetch_assoc($result)) {
//            $client[] = $row;
//        }
//    }
//    return $client;
//}
//Henter user id når man vælger virksomhed
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
