<?php

$conn=mysqli_connect('localhost','ghobashy','12345test','contactform');



$errors=['name'=>'','email'=>'','tel'=>'','message'=>''];

if(isset($_POST['submit'])){

  if(empty($_POST['name'])){
    $errors['name'] = 'name is required <br>';
  }


  if(empty($_POST['email'])){
    $errors['email'] = 'email is required <br>';
  }
  else{
    $email=$_POST['email'];
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
      $errors['email'] ='This email is incorrect';
    }
  }

  if(empty($_POST['tel'])){
    $errors['tel'] = 'mobile number is required <br>';
  }
  else{
    $tel=$_POST['tel'];
    if(!filter_var($tel,FILTER_VALIDATE_INT)){
      $errors['tel']= 'This phone is incorrect';
    }
  }


  if(empty($_POST['message'])){
    $errors['message'] = 'message is required <br>';
  }

  if(array_filter($errors)){

  }
  else{
    $name=mysqli_real_escape_string($conn,$_POST['name']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $tel=mysqli_real_escape_string($conn,$_POST['tel']);
    $message=mysqli_real_escape_string($conn,$_POST['message']);

    $sql="INSERT INTO user(name,email,tel,message) VALUES('$name','$email','$tel','$message') ";

    if(mysqli_query($conn,$sql)){
      header('location:db.php');
    }else{
      echo 'error';
    }

  }

}



?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
  <title>Contact form</title>
</head>
  <body>
    <div class="pt-5">
        <form id="signup-user" action="index.php" method="post">
            <div class="container justify-content-center">
                <div class="row justify-content-center">
                    <div class="form-group col-4">
                        <label for="name">Name</label>
                        <input class="form-control" id="name" type="text" name="name" placeholder="Enter Your Name" />
                        <span> <?php echo $errors['name']; ?> </span>
                    </div>
                </div>
            </div>

            <div class="container justify-content-center">
                <div class="row justify-content-center">
                    <div class="form-group col-4">
                        <label for="email">Email</label>
                        <input class="form-control" id="email" name="email" placeholder="Enter email"/>
                        <span> <?php echo $errors['email']; ?> </span>
                    </div>
                </div>
            </div>

            <div class="container justify-content-center">
                <div class="row justify-content-center">
                    <div class="form-group col-4">
                        <label for="tel">Mobile</label>
                        <input class="form-control" id="tel" type="" name="tel" placeholder="Enter Your Phone Number"/>
                        <span> <?php echo $errors['tel']; ?> </span>
                    </div>
                </div>
            </div>

            <div class="container justify-content-center">
                <div class="row justify-content-center">
                    <div class="form-group col-4">
                        <label for="textarea">Message</label>
                        <textarea class="form-control " rows="3" id="textarea" type="textarea" name="message" placeholder="Enter Your Message"></textarea>
                        <span> <?php echo $errors['message']; ?> </span>
                    </div>
                </div>
            </div>


            <div class="container justify-content-center">
                <div class="row justify-content-center ">
                    <div class=" col-4">
                      <input class="btn btn-primary" type="submit" name="submit" value="Send Your Message">
                    </div>

                    </div>
            </div>
        </form>
    </div>
  </body>
</html>
