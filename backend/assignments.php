<?php 

session_start();

if(!isset($_SESSION['user_id'])){
    header('Location: login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<?php include ('parts/head.php') ?>


<?php
include ('parts/connection.php');

// select data from categories table
$sql = "SELECT assignments.*, instructors.first_name as InstructorFirstName,instructors.last_name as InstructorLastName, lectures.title as LectureTitle FROM assignments
join instructors on instructors.instructor_id = assignments.instructor_id
join lectures on lectures.lecture_id = assignments.lecture_id
";

// runt the above query
$result = $conn->query($sql);

?>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo">
                <a href="index.html">
                    <b class="logo-abbr"><img src="images/logo.png" alt=""> </b>
                    <span class="logo-compact"><img src="./images/logo-compact.png" alt=""></span>
                    <span class="brand-title">
                        <img src="images/logo-text.png" alt="">
                    </span>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <?php

        include ('parts/header.php')
            ?>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <?php
        include ('parts/sidebar.php');
        ?>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="container-fluid mt-3">

                <div class="row">
                    <div class="col-12">
                        <a href="add_assignment.php" class="btn btn-primary mb-1">Add Assigment</a>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Assignments</h4>
                                <table class="table table-hover table-striped">
                                    <tr>
                                        <th>Instructor</th>
                                        <th>Lecture</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Due Date</th>
                                        <th>Assignments</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php while ($row = $result->fetch_assoc()) { ?>

                                        <tr>
                                            <td><?php echo $row['InstructorFirstName'] ?>
                                                <?php echo $row['InstructorLastName'] ?></td>
                                            <td><?php echo $row['LectureTitle'] ?></td>
                                            <td><?php echo $row['title'] ?></td>
                                            <td><?php echo $row['description'] ?></td>
                                            <td><?php echo $row['due_date'] ?></td>


                                            <td>
                                                <a class="btn btn-primary text-white">View</a>
                                            </td>

                                            <td>
                                                <a href="edit_assignment.php?id=<?php echo $row['assignment_id'] ?>"   class="btn btn-warning text-white">Edit</a>
                                                <a href="delete_assignment.php?id=<?php echo $row['assignment_id'] ?>"
                                                    class="btn btn-danger text-white">Delete</a>

                                            </td>
                                        </tr>

                                    <?php } ?>


                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->

        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->
    <?php include ('parts/footer.php') ?>
    <!--**********************************
        Scripts
    ***********************************-->
    <?php include ('parts/script.php') ?>

</body>

</html>