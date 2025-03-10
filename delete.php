<?php
$connection=mysqli_connect("localhost","root","","login");
$req=$_REQUEST["did"];
$del="delete from user where id='$req'";
$res=mysqli_query($connection,$del);
header("location:view.php");
?>