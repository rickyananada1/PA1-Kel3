<?php

include 'config.php';
session_start();

if (isset($_POST['submit'])) {

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if (mysqli_num_rows($select) > 0) {
      $row = mysqli_fetch_assoc($select);
      $_SESSION['user_id'] = $row['id'];
      header('location:home.php');
   } else {
      $message[] = 'incorrect email or password!';
   }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>
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
         <h3>login</h3>
         <?php
         if (isset($message)) {
            foreach ($message as $message) {
               echo '<div class="message">' . $message . '</div>';
            }
         }
         ?>
         <input type="email" name="email" placeholder="enter email" class="box" required>
         <input type="password" name="password" placeholder="enter password" class="box" required>
         <input type="submit" name="submit" value="login now" class="btn btn-primary">
         <p>don't have an account? <a href="register.php">regiser now</a></p>
      </form>

   </div>

</body>

</html>