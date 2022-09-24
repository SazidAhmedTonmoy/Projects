<?php 
        include('partials/content.php');

        if(!isset($_SESSION['com_id'], $_SESSION['username2'], $_SESSION['role2'])){
           header("location:login.php");  
        } 

        if(isset($_GET['id'],$_GET['job_id'])){

           $id=$_GET['id'];
           $job_id=$_GET['job_id'];


           $sql="DELETE FROM apply_job_post WHERE id=$id AND job_id=$job_id AND com_id='$_SESSION[com_id]'";
           $result = mysqli_query($conn, $sql);

           if($result == true){
              $_SESSION['delete']="<div class='success'>Internship Application Deleted Successfully</div>";
              header('location:internship_application.php');
           }
           else{
              $_SESSION['delete']="<div class='error'>Failed to Delete Company Information</div>";
              header('location:internship_application.php');
           }
        }
        else
        {
           header('location:internship_application.php');
        }
?>