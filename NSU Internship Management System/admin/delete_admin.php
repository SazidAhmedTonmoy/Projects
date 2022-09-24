<?php 
        include('partials/content.php'); 

        if(isset($_GET['id'])){

           $id = $_GET['id'];

           $sql = "DELETE FROM admin WHERE id=$id";
           $result = mysqli_query($conn, $sql);

           if($result == true){
              $_SESSION['delete'] = "<div class='success'>Admin Information Deleted Successfully</div>";
              header('location:manage_admin.php');
           }
           else{
              $_SESSION['delete']="<div class='error'>Failed to Delete Admin Information</div>";
              header('location:manage_admin.php');
           }
        }
        else
        {
           header('location:manage_admin.php');
        }
?>