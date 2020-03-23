<?php
$conn=mysqli_connect('localhost','ghobashy','12345test','contactform');

$sql='select id,name,tel,email,message from user';

$result=mysqli_query($conn,$sql);

$data=mysqli_fetch_all($result,MYSQLI_ASSOC);

mysqli_free_result($result);

mysqli_close($conn);
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>database</title>
  </head>
  <body>
    <?php foreach ($data as $i){
         echo '<p>'. $i['name'].'</p>';
         echo '<p>'. $i['email'].'</p>';
         echo '<p>'. $i['tel'].'</p>';
         echo '<p>'. $i['message'].'</p><br>';


    } ?>

  </body>
</html>
