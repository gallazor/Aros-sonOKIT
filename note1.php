
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div>
    <form class="new-note" action="create.php" method="post">
      
        <input type="text" name="title" placeholder="Note title" autocomplete="off"
               value="<?php echo $currentNote['title'] ?>">
        <textarea name="description" cols="30" rows="4"
                  placeholder="Note Description"><?php echo $currentNote['description'] ?></textarea>
        <button>
