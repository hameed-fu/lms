<!DOCTYPE html>
<html lang="en">

<?php include ('parts/head.php') ?>


<?php
include ('parts/connection.php');

if(isset($_POST['save'])){
    $assignment_id = $_POST['assignment_id'];
    $instructor_id = $_POST['instructor_id'];
    $lecture_id = $_POST['lecture_id'];
    $tittle = $_POST['tittle'];
    $description = $_POST['description'];
    $due_date = $_POST['due_date'];
    
    

    
    $sql = "INSERT INTO add_assingments(assignment_id,instructor_id, lecture_id,tittle,description,due_date) values('  $instructor_id',' $lecture_id',' $tittle',' $description','$due_date')";
    $state = $conn->query($sql);
    if($state){
        //echo "record added successfully";
        header("Location: courses.php");
    }
}

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

                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"></h4>
                            
                                <form method="post" action="">
                                <div class="form-group">
                                        <label for="name">Assignment id</label>
                                        <input type="text" class="form-control" id="name" name="assignment_id">
                                         
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Instructor id</label>
                                        <input type="text" class="form-control" id="name" name="Instructor_id">
                                         
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Lecture Id</label>
                                        <input type="text" class="form-control" id="name" name="Lecture_id">
                                         
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Tittle</label>
                                        <input type="text" class="form-control" id="name" name="tittle">
                                         
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Description</label>
                                        <textarea name="description" class="form-control"  id=""></textarea>
                                    </div>
                                   
                                   
                                    

                                    <div class="form-group">
                                        <label for="name"> Due Date</label>
                                        <input type="date" class="form-control" id="name" name="due_date">
                                         
                                    </div>
                    
                                    
                                    <button type="submit" name="save" class="btn btn-primary">Submit</button>
                                </form>
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
        Main wrapper endd
    ***********************************-->
    <?php include ('parts/footer.php') ?>
    <!--**********************************
        Scripts
    ***********************************-->
    <?php include ('parts/script.php') ?>

</body>

</html>