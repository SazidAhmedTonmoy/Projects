<?php 
        include('partials/content.php'); 

        if(isset($_GET['id'])){

           $id = $_GET['id'];

           $sql = "DELETE FROM company_information WHERE id=$id";
           $result = mysqli_query($conn, $sql);

           if($result == true){
              $_SESSION['delete'] = "<div class='success'>Company Information Deleted Successfully</div>";
              header('location:manage_company.php');
           }
           else{
              $_SESSION['delete']="<div class='error'>Failed to Delete Company Information</div>";
              header('location:manage_company.php');
           }
        }
        else
        {
           header('location:manage_company.php');
        }
?>