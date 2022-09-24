<?php 
      include ("../database/database-connection.php");
?>
<!Doctype HTML>
<html>
<head>
    <title>NSU Internship Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <script src="https://kit.fontawesome.com/f4a8f3f7c1.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="admin-style/admin_sidenav.css" type="text/css"/>
    <link rel="stylesheet" href="admin-style/admin_dashboard.css" type="text/css">
</head> 
<body>
	<div id="mySidenav" class="sidenav">
	    <a href="student_dashboard.php" class="logo"><img src="images/logo/Logo.png" class="w-100" alt="Logo" title="Logo"/></a>
        <a href="student_dashboard.php" class="icon-a"><h3 class="box-title">Welcome To <b><?php echo $_SESSION['student_name']; ?></b></h3></a>
        <a href="student_dashboard.php"class="icon-a"><i class="fa fa-home icons"></i>&nbsp;&nbsp;Home</a>
        <a href="edit_profile.php"class="icon-a"><i class="fa fa-plus icons" aria-hidden="true"></i>&nbsp;&nbsp;My Profile</a>
        <a href="offer_internship.php"class="icon-a"><i class="fa fa-industry icons" aria-hidden="true"></i> &nbsp;&nbsp;Offer Internship</a>
        <a href="my_application.php"class="icon-a"><i class='fas fa-chalkboard-teacher icons'></i> &nbsp;&nbsp;My Applications</a>
       <!--  <a href="manage_internship.php"class="icon-a"><i class="fas fa-user-graduate icons"></i> &nbsp;&nbsp;Internship List</a> -->
   </div>
   <div id="main">
        <div class="head">
	        <div class="col-div-6">
                <span style="font-size:30px;cursor:pointer;color:#ffffff;" class="nav">&#9776;   
                Student Dashboard</span>
                <span style="font-size:30px;cursor:pointer;color:#ffffff;" class="nav2">&#9776; 
                Student Dashboard</span>
            </div>    
	        <div class="col-div-6">
                <div class=row>
                    <div class="col-div-6 icon">
                       <a href="admin_dashboard.php"><i class="fas fa-users-cog"></i></a>
                    </div>
                    <div class="col-div-6 design">
                       <a href="logout.php">Logout</a>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>

    
 

