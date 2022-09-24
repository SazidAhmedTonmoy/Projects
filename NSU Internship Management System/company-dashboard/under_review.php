<?php
     include('partials/content.php');
     if(!isset($_SESSION['com_id'], $_SESSION['username2'], $_SESSION['role2'])){
           header("location:login.php");  
     } 

     $sql = "SELECT * FROM apply_job_post WHERE com_id='$_SESSION[com_id]' AND id='$_GET[id]' AND job_id='$_GET[job_id]'";
     $result = $conn->query($sql);
     
     if($result->num_rows == 0){
          header("Location: internship_application.php");
     }


     $sql = "UPDATE apply_job_post SET status='2' WHERE com_id='$_SESSION[com_id]' AND id='$_GET[id]' AND job_id='$_GET[job_id]'";

     if($conn->query($sql) === TRUE) {
	    header("Location:internship_application.php");
     }
?>