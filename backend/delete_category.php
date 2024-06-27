<?php 
include('parts/connection.php');

if(isset($_GET['id'])){

    $course_id = $_GET['id'];
    $sqlDelet = "DELETE FROM categories where category_id= '$category_id'";
    
    $deleted = $conn->query($sqlDelet);
    if($deleted){
        header('Location: categories.php');
    }
}



?>