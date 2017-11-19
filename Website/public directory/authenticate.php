<?php
/**
 * Created by PhpStorm.
 * User: erikn
 * Date: 8/25/17
 * Time: 11:34 PM
 */
//TODO: Edit DB crednetials
$serverNameDB = "localhost";
$usernameDB = "TODO";
$passwordDB = "TODO";
$dbName = "TODO";
$tableDB = "users";
$userVarification = false;
$userRowLoc;

$data = $_POST['validationObj'];
$json = json_decode($data,TRUE);
$username = $json['username'];
$password = $json['password'];
$password_sha1 = sha1($password);


$conn = mysqli_connect($serverNameDB, $usernameDB, $passwordDB, $dbName);

if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}




if(mysqli_num_rows(mysqli_query($conn, "SELECT username, password_sha1 FROM emerald_users WHERE username = '".$username."' AND  password_sha1 = '".$password_sha1."'")) > 0 )
{
    echo "success";
}
else{
    echo "fail" .$result1;

}







exit();  // exit without auto_append_file
?>
