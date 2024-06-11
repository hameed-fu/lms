<!DOCTYPE html>
<html lang="en">

<?php include ('parts/head.php') ?>

<body>

    <!--*******************
        Preloader start
    ********************-->
   
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
                        <a href="add_instructor.php" class="btn btn-primary mb-1">Comments Seassion</a>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"></h4>
                                 <table class="table table-hover table-striped">
                                    <tr>
                                        <th colspan="4">Comments are allow in Student and Instructor</th>
                                        
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Student Comment are Here</td>
                                        <td>Realated to topic </td>
                                        <td>
                                            
                                            <a class="btn btn-danger text-white">ADD Comment</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Instructor Replay</td>
                                        <td>Realated to Comment</td>
                                        <td>
                                           
                                            <a class="btn btn-danger text-white">Delete Comment</a>
                                        </td>
                                    </tr>
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