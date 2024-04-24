<?php
$server_n="localhost";
$user_n="root";
$password="";
$db_n="my_shop";

$con=new mysqli($server_n,$user_n,$password,$db_n);
if($con->connect_error){
  die("failed to connect".$con->connect_error);
}




?>