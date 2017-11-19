<?php
   include("config.php");
  // session_start();

   //Form to allow users to change their passwords.

if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form

      $username = mysqli_real_escape_string($db,$_POST['resetpassword_username']);
      $oldpassword = mysqli_real_escape_string($db,$_POST['resetpassword_oldpassword']);
      $oldpassword_sha1 = sha1($oldpassword);
      $newpassword = mysqli_real_escape_string($db,$_POST['resetpassword_newpassword']);
      $newpassword_verify = mysqli_real_escape_string($db,$_POST['resetpassword_newpassword_verify']);


      $sql = "SELECT username FROM emerald_users WHERE username = '$username' and password_sha1 = '$oldpassword_sha1'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      $count = mysqli_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row

      if($count == 1) {
         if($newpassword == $newpassword_verify){
         $newpassword_sha1 = sha1($newpassword);
         $sqlReset = "UPDATE emerald_users SET password_sha1 = '$newpassword_sha1' WHERE username = '$username'";
         $result = mysqli_query($db,$sqlReset);
         echo "<script type='text/javascript'>alert('$result');</script>";
         $message = "Password Reset Success";
         echo "<script type='text/javascript'>alert('$message');</script>";
         }
         else{
         $error = "Your new passwords don't match";
         echo "<script type='text/javascript'>alert('$error');</script>";
         }
      }else {
         $error = "Your User Name or Password is invalid";
         echo "<script type='text/javascript'>alert('$error');</script>";
      }
   }
   ?>