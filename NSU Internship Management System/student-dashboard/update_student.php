<?php
     include ("../database/database-connection.php");

     if(!isset($_SESSION['username1'], $_SESSION['role1'])){
           header("location:login.php");  
     } 
    
     if(isset($_POST['submit'])){
            $student_id = $_POST['id'];
            $firstname = $_POST['firstname'];
            $lastname  = $_POST['lastname'];
            $email    = $_POST['email'];
            $user_name = $_POST['username'];
            $idnumber  = $_POST['idnumber'];
            $mobilenumber = $_POST['mobilenumber'];
  
            $sql="UPDATE student_information SET first_name='$firstname', last_name='$lastname', 
                    email='$email', st_user_name='$user_name', st_id='$idnumber', st_number=' 
                   $mobilenumber' WHERE id='$student_id'";
  
            $res = mysqli_query($conn, $sql);
            if($res==true){
                $_SESSION['update'] = "<div class='success'>Student Information Updated Successfully.</div>";
                header('location:student_dashboard.php');
            }
            else{
                $_SESSION['update'] = "<div class='error'>Failed to Update Student Information.</div>";
                header('location:edit_profile.php');
            }
      }
?>