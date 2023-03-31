<?php

include 'config.php';

if (isset($_POST['submit'])) {

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   $image = $_FILES['image']['name'];
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img/' . $image;

   $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if (mysqli_num_rows($select) > 0) {
      $message[] = 'user already exist';
   } else {
      if ($pass != $cpass) {
         $message[] = 'confirm password not matched!';
      } elseif ($image_size > 2000000) {
         $message[] = 'image size is too large!';
      } else {
         $insert = mysqli_query($conn, "INSERT INTO `user_form`(name, email, password, image) VALUES('$name', '$email', '$pass', '$image')") or die('query failed');

         if ($insert) {
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'registered successfully!';
            header('location:login.php');
         } else {
            $message[] = 'registeration failed!';
         }
      }
   }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>
   <link rel="stylesheet" href="css/style.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
   <nav class="navbar navbar-light bg-light">
      <div class="container-fluid">
         <a class="navbar-brand" href="#">
            <img src="./images/15.png" alt="" width="30" height="30" class="d-inline-block align-text-top">
            TARHILALA
         </a>
         <ul class="nav justify-arround-center">
            <li class="nav-item">
               <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
               <a class="nav-link active" aria-current="page" href="#">Active</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="#">Disabled</a>
            </li>
         </ul>
      </div>
   </nav>

   <div class="form-container">

      <form action="" method="post" enctype="multipart/form-data">
         <h3>register now</h3>
         <?php
         if (isset($message)) {
            foreach ($message as $message) {
               echo '<div class="message">' . $message . '</div>';
            }
         }
         ?>
         <input type="text" name="name" placeholder="enter username" class="box" required>
         <input type="email" name="email" placeholder="enter email" class="box" required>
         <div class="row g-3">
            <div class="col">
               <input type="text" class="box" placeholder="First name" aria-label="First name">
            </div>
            <div class="col">
               <input type="text" class="box" placeholder="Last name" aria-label="Last name">
            </div>
         </div>
         <input type="password" name="password" placeholder="enter password" class="box" required>
         <input type="password" name="cpassword" placeholder="confirm password" class="box" required>
         <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png">
         <input type="submit" name="submit" value="register now" class="btn btn-primary">
         <p>already have an account? <a href="login.php">login now</a></p>
      </form>

   </div>

</body>

</html>