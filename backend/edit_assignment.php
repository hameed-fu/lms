<!DOCTYPE html>
<html lang="en">

<?php include ('parts/head.php') ?>


<?php
include ('parts/connection.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];
     
    $sql = "select * from assignments where assignment_id =  $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

}


if(isset($_POST['save'])){
    $instructor_id = $_POST['instructor_id'];
    $lecture_id = $_POST['lecture_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $due_date = $_POST['due_date'];

    
    $sql = "UPDATE  assignments set instructor_id = '$instructor_id',lecture_id  = '$lecture_id', title ='$tite', description = '$description',due_date = '$due_date'";
    $state = $conn->query($sql);
    if($state){
        //echo "record added successfully";
        header("Location: assignments.php");
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
                                <h4 class="card-title"> Eidt Student</h4>
                            
                                <form method="post" action="">
                                    <div class="form-group">
                                        <label for="name">instructor</label>
                                        <input type="text" value="<?php echo $row['instructor_id'] ?>" class="form-control" id="name" name="instructor_id">
                                         
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">lecture</label>
                                        <input type="text" value="<?php echo $row['lecture_id'] ?>" class="form-control" id="name" name="lecture_id">

                                    </div>
                    
                                    
                                    <div class="form-group">
                                        <label for="name">title</label>
                                        <input type="text" class="form-control" value="<?php echo $row['title'] ?>" id="phone" name="phone">
                                         
                                    </div>
                                    <div class="form-group">
                                        <label for="name">description</label>
                                        <input type="text" class="form-control" value="<?php echo $row['description'] ?>" id="phone" name="phone">
                                         
                                    </div>
                                    <div class="form-group">
                                        <label for="name"> due date</label>
                                        <input type="date" class="form-control" value="<?php echo $row['due_date'] ?>" id="phone" name="due_date">
                                         
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