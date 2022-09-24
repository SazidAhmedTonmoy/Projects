<?php
    include ("database/database-connection.php");
     
    $id=mysqli_real_escape_string($conn,$_GET['id']);
    mysqli_query($conn,"update student_information set verification_status='1' where verification_id='$id'");
    header('location:student-dashboard/login.php'); 
?>

                          