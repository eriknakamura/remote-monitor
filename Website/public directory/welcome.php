<?php
   include('session.php');
?>
<html">

   <head>
      <title>Welcome </title>
   </head>

   <body>
      <h1>Welcome <?php echo $login_session; ?></h1>
      <h3>Navigate below:</h3>
      <h5><a href = "dashboard.html">Dashboard</a></h5>
      <h5><a href = "user_settings.html">User Settings</a></h5>
      <h5><a href = "system_settings.php">System Settings</a></h5>
      <h5><a href = "help.html">Help and FAQ</a></h5>
      <h4><a href = "logout.php">Sign Out</a></h4>
   </body>

</html>