<?php
     include ("../database/database-connection.php");

     if(isset($_SESSION['username4'], $_SESSION['role4'])){
           header("location:admin_dashboard.php");  
     }  
      
     $msg = "";

     if(isset($_POST['submit'])){
           $username = $_POST['username'];
           $password = $_POST['password'];
           $userType = $_POST['userType'];

           $sql = "SELECT * FROM admin WHERE username=? AND password=? AND user_type=? ";

           $stmt = $conn->prepare($sql);
           $stmt->bind_param("sss", $username,$password, $userType);
           $stmt->execute();
           $result = $stmt->get_result();
           $row = $result->fetch_assoc();

           if($result->num_rows == 1 ){

             session_regenerate_id();
             $_SESSION['username4'] = $row['username'];
             $_SESSION['role4'] = $row['user_type'];
             session_write_close();

             if($_SESSION['role4'] == 'admin'){
                header("location:admin_dashboard.php");   
             }       
           }  
           else
           {
              $msg ="*Please enter valid information";
           }
     }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>NSU Internship Management System</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="assets/bootstrap/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500;600;700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="admin-style/admin_login.css">
</head>
<body>
        <section class="loginForm">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 mx-auto">
                      <div class="card m-4">
                          <div class="card-body bg-light text-center">
                               <form method="post">
                            <h3 class="text-center">Admin Login</h3>
                            <img src="images/logo/admin-login.jpg" alt="user" height="100" width="100" class="rounded-circle mx-auto d-block">
                            <div class="latestForm">
                    
                                <div class="form-group"> 
                                    <input type="text" name="username" id="userName" class="form-control" value="" required> 
                                    <label class="form-control-placeholder" for="userName">Username</label>
                                    <i class="fa fa-user-o iconSet" aria-hidden="true"></i>
                                </div>
                        
                                <div class="form-group"> 
                                    <input type="password" name="password" id="password" class="form-control" value="" required> 
                                    <label class="form-control-placeholder" for="password">Password</label> 
                                    <i class="fa fa-lock iconSet" aria-hidden="true"></i>
                                </div> 
                            </div> 
                    
                            <input type="hidden" id="userType" name="userType" value="admin">
                            <input type="submit" name="submit" class="btn btn-danger btn-block" id="login">
                            <p><?php echo $msg; ?></p>
                               </form>
                          </div>    
                       </div>       
                    </div>
                </div>
            </div>
        </section>

        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>