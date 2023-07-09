<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>


    <?php

    
    require_once("config.php");
    require_once("header.php");


    $stm = $connection->prepare("SELECT * FROM student ORDER BY ID DESC");
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    // echo "<pre>";
    // print_r($result);
    // echo "</pre>";


    ?>



    <section class="form-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card mt-5">
                        <div class="card-body">
                            <h2>All Students</h2>
                            <a class="btn btn-success" href="index.php">Registration Here</a>
                            <?php if (isset($_REQUEST['success'])) : ?>
                                <div class="alert alert-success">
                                    <?php echo $_REQUEST['success']; ?>
                                </div>
                            <?php endif; ?>

                            <table class="table table-bordered">
                                <tr>
                                    <th>#</th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Roll</th>
                                    <th>Registration</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                <?php $i = 1;
                                foreach ($result as $row) : ?>
                                    <tr>
                                        <td><?php echo $row['id'];  ?></td>
                                        <td><?php echo $i;  ?></td>
                                        <td><?php echo $row['name'];  ?></td>
                                        <td><?php echo $row['roll'] ?></td>
                                        <td><?php echo $row['registration'] ?></td>
                                        <td><?php echo $row['phone'] ?></td>
                                        <td><?php
                                            if ($row['status'] == 1) {
                                                echo "<span class='badge bg-success'>Active</span>";
                                            } else {
                                                echo "<span class='badge bg-danger'>Inactive</span>";
                                            }
                                            // echo $row['status'] 
                                            ?></td>
                                        <td>
                                            <a class="btn btn-primary" href="single.php? id=<?php echo $row['id'] ?>">View</a>
                                            <a class="btn btn-warning" href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
                                            <a onclick="return confirm('Confirm Delete?')" class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
                                        </td>
                                    </tr>
                                <?php $i++;
                                endforeach; ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>








    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>