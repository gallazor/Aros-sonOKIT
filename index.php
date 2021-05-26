<?php

$title = "Forside";
require("header.php");


?>

  <h1><?php echo $client = getClient($_GET['cid'])[0]['company_name']; ?></h1>

  <div class="pt-5">
      <table class="table  text-white table-hover table-striped text-center">
        <tr>
          <th>Firstname</th>
          <th>Lastname</th>
          <th>Campany</th>
        </tr>
        <?php customers_data() ?>
  </div>
  <?php
  if(isset($_GET['cid'])) {
      $client = getClient($_GET['cid']);
      echo "<h1 class='text-white' style='border:1px solid deeppink;'>" . $client[0]['email'] . "</h1>";
  } else {
    //jeg er empty

  }
   /*echo "<tr>
          <td><a href='#'> ". $row['firstname'] ."</a></td>
          <td>". $row['lastname'] ."</td>
          <td>". $row['company_name'] ."</td>
        </tr>";
  }*/
  ?>
