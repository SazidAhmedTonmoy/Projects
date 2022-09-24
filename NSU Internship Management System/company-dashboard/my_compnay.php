<?php 
     include('partials/content.php');
     if(!isset($_SESSION['com_id'], $_SESSION['username2'], $_SESSION['role2'])){
           header("location:login.php");  
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
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body style="background-color: lightsalmon";>
<div class="main-content bg-white">
<div class="wrapper">
    <section class="loginForm">
        <div class="container">
          <div class="row">
             <div class="col-sm-12 mx-auto">    
                <form action="update_company.php" method="post" enctype="multipart/form-data">
                  <?php 
                        $sql = "SELECT * FROM company_information WHERE com_id='$_SESSION[com_id]'";
                        $result = $conn->query($sql);

                        if($result->num_rows == 1 ) {
                           while($row = $result->fetch_assoc()) {
                   ?>       
                    <h3 class="text-center">My Company</h3>    
                    <div class="col-sm-6 mx-auto latestForm" style="float: left;">
            
                        <div class="form-group"> 
                            <input type="text" name="company_name" id="company_name" class="form-control" value="<?php echo $row['com_name']; ?>" required> 
                            <label class="form-control-placeholder" for="company_name">Company Name</label>
                            <i class="fa fa-user-o iconSet" aria-hidden="true"></i>
                        </div>
                    
                        <div class="form-group"> 
                            <input type="email" name="email" id="email" class="form-control" value="<?php echo $row['email']; ?>" required> 
                            <label class="form-control-placeholder" for="email">E-mail Address</label>
                            <i class="fa fa-envelope-o iconSet" aria-hidden="true"></i>
                        </div>

                        <div class="form-group"> 
                            <input type="text" name="registered_address" id="registered_address" class="form-control" value="<?php echo $row['com_reg_address']; ?>" required> 
                            <label class="form-control-placeholder" for="registered_address">Registered Address</label>
                            <i class="fa fa-address-card iconSet" aria-hidden="true"></i>
                        </div>
                    </div> 

                    <div class="col-sm-6 mx-auto latestForm" style="float: right;">

                        <div class="form-group"> 
                            <input type="text" name="com_reg_num" id="com_reg_num " class="form-control" value="<?php echo $row['com_reg_num']; ?>" required> 
                            <label class="form-control-placeholder" for="com_reg_num">Company Registration Number</label>
                            <i class="fa fa-registered iconSet" aria-hidden="true"></i>
                        </div>
                    
                        <div class="form-group"> 
                            <input type="text" name="com_user_name" id="com_user_name" class="form-control" value="<?php echo $row['com_user_name'];?>" required> 
                            <label class="form-control-placeholder" for="com_user_name">Company Username</label>
                            <i class="fa fa-user-o iconSet" aria-hidden="true"></i>
                        </div>


                        <div class="form-group"> 
                            <input type="text" name="mobilenumber" id="mobilenumber" class="form-control" value="<?php echo $row['com_number'];?>" required> 
                            <label class="form-control-placeholder" for="mobilenumber">Mobile Number</label>
                            <i class="fa fa-phone iconSet" aria-hidden="true"></i>
                        </div> 
                    </div>
                    <input type="hidden" id="userType" name="userType" value="company">
                    <input type="hidden" name="id" value="<?php echo $row['com_id']; ?>">
                    <input type="submit" name="submit" class="btn btn-danger btn-block mb-4" id="register" value="Update company Profile">
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