<?php
     include ("../database/database-connection.php");
     $msg = "";
     if(isset($_SESSION['student_id'],$_SESSION['username1'], $_SESSION['role1'])){
           header("location:student_dashboard.php");  
     }  

    if(isset($_POST['submit'])){
           $username = $_POST['username'];
           $email    = $_POST['email'];
           $password = $_POST['password'];
           $userType = $_POST['userType'];

           $sql = "SELECT id, first_name, st_user_name, email,st_password,user_type,verification_status FROM student_information WHERE st_user_name=? AND email=? AND st_password=? AND user_type=? ";

           $stmt = $conn->prepare($sql);
           $stmt->bind_param("ssss", $username, $email, $password, $userType,);
           $stmt->execute();
           $result = $stmt->get_result();
           $row = $result->fetch_assoc();

            if($result->num_rows == 1 ){
           	          $verification_status = $row['verification_status'];
           	          if($verification_status == 0){
			          $msg="You have not confirmed your account yet.Please check your inbox and verify your email id.";
		              }
		              else{
		                   
                           $_SESSION['username1'] = $row['st_user_name'];
                           $_SESSION['role1'] = $row['user_type'];
                           $_SESSION['student_id'] = $row['id'];
                           $_SESSION['student_name'] = $row['first_name'];
                           
                           if($_SESSION['role1'] == 'student'){
                            header("location:student_dashboard.php");   
                           }
			          } 
			}              
            else{
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
							<h3 class="text-center">Student Login</h3>
                            <img src="images/logo/student-login.png" alt="user" height="100" width="100" class="rounded-circle mx-auto d-block">
							<div class="latestForm">
					
								<div class="form-group"> 
									<input type="text" name="username" id="userName" class="form-control" value="" required=""> 
									<label class="form-control-placeholder" for="userName">Username</label>
									<i class="fa fa-user-o iconSet" aria-hidden="true"></i>
								</div>

                                <div class="form-group"> 
                                    <input type="text" name="email" id="email" class="form-control" value="" required=""> 
                                    <label class="form-control-placeholder" for="email">Email</label>
                                    <i class="fa fa-envelope iconSet" aria-hidden="true"></i>
                                </div>
						
								<div class="form-group"> 
									<input type="password" name="password" id="password" class="form-control" value="" required=""> 
									<label class="form-control-placeholder" for="password">Password</label> 
									<i class="fa fa-lock iconSet" aria-hidden="true"></i>
								</div> 
							</div> 
                            <input type="hidden" id="userType" name="userType" value="student">
							<input type="submit" name="submit" class="btn btn-danger btn-block" id="login">
                            <p></p>
                                <div>
                                  <span id="msg">
                                             <?php
                                                  echo $msg;
                                             ?>
                                  </span>
                                </div>
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