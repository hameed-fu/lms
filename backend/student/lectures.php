<?php
include 'session_check.php';
check_user_role("student");
?>
<!DOCTYPE html>
<html lang="en">

<?php
include('parts/connection.php');
include('parts/head.php');
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

    include('parts/header.php')
    ?>
    <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

    <!--**********************************
            Sidebar start
        ***********************************-->
    <?php
    include('parts/sidebar.php');
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
          <div class="col-md-3">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Lectures</h5><br>
                <ul class="nav flex-column">
                  <?php
                  $subject_id = $_GET['subject_id'];
                  $sql = "SELECT * FROM lectures WHERE subject_id = '$subject_id'";
                  $result = $conn->query($sql);

                  while ($row = $result->fetch_assoc()) { ?>
                    <li class="nav-item">
                      <a class="nav-link" href="?subject_id=<?php echo $row['subject_id'] ?>&lecture_id=<?php echo $row['lecture_id'] ?>"><?php echo $row['title'] ?></a>
                    </li>
                  <?php } ?>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-9">
            <div class="content">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Lecture Details</h5><br>
                  <?php
                  if (isset($_GET['lecture_id'])) {
                    $lecture_id = $_GET['lecture_id'];
                    $l_sql = "SELECT * FROM lectures WHERE subject_id = '$subject_id' and lecture_id = '$lecture_id'";
                    $l_result = $conn->query($l_sql);
                    $l_row = $l_result->fetch_assoc();
                    $content_URL = $l_row['content_URL'];

                    if (strpos($content_URL, 'youtube.com') !== false || strpos($content_URL, 'youtu.be') !== false) {
                      preg_match('/v=([^\&\?\/]+)/', $content_URL, $matches);
                      $video_id = isset($matches[1]) ? $matches[1] : null;

                      if (!$video_id) {
                        preg_match('/youtu\.be\/([^\?\/]+)/', $content_URL, $matches);
                        $video_id = isset($matches[1]) ? $matches[1] : null;
                      }

                      if ($video_id) {
                        echo "<iframe class='w-100' width='560' height='315' src='https://www.youtube.com/embed/" . htmlspecialchars($video_id, ENT_QUOTES, 'UTF-8') . "' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>";
                      } else {
                        echo "Invalid YouTube link.";
                      }
                    } elseif (preg_match('/\.(mp4|avi|mov)$/i', $content_URL)) {
                      echo "<video class='w-100' controls>
                            <source src='" . htmlspecialchars($content_URL, ENT_QUOTES, 'UTF-8') . "' type='video/mp4'>
                            Your browser does not support the video tag.
                          </video>";
                    } else {
                      echo "Download Lecture: <a class='text-info' target='_blank' href='" . htmlspecialchars($content_URL, ENT_QUOTES, 'UTF-8') . "' download>". $content_URL ."</a>";
                    }
                  } else {
                    echo "Please select a lecture";
                  }
                  ?>
                </div>
              </div>
              <?php if(isset($_GET['lecture_id'])) { ?>
              <div class="card">
                <div class="card-body">
                  <div class="default-tab">
                    <ul class="nav nav-tabs mb-3" role="tablist">
                      <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#home">Comments</a>
                      </li>
                      <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#profile">Assignments</a>
                      </li>
                    </ul>
                    <div class="tab-content">
                      <div class="tab-pane fade show active" id="home" role="tabpanel">
                        <div class="p-t-15">
                          <?php
                          $id = $_GET['lecture_id'];
                          $c_sql = "SELECT * FROM comments WHERE lecture_id = '$id'";
                          $c_result = $conn->query($c_sql);
                          while ($c_row = $c_result->fetch_assoc()) { ?>
                            <h4><?php echo $c_row['comments'] ?></h4>
                            <p class="text-grey"><?php echo $c_row['created_at'] ?></p>
                          <?php } ?>
                          <hr>
                          <form action="" method="post" class="">
                            <textarea name="comments" class="form-control" id="" placeholder="Comments"></textarea>
                            <input type="hidden" name="lecture_id" value="<?php echo $_GET['lecture_id'] ?>">
                            <input type="submit" class="btn btn-warning my-2 mx-auto" value="Add Comment" name="add_comment">
                          </form>
                        </div>
                      </div>
                      <div class="tab-pane fade" id="profile">
                        <div class="p-t-15">
                          Assignments work.
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php } ?>
            </div>

          </div>
        </div>
      </div>
      <!-- #/ container -->
    </div>
  </div>
  <!--**********************************
        Main wrapper end
    ***********************************-->
  <?php include('parts/footer.php') ?>
  <!--**********************************
        Scripts
    ***********************************-->
  <?php include('parts/script.php') ?>

</body>

</html>

<?php
if (isset($_POST['add_comment'])) {
  $comments = $_POST['comments'];
  $lecture_id = $_POST['lecture_id'];
  $user_id = $_SESSION['id'];
  $sql = "INSERT INTO comments (user_id, lecture_id, comments) VALUES ('$user_id', '$lecture_id', '$comments')";
  $state = $conn->query($sql);
  echo "<script> window.location.href = window.location.href </script>";
}
?>