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

    $id = $_REQUEST['id'];

    if (isset($_POST["update_btn"])) {
        $name = $_POST["name"];
        $roll = $_POST["roll"];
        $registration = $_POST["registration"];
        $phone = $_POST["phone"];
        $status = $_POST["status"];

        if (empty($name)) {
            $e = "Name is required";
        } elseif (empty($roll)) {
            $e = "Roll is required";
        } else {
            // $success = "Form submit Successful!";

            $statement = $connection->prepare("UPDATE student set name=?,roll=?,registration=?,phone=?,status=? WHERE id=?");
            $result = $statement->execute(array($name, $roll, $registration, $phone, $status, $id));
            // print_r($result);

            if ($result == true) {
                $success = "Data update successfully!";
                header('location:view.php?success=Data Update Successful!');
            } else {
                $e = "Data update failed!";
            }
        }
    }



    ?>



    <section class="form-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card mt-5">
                        <div class="card-body">
                            <h2>Update Data</h2>

                            <?php
                            $stm = $connection->prepare("SELECT * FROM student WHERE id=?");
                            $stm->execute(array($id));
                            $result = $stm->fetch(PDO::FETCH_ASSOC);
                            // print_r($result);
                            // $new = 'ji';
                            ?>


                            <?php if (isset($e)) : ?>
                                <div class="alert alert-danger">
                                    <?php echo $e; ?>
                                </div>
                            <?php endif; ?>
                            <?php if (isset($success)) : ?>
                                <div class="alert alert-success">
                                    <?php echo $success; ?>
                                <?php endif; ?>
                                </div>
                                <hr>
                                <div class="mb-3 p-5">
                                    <form action="" method="POST">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name" id="name" value="<?php echo $result['name'] ?>">

                                        <label for="roll" class="form-label">Roll</label>
                                        <input type="text" class="form-control" name="roll" id="roll" value="<?php echo $result['roll'] ?>">

                                        <label for="registration" class="form-label">Registration</label>
                                        <input type="text" class="form-control" name="registration" id="registration" value="<?php echo $result['registration'] ?>">

                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="text" class="form-control" name="phone" id="phone" value="<?php echo $result['phone'] ?>">

                                        <div class="mb-3">
                                            <label for="status" class="form-label">Status</label>
                                            <select class="form-select form-select-lg" name="status" id="status">
                                                <option <?php if ($result['status'] == 1) {
                                                            echo "Selected";
                                                        } ?> value="1">Active</option>
                                                <option <?php if ($result['status'] == 0) {
                                                            echo "Selected";
                                                        } ?> value="0">Inactive</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <input class="btn btn-primary" name="update_btn" type="submit" value="Update">
                                        </div>
                                    </form>

                                </div>
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