<?php 
        include('partials/content.php'); 

        if(isset($_GET['id'])){

           $id = $_GET['id'];

           $sql = "DELETE FROM faculty_information WHERE id=$id";
           $result = mysqli_query($conn, $sql);

           if($result == true){
              $_SESSION['delete'] = "<div class='success'>Faculty Information Deleted Successfully</div>";
              header('location:manage_faculty.php');
           }
           else{
              $_SESSION['delete']="<div class='error'>Failed to Delete Faculty Information</div>";
              header('location:manage_faculty.php');
           }
        }
        else
        {
           header('location:manage_faculty.php');
        }
?>