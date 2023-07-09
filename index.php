
    <?php

    require_once("config.php");
    require_once("header.php");



    if (isset($_POST["submit_btn"])) {
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

            $statement = $connection->prepare("INSERT INTO student (name,roll,registration,phone,status)VALUES(?,?,?,?,?)");
            $result = $statement->execute(array($name, $roll, $registration, $phone, $status));
            // print_r($result);

            if ($result == true) {
                $success = "Data insert successful!";
            } else {
                $e = "Data insert failed!";
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
                            <h2>Registration Form</h2>
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
                                        <input type="text" class="form-control" name="name" id="name">

                                        <label for="roll" class="form-label">Roll</label>
                                        <input type="text" class="form-control" name="roll" id="roll">

                                        <label for="registration" class="form-label">Registration</label>
                                        <input type="text" class="form-control" name="registration" id="registration">

                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="text" class="form-control" name="phone" id="phone">

                                        <div class="mb-3">
                                            <label for="status" class="form-label">Status</label>
                                            <select class="form-select form-select-lg" name="status" id="status">
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <input class="btn btn-primary" name="submit_btn" type="submit" value="Submit">
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