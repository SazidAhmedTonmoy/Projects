<?php
     include ("../database/database-connection.php");

     if(!isset($_SESSION['username2'], $_SESSION['role2'])){
           header("location:company_dashboard.php");  
     } 
    
     if(isset($_POST['submit'])){
            $com_id = $_POST['id'];
            $company_name = $_POST['company_name'];
            $com_reg_num  = $_POST['com_reg_num'];
            $email    = $_POST['email'];
            $com_user_name = $_POST['com_user_name'];
            $registered_address  = $_POST['registered_address'];
            $mobilenumber = $_POST['mobilenumber'];
  
            $sql="UPDATE company_information SET com_name='$company_name',com_reg_num='$com_reg_num', email='$email', com_user_name='$com_user_name', com_reg_address='$registered_address', com_number='$mobilenumber' WHERE com_id='$com_id'";
  
            $res = mysqli_query($conn, $sql);
            if($res==true){
                $_SESSION['update'] = "<div class='success'>Company Information Updated Successfully.</div>";
                header('location:company_dashboard.php');
            }
            else{
                $_SESSION['update'] = "<div class='error'>Failed to Update Company Information.</div>";
                header('location:company_dashboard.php');
            }
      }
?>