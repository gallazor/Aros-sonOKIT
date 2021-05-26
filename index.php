<?php

$title = "Forside";
require("header.php");


?>


  <div class="pt-5">
      <table class="table  text-white table-hover table-striped text-center">
        <tr>
          <th>Firstname</th>
          <th>Lastname</th>
          <th>Campany</th>
        </tr>
        <?php customers_data() ?>
  </div>
