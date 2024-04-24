<?php
// seprate code of delete query for understanding

include "database.php";
$id=$_GET['id'];

$sql="delete from todo where id=$id";

$result=mysqli_query($conn,$sql);

header("location:index.php");

?>