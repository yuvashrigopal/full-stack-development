<?php
$conn=mysqli_connect("localhost","root","","login");
$name=$_POST["a1"];
$psw=$_POST["psw"];
$email=$_POST["mail"];
$date=$_POST["date"];
$phonenumber=$_POST["pn"];
$adderss=$_POST["adderss"];
$bloodgroup=$_POST["bloodgroup"];
//insert query
$query="insert into user(Name,password,email,date,phonenumber,adderss,bloodgroup) values('$name','$psw','$email','$date','$phonenumber','$adderss','$bloodgroup')";
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