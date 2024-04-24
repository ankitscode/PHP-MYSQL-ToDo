<?php


include "database.php";

if ($conn) {
    echo "connection successfull";

} else {

    echo "connection failed";
    die;
}
// print_r($_POST);
// echo"<br>";
// var_dump($_POST);
// die();  


if (isset($_POST['formType']) && $_POST['formType'] == 'create') {

    create($conn);

} elseif (isset($_POST['formType']) && $_POST['formType'] == 'update') {

    update($conn);

} elseif (isset($_POST['formType']) && $_POST['formType'] == 'delete') {

    delete($conn);
}

function create($conn)
{
    mysqli_select_db($conn, 'todo');
    $title = $_POST['title'];

    $query = "insert into todo (title) values ('$title')";

    mysqli_query($conn, $query);

    mysqli_close($conn);

    header('location:index.php');
    exit;

}

function update($conn)
{
    mysqli_select_db($conn, 'todo');
    $title = $_POST['title'];
    $id = $_POST['id'];


    $sql = "UPDATE todo SET title='$title' WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    mysqli_close($conn);
    header("location:index.php");
    exit;

}

function delete($conn)
{
    mysqli_select_db($conn, 'todo');
    $id = $_POST['id'];

    $sql = "DELETE FROM todo WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    header("location:index.php");
    exit;

}
//   echo update($conn);
//   echo delete($conn);
//   echo create($conn);

mysqli_close($conn);








/*$form_type = $_POST['fromType'];

if($form_type == 'editForm'){
  
}*/






?>