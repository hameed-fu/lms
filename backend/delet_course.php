<?php 
include('parts/connection.php');

if(isset($_GET['id'])){

    $subject_id = $_GET['id'];
    $sqlDelet = "DELETE FROM subjects where subject_id= '$category_id'";
    
    $deleted = $conn->query($sqlDelet);
    if($deleted){
        header('Location: course.php');
    }
}



?>