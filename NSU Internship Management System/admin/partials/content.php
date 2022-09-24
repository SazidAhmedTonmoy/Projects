<?php 
      include ("../database/database-connection.php");
?>
<!Doctype HTML>
<html>
<head>
     <title>NSU Internship Management System</title>
  
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
     <script src="https://kit.fontawesome.com/f4a8f3f7c1.js" crossorigin="anonymous"></script> 
     <link rel="stylesheet" href="admin-style/admin_sidenav.css" type="text/css"/>
     <link rel="stylesheet" href="admin-style/admin_dashboard.css">
</head> 
<body>
	<div id="mySidenav" class="sidenav">
	 <!--  <p class="logo">NSU Internship Management System</p> -->
      <a href="admin_dashboard.php" class="logo"><img src="images/logo/Logo.png" class="w-100" alt="Logo" title="Logo"/></a>
      <a href="admin_dashboard.php"class="icon-a"><i class="fa fa-home icons"></i>&nbsp;&nbsp;Home</a>
      <a href="manage_student.php"class="icon-a"><i class="fa fa-plus icons" aria-hidden="true"></i>&nbsp;&nbsp;Registered Student</a>
       <a href="manage_company.php"class="icon-a"><i class="fa fa-industry icons" aria-hidden="true"></i> &nbsp;&nbsp;Registered Company</a>
      <a href="manage_faculty.php"class="icon-a"><i class='fas fa-chalkboard-teacher icons'></i> &nbsp;&nbsp;Registered Faculty</a>

       <!-- <a href="internship_candidates.php"class="icon-a"><i class="fas fa-user-graduate icons"></i> &nbsp;&nbsp;Internship Candidates</a>
   -->
      <a href="manage_admin.php"class="icon-a"><i class="fas fa-user-shield icons"></i> &nbsp;&nbsp;Admin</a>
   </div>

   <div id="main">
       <div class="head">
	         <div class="col-div-6">
                <span style="font-size:30px;cursor:pointer; color: #ffffff;" class="nav"  >&#9776;   Dashboard</span>
                 <span style="font-size:30px;cursor:pointer; color: #ffffff;" class="nav2"  >&#9776; Dashboard</span>
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
 

