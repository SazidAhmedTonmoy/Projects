<?php
      include('partials/content.php');
      if(! isset($_SESSION['student_id'],$_SESSION['username1'], $_SESSION['role1'])){
           header("location:login.php");  
      } 
?>
<!DOCTYPE html>
<html>
<head>
    <title>NSU Internship Management System</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="assets/bootstrap/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500;600;700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<body style="background-color: lightsalmon";>
  <div class="main-content bg-white">
   <div class="wrapper">
    <section class="loginForm">
      <div class="container">
      <div class="row">
       <div class="col-sm-12 mx-auto">  
        <form action="update_student.php" method="post" enctype="multipart/form-data">
                  <?php 
                        $sql = "SELECT * FROM student_information WHERE id='$_SESSION[student_id]'";
                        $result = $conn->query($sql);

                        if($result->num_rows == 1 ) {
                           while($row = $result->fetch_assoc()) {
                   ?>
                    <h3 class="text-center">My Profile</h3>
          
          <div class="col-sm-6 mx-auto latestForm" style="float: left;">     
            <div class="form-group"> 
              <input type="text" name="firstname" id="firstName" class="form-control" value="<?php echo $row['first_name']; ?>" required> 
              <label class="form-control-placeholder" for="firstName">First Name</label>
              <i class="fa fa-user-o iconSet" aria-hidden="true"></i>
            </div>
          
            <div class="form-group"> 
              <input type="email" name="email" id="email" class="form-control" value="<?php echo $row['email']; ?>" required> 
              <label class="form-control-placeholder" for="email">E-mail Address</label>
              <i class="fa fa-envelope-o iconSet" aria-hidden="true"></i>
            </div>

            <div class="form-group"> 
                <input type="text" name="idnumber" id="idnumber" class="form-control" value="<?php echo $row['st_id']; ?>" required> 
                <label class="form-control-placeholder" for="idnumberr">Studnet Id</label>
                <i class="fa fa-id-card iconSet" aria-hidden="true"></i>
                </div>
                <div class="form-group "> 
                    <h5>Upload/Change Resume:</h5><input type="file" name="resume" class="btn btn-default" id="resume" class="form-control" value="" required> 
                </div>
             </div> 

                    <div class="col-sm-6 mx-auto latestForm" style="float: right;">

                        <div class="form-group"> 
                            <input type="text" name="lastname" id="lastName" class="form-control" value="<?php echo $row['last_name']; ?>" required> 
                            <label class="form-control-placeholder" for="lastName">Last Name</label>
                            <i class="fa fa-user-o iconSet" aria-hidden="true"></i>
                        </div>
                    
                        <div class="form-group"> 
                            <input type="text" name="username" id="userName" class="form-control" value="<?php echo $row['st_user_name']; ?>" required> 
                            <label class="form-control-placeholder" for="userName">Username</label>
                            <i class="fa fa-user-o iconSet" aria-hidden="true"></i>
                        </div>


                        <div class="form-group"> 
                            <input type="text" name="mobilenumber" id="mobilenumber" class="form-control" value="<?php echo $row['st_number']; ?>" required> 
                            <label class="form-control-placeholder" for="mobilenumber">Mobile Number</label>
                            <i class="fa fa-phone iconSet" aria-hidden="true"></i>
                        </div>
                        <div class="form-group"> 
                            <input type="text" name="skill" id="skill" class="form-control" value="<?php echo $row['skill']; ?>" required> 
                            <label class="form-control-placeholder" for="skill">Skill</label>
                            <i class="fa fa-user-o iconSet" aria-hidden="true"></i>
                        </div>
                    </div>
                    <input type="hidden" id="userType" name="userType" value="student">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <input type="submit" name="submit" class="btn btn-danger btn-block mb-4" id="register" value="Update Your Profile">
           <?php
                  }
                  } 
            ?>
        </form>     
      </div>
           
    </div>
  </div>
    </section>
 <div class="clearfix"></div>
</div>
</div>

</body>
</html>

<?php
      include('partials/footer.php'); 
?>
