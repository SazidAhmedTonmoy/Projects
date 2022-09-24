<?php
     include ("database/database-connection.php");
     $msg = "";
     if(isset($_POST['submit'])){
            $username=$_POST['username'];
            $email=$_POST['email'];
            $subject=$_POST['subject'];
            $message=$_POST['write'];

            $sql="INSERT INTO contact_message(username, email, subject, write_message)VALUES (?,?,?,?)";
                   $stmt=$conn->prepare($sql);
                   $stmt->bind_param("ssss",$username, $email, $subject, $message);
                   $stmt->execute();
                   $result = $stmt->get_result();
                   header('location:index.php');    
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
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    
    <?php 
          include('header/header.php');
    ?>
        <section class="nearJob">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-5 nearcol">
                        <h1>Your dream Internship</h1>
                        <h2 class="text-red">Is Near to You</h2>
                    </div>
                    <div class="col-sm-7 d-none d-md-block">
                        <div class="row">
                            <div class="d-flex w-100">
                                <img class="w-100" src="images/categories/banner.jpg" alt="Banner" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="contacts">
            <div class="container">
                <div class="row">	
                    <div class="col-sm-4 mb-4">
                        <a href="#">
                            <div class="contInner">
                                <i class="fa fa-map" aria-hidden="true"></i>
                                <h4>Address</h4>
                                <p> Block- A, Level-1,Bashundhara RA, Dhaka</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-4 mb-4">
                        <a href="#">
                            <div class="contInner">
                                <i class="fa fa-envelope-open" aria-hidden="true"></i>
                                <h4>E-mail</h4>
                                <p>nsu-ism@gmail.com</p>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-4 mb-4">
                        <a href="#">
                            <div class="contInner">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <h4>Phone Number</h4>
                                <p class="f_rubik">01311xxxxxx</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="contactForm">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <h3>Share Your Thought</h3>
                        
                        <form class="form" method="post">
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <input type="text" name="username" id="username" class="form-control" placeholder="User Name" value="" required>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email Address" value="" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 form-group">
                                    <input type="text" name="subject" id="subject" class="form-control" placeholder="Subject" value="" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 form-group">
                                    <input type="text" name="write" class="form-control" placeholder="Write your Message" value="" required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 form-group">              
                                    <input type="submit" name="submit" id="sendMsg" class="btn btn-danger rounded-pill" value="Send Message" />
                                </div>
                            </div>	
                        </form>
                    </div>
                </div>
            </div>
        </section>

    <?php 
          include('footer/footer.php');
    ?>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>
    
    
        
