<?php
$title = "Kunde";
require("header.php");
?>


 <h1 class='text-white'><?php echo $client = getClient($_GET['cid'])[0]['company_name']; ?></h1>
 <h2 class='text-white'>E-Mail: <?php echo $client = getClient($_GET['cid'])[0]['email']; ?> </h2>
 <h2 class='text-white'>Tlf: +45 <?php echo $client = getClient($_GET['cid'])[0]['phone']; ?> </h2>
 <h2 class='text-white'>Website: <?php echo $client = getClient($_GET['cid'])[0]['website']; ?> </h2>
 <h2 class='text-white'>Adresse: <?php echo $client = getClient($_GET['cid'])[0]['street_name'];?> <?php echo $client = getClient($_GET['cid'])[0]['house_number'];?> </h2>
 <h1 class="text-warning mt-5">NOTER:</h1>
 <h2 class='text-white'>Title: <?php echo $client = getNote($_GET['cid'])[0]['title']; ?> </h2>
 <h2 class='text-white'>Note: <?php echo $client = getNote($_GET['cid'])[0]['note']; ?> </h2>
