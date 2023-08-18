<?php
session_start();
require('./dbconn.php');


?>
<?php include('include/header.php');
?>

<body>

    <div class="container">
        <?php include('./message.php') ?>
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Stduent details <a href="create-student.php" class="btn btn-primary float-end ">Add student </a></h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">NAME</th>
                                    <th scope="col">EMAIL</th>
                                    <th scope="col">PHONE</th>
                                    <th scope="col">COURSE</th>
                                    <th scope="col">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM student ";
                                $query_run = mysqli_query($con, $query);
                                if (mysqli_num_rows($query_run)) {
                                    foreach ($query_run as $student) {
                                ?>
                                        <tr>

                                            <td><?= $student['id'] ?></td>
                                            <td><?= $student['name'] ?></td>
                                            <td><?= $student['email'] ?></td>
                                            <td><?= $student['phone'] ?></td>
                                            <td><?= $student['course'] ?></td>
                                            <td>
                                                <a href="view-student.php?id=<?= $student['id'] ?>" class="btn btn-info btn-sm">View</a>
                                                <a href="edit-student.php?id=<?= $student['id'] ?>" class="btn btn-success btn-sm">Edit</a>

                                                <form action="code.php" method="POST" class="d-inline">
                                                    <button type="submit" name="delete_student" value="<?= $student['id'] ?>" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                        </tr>

                                <?php
                                    }
                                } else {
                                    echo "<h4> No record found here </h4>";
                                }

                                ?>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('include/footer.php'); ?>