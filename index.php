<?php

$title = "Forside";
require("header.php");


?>


  <div class="pt-5 mx-auto w-50 " >
      <table class="table text-white text-center table-hover border border-white" >
        <thead>
        <tr>
          <th>Firstname</th>
          <th>Lastname</th>
          <th>Campany</th>
        </tr>
        <?php customers_data() ?>
  </div>
