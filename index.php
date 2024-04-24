<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <title> To Do List</title>
</head>

<body>

    <h1 class="text-center py-4 my-4">To Do List </h1>
    <!-- <p>hello</p> -->

    <div class="w-50 m-auto">
        <form action="data.php" method="post" autocomplete="off">
            <div class="form-group">
                <label for="title">Title</label>
                <input class="form-control" type="text" name="title" id="title" placeholder="Add your Task here "
                    Required>
                <input type="hidden" name="formType" value="create">
            </div><br>
            <button class="btn btn-success">Add Task </button>

        </form>

    </div><br>
    <hr class="bg-dark w-50 m-auto">
    <div class="lists w-50 m-auto my-4 ">
        <h1>Your Lists</h1>
        <div id="">
            <table class="table table-dark table-hover  ">
                <thead>
                    <tr>
                        <th name="id" width="10%">S.no</th>
                        <th>ToDo List</th>
                        <th width="20%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // code for reading/retrive data from database
                    include 'database.php';
                    $sql = "SELECT * FROM todo";
                    $result = mysqli_query($conn, $sql);
                    $rowId = 1;
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $title = $row['title'];
                            ?>
                            <tr>
                                <td scope='row'><?php echo $rowId++ ?></td>
                                <td scope='row'><?php echo $title ?></td>
                                <td scope='row'>
                                    <!-- <form action="data.php" method="post"// <-ignore this>-->
                                    <form id="deleteForm" action="data.php" method="POST">
                                        <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
                                        <input type="hidden" name="formType" value="delete">
                                    </form>
                                    <a class="btn btn-success btn-sm text-end" href="edit.php?id=<?php echo $id ?>"
                                        role="button">Edit</a>
                                    <button type="submit" class="btn btn-danger btn-sm" role="button"
                                        form="deleteForm">Delete</a>
                                        
                                </td>

                            </tr>
                            <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
 <script src="js/jquery-3.7.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>

</html>