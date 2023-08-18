<?php
session_start();
require('./dbconn.php');
?>

<?php include('include/header.php'); ?>

<body>
    <div class="container mt-5">
        <?php include('message.php'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Student Record
                            <a href="index.php" class="btn btn-danger float-end ">BACK</a>
                        </h4>

                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_GET['id'])) {
                            $student_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM student WHERE id='$student_id'";
                            $query_run = mysqli_query($con, $query);
                            if (mysqli_num_rows($query_run) > 0) {
                                $student = mysqli_fetch_array($query_run);
                        ?>
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="student_id" value="<?= $student['id'] ?>">
                                    <div class="mb-3">
                                        <label for="">Student Name</label>
                                        <input type="text" value="<?= $student['name'] ?>" name="name" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Student Email</label>
                                        <input type="text" value="<?= $student['email'] ?>" name="email" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Student Phone</label>
                                        <input type="text" value="<?= $student['phone'] ?>" name="phone" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Student Course</label>
                                        <input type="text" name="course" value="<?= $student['course'] ?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary" name="update_student">Save Student</button>
                                    </div>
                                </form>
                        <?php
                            } else {
                                echo "No record against this id ";
                            }
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('include/footer.php'); ?>