<?php 
include('parts/connection.php');

if(isset($_GET['id'])){

    $lecture_id = $_GET['id'];
    $sqlDelet = "DELETE FROM Instructors where instructor_id= '$instructor_id'";
    
    $deleted = $conn->query($sqlDelet);
    if($deleted){
        header('Location: instructors.php');
    }
}



?>