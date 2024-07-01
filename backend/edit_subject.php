<!DOCTYPE html>
<html lang="en">

<?php include ('parts/head.php') ?>


<?php
include ('parts/connection.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];
     
    $sql = "select * from subjects where subject_id =  $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

}


if(isset($_POST['save'])){

    $subject_id = $_POST['subject_id'];
    $title = $_POST['title'];
    $code = $_POST['code'];
    $description = $_POST['description'];
    $course_id = $_POST['course_id'];

    
    $sql = "UPDATE  subjects set subject_id = '$subject_id', title = '$title', code ='$code', description = '$description',course_id = '$course_id'";
PDATE  subjects set title = '$title', code ='$code', description = '$description',course_id =$course_id ";

    $state = $conn->query($sql);
    if($state){
        //echo "record added successfully";
        header("Location: subjects.php");
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

                                <h4 class="card-title"> Eidt Subject</h4>
                            
                                <form method="post" action="">
                                    <div class="form-group">
                                        <label for="name">Subject Id</label>
                                        <input type="text" value="<?php echo $row['subject_id'] ?>" class="form-control" id="name" name="subject_id">
                                         
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">title</label>
                                        <input type="text" value="<?php echo $row['title'] ?>" class="form-control" id="name" name="title">

                                    </div>
                    
                                    
                                    <div class="form-group">
                                </div>
                                    <div class="form-group">
                                        <label for="name">description</label>
                                        <input type="text" class="form-control" value="<?php echo $row['description'] ?>" id=" "name="description">
                                         
                                    </div>
                                    <div class="form-group">
                                        <label for="name"> due date</label>
                                        <input type="date" class="form-control" value="<?php echo $row['due_date'] ?>" id="" name="date">
                                         
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