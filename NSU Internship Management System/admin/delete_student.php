<?php 
        include('partials/content.php'); 

        if(isset($_GET['id']) AND isset($_GET['st_id'])){

           $id = $_GET['id'];
           $st_id = $_GET['st_id'];

           $sql = "DELETE FROM student_information WHERE id=$id AND st_id=$st_id";
           $result = mysqli_query($conn, $sql);

           if($result == true){
              $_SESSION['delete'] = "<div class='success'>Student Information Deleted Successfully</div>";
              header('location:manage_student.php');
           }
           else{
              $_SESSION['delete']="<div class='error'>Failed to Delete Student Information</div>";
              header('location:manage_student.php');
           }
        }
        else
        {
           header('location:manage_student.php');
        }
?>