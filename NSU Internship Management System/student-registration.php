<?php
     include ("database/database-connection.php");
     $msg="";
     if(isset($_SESSION['username1'], $_SESSION['role1'])){
           header("location:student-dashboard.php");  
     }
     if(isset($_POST['submit'])){
            $firstname=$_POST['firstname'];
            $lastname=$_POST['lastname'];
            $email=$_POST['email'];
            $user_name=$_POST['username'];
            $idnumber=$_POST['idnumber'];
            $mobilenumber=$_POST['mobilenumber'];
            $skill=$_POST['skill'];
            $password = $_POST['password'];
            $conpassword = $_POST['conpassword'];
            $userType=$_POST['userType'];

            if($password==$conpassword){
               $sql="SELECT * FROM student_information WHERE email='$email'";
               $stmt=$conn->prepare($sql);
               $result=mysqli_query($conn, $sql);

                if($result->num_rows==0){ 

                  $uploadOk=true;
                  $folder_directory="upload/resume/";
                  $base=basename($_FILES['resume']['name']); 
                  $resumeFileType=pathinfo($base, PATHINFO_EXTENSION); 
                  $file = uniqid() . "." . $resumeFileType;   
                  $filename=$folder_directory.$file;  

                   if(file_exists($_FILES['resume']['tmp_name'])){ 
                     if($resumeFileType=="pdf"){
                       if($_FILES['resume']['size']<2000000){ 
                        move_uploaded_file($_FILES["resume"]["tmp_name"], $filename);
                       } 
                       else{
                          $_SESSION['uploadError'] = "Wrong Size. Max Size Allowed : 20MB";
                          $uploadOk = false;
                       }
                     } 
                     else {
                          $_SESSION['uploadError'] = "Wrong Format. Only PDF Allowed";
                          $uploadOk = false;
                     }
                   } 
                   else{
                        $_SESSION['uploadError']="Something Went Wrong.File Not Uploaded.Try Again.";
                        $uploadOk = false;
                    }  
                   $verification_id=rand(111111111,999999999);
                   $num = 0;  
                   $sql="INSERT INTO student_information(first_name,last_name,email,st_user_name,
                         user_type,st_id,skill,st_number,resume,verification_status,verification_id,st_password,st_confirm_password)VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
                   $stmt=$conn->prepare($sql);
                   $stmt->bind_param("sssssssssiiss",$firstname,$lastname,$email,$user_name,$userType,$idnumber,$skill,$mobilenumber,$file,$num,$verification_id,$password,$conpassword);
                   $stmt->execute();
                   $result = $stmt->get_result();
                   $msg="We've just sent a verification link to <strong>$email</strong>. Please check your inbox and click on the link to get started. If you can't find this email,which could be due to spam filters";
                   $mailHtml="Please confirm your account registration by clicking the button or link below: <a href='http://localhost/NSU-Internship/student_checkin.php?id=$verification_id'>http://localhost/NSU-Internship/student_checkin.php?id=$verification_id</a>";
                    smtp_mailer($email,'Account Verification',$mailHtml);   
                   } 
                else{
                    echo "<script>alert('Woops!Email Already Exists.')</script>";
                }
            } 
            else{
                echo "<script>alert('Password Not Matched.')</script>";
            }
      }
      function smtp_mailer($to,$subject, $msg){
         include('smtp/PHPMailerAutoload.php');
         $mail=new PHPMailer(true);
         $mail->isSMTP();
         $mail->Host="smtp.gmail.com";
         $mail->Port=587;
         $mail->SMTPSecure="tls";
         $mail->SMTPAuth=true;
         $mail->Username="moshiur.sumon.neil@gmail.com";
         $mail->Password="znjsxzxtassrldqc";
         $mail->SetFrom("moshiur.sumon.neil@gmail.com");
         $mail->addAddress($to);
         $mail->IsHTML(true);
         $mail->Subject=$subject;
         $mail->Body=$msg;
         $mail->SMTPOptions=array('ssl'=>array(
            'verify_peer'=>false,
            'verify_peer_name'=>false,
            'allow_self_signed'=>false
         ));  
         $mail->send();   
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
    <link rel="stylesheet" type="text/css" href="assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
         #msg{
             color: #45a484;
             font-size: 20px;
             font-weight: 500;
         }
    </style>
</head>
<body>     
    <header id="header">
      <nav class="navbar navbar-expand-lg navbar-light">
         <div class="container-fluid">
             <a class="navbar-brand" href="index.html">
                <img src="images/logo/Logo.png" class="w-100 main-logo" alt="Logo" title="Logo" />
             </a>
             <button class="navbar-toggler" type="button" data-toggle="collapse"data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
             </button>

             <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about-us.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact-us.php">Contact</a>
                    </li>
                    </ul>
                    <ul class="navbar-nav navbar-right">
                      <li>
                         <div class="btn-group">
                              <button type="button" class="btn btn-danger">Login   </button>
                               <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               <span class="sr-only">Toggle Dropdown</span></button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="student-dashboard/login.php">Student Login</a>
                            <a class="dropdown-item" href="company-dashboard/login.php">Company Login</a>
                            <a class="dropdown-item" href="admin/login.php">Admin Login</a>
                           </div>
                        </div>
                        </li>
                        <li>
                           <div class="btn-group">
                               <button type="button" class="btn btn-danger">Registration</button>
                               <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               <span class="sr-only">Toggle Dropdown</span></button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="student-registration.php">Student Registration</a>
                                <a class="dropdown-item" href="company-registration.php">Company Registration</a>
                            </div>
                        </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <section class="loginForm">
	    <div class="container">
		  <div class="row">
			 <div class="col-sm-12 mx-auto">	
				<form method="post" id="frm" enctype="multipart/form-data">
                    <h3 class="text-center">Student Registration</h3>
                    <img src="images/logo/registration.png" alt="user" height="100" width="100" class="rounded-circle mx-auto d-block">					
					<div class="col-sm-6 mx-auto latestForm" style="float: left;">
					    <div class="form-group"> 
						  <input type="text" name="firstname" id="firstName" class="form-control" value="" required> 
						  <label class="form-control-placeholder" for="firstName">First Name</label>
						  <i class="fa fa-user-o iconSet" aria-hidden="true"></i>
					    </div>
						<div class="form-group"> 
							<input type="text" name="email" id="email" class="form-control" value="" required> 
							<label class="form-control-placeholder" for="email">E-mail Address</label>
							<i class="fa fa-envelope-o iconSet" aria-hidden="true"></i>
						</div>
                        <div class="form-group"> 
                            <input type="text" name="idnumber" id="idnumber" class="form-control" value="" required> 
                            <label class="form-control-placeholder" for="idnumberr">Studnet Id</label>
                            <i class="fa fa-id-card iconSet" aria-hidden="true"></i>
                        </div>
                         <div class="form-group"> 
                            <input type="password" name="password" id="password" class="form-control" value="" required> 
                            <label class="form-control-placeholder" for="password">Password</label> 
                            <i class="fa fa-lock iconSet" aria-hidden="true"></i>
                        </div> 
                         <div class="form-group "> 
                            <h5>Upload/Change Resume:</h5><input type="file" name="resume" class="btn btn-default" id="resume" class="form-control" value="" required> 
                        </div>
					</div> 
                    <div class="col-sm-6 mx-auto latestForm" style="float: right;">
                        <div class="form-group"> 
                            <input type="text" name="lastname" id="lastName" class="form-control" value="" required> 
                            <label class="form-control-placeholder" for="lastName">Last Name</label>
                            <i class="fa fa-user-o iconSet" aria-hidden="true"></i>
                        </div>                   
                        <div class="form-group"> 
                            <input type="text" name="username" id="userName" class="form-control" value="" required> 
                            <label class="form-control-placeholder" for="userName">Username</label>
                            <i class="fa fa-user-o iconSet" aria-hidden="true"></i>
                        </div>
                        <div class="form-group"> 
                            <input type="text" name="mobilenumber" id="mobilenumber" class="form-control" value="" required> 
                            <label class="form-control-placeholder" for="mobilenumber">Mobile Number</label>
                            <i class="fa fa-phone iconSet" aria-hidden="true"></i>
                        </div>                             
                        <div class="form-group"> 
                            <input type="password" name="conpassword" id="conpwd" class="form-control" value="" required> 
                            <label class="form-control-placeholder" for="conpwd">Confirm Password</label> 
                            <i class="fa fa-lock iconSet" aria-hidden="true"></i>
                        </div> 
                         <div class="form-group"> 
                            <input type="text" name="skill" id="skill" class="form-control" value="" required> 
                            <label class="form-control-placeholder" for="skill">Skill</label>
                            <i class="fa fa-user-o iconSet" aria-hidden="true"></i>
                        </div>
                    </div>
                    <input type="hidden" id="userType" name="userType" value="student">
					<input type="submit" name="submit" class="btn btn-danger btn-block mb-4" value="Registration">
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
    </section>

   <?php 
          include("footer/footer.php");
    ?>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>
