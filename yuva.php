<?php
$conn=mysqli_connect("localhost","root","","login");
$name=$_POST["a1"];
$psw=$_POST["psw"];
$query="insert into user(Name,password)values('$name','$psw')";
$result=mysqli_query($conn,$query);
if($result)
{
   header("location:new.html");
}
else
{
    echo "not submitted";
}
?>