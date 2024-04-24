<?php
// seprate code of connection estabalishment query for understanding

$server="localhost";
$user="root";
$password="";
$dbname="todo";

$conn=mysqli_connect($server,$user,$password,$dbname) or die("connection failed");

?>