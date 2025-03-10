<?php
$conn=mysqli_connect("localhost","root","","login");
$a1=$_POST["mail"];
$pass=$_POST["psw"];
$query="select * from user where email='$a1' and password='$pass'";
$res=mysqli_query($conn,$query);
if(mysqli_num_rows($res)){
    header("location:new.html");
}
else{
    echo "invalid username and password";
}
?>