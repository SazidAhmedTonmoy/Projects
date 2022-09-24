<?php

session_start();
$message="";
if(count($_POST)>0) {
 $con = mysqli_connect('localhost','root','sazid1498','sms_portal') or die('Unable To connect');
$result_details = mysqli_query($con,"SELECT * FROM users WHERE user_id='" . $_POST["username"] . "' and password = '". $_POST["password"]."'");
$row_details  = mysqli_fetch_array($result_details);
if(is_array($row_details)) {
$_SESSION["user_id"] = $row_details['user_id'];
$_SESSION["page"] = $row_details['page'];
$_SESSION["department"] = $row_details['department'];
$page=$_SESSION["page"];

} else {
echo"<h5 align='center'><font color='red'> Invalid User or Password!</font></h5>";
}
}

if(isset ($_SESSION["user_id"])) {
header("Location:../$page");
}


?>
<!DOCTYPE html>
<html lang="en">
<head>



    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vivid Letter</title>

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css/local.css" />
<style>

body {
	background-color: #ffffff;
	font-weight: normal;
	font-size: 12;
	line-height: 1.6em;
	font-family: 'Nunito', 'Open Sans', Frutiger, Calibri, 'Myriad Pro', Myriad, sans-serif;
	color: #000;
	background-color: #0082c9;
	background-image: url('../img/background.png?v=2');
	background-position: 50% 50%;
	background-repeat: no-repeat;
	background-size: cover;
	background-attachment: fixed; /* fix background gradient */
	min-height: 100%; /* fix sticky footer */
	height: auto;
}
</style>

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body  style = "background-color:#3051d9">
<img src="../img/logo.png" style = "  display: block; margin-left: auto; margin-right: auto; width: 10%; " />
        <div id="page-wrapper">
        <div class="row">



		<div class="col-lg-4">

		</div>
          <div class="col-lg-4">

            <form role="form" action="" method="post">

              <div class="form-group">
                <label style ="color: #FFFFFF">User Name</label>
                <input class="form-control" name="username" placeholder="Enter Username" required>
              </div>

              <div class="form-group">
                <label style ="color: #FFFFFF">Password</label>
                <input class="form-control" name="password" placeholder="Enter Your Password" type="password" required>
              </div>
			   <button type="submit" class="btn btn-primary">Login</button>



            </form>
          </div>
        </div>

    </div>
</body>
</html>
