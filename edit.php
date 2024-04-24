<?php
//  for error checking ->error_reporting(0);
    include 'database.php';

        $id = $_GET['id'];
        $sql = "SELECT * FROM todo where id='$id'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $title = $row['title'];
            }
        }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <title> To Do List </title>
</head>

<body>
    <h1 class="text-center py-4 my-4">ToDo'S List</h1>
<div class="w-50 m-auto">
    <form action="data.php" method="post" autocomplete="off">
      <div class="form-group">
        <label for="title">Update your Todo </label>
        <input class="form-control" type="text" name="title" id="title" value="<?php echo isset($title) ? $title : '' ?>" placeholder="Edit Here Your ToDo"
          Required>
          <input type="hidden" name="id" id="id" value="<?php echo isset($id) ? $id : '' ?>">
          <input type="hidden" name="formType" value="update">
      </div><br>
      <button class="btn btn-success">Submit Changes</button>
    </form>
</div>

    

    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
        