<!DOCTYPE html>
<html lang="en">

<?php include ('parts/head.php') ?>


<?php
include ('parts/connection.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];
     
    $sql = "select * from notifications where notification_id =  $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

}


if(isset($_POST['save'])){
    $user_id = $_POST['user_id'];
    $course_id = $_POST['course_id'];
    $message = $_POST['message'];
    $date_created = $_POST['date_created'];

    
    $sql = "UPDATE  notifications set user_id = '$user_id', course_id = '$course_id', message ='$message', date_created = '$date_created' where notification_id = $user_id";
    $state = $conn->query($sql);
    if($state){
        //echo "record added successfully";
        header("Location: notifications.php");
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
                                <h4 class="card-title">Update Instructor</h4>
                            
                                <form method="post" action="">
                                    <div class="form-group">
                                        <label for="name">User Id</label>
                                        <input type="text" value="<?php echo $row['user_id'] ?>" class="form-control" id="name" name="user_id">
                                         
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="name">Message</label>
                                        <input type="text" value="<?php echo $row['message'] ?>" class="form-control" id="name" name="message">
                                         
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="name">Date Created</label>
                                        <input type="date" class="form-control" value="<?php echo $row['date_created'] ?>" id="phone" name="date_created">
                                         
                                    </div>
                                    <input type="hidden" value="<?php echo $row['course_id'] ?>" name="course_id">
                                   
                                    
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