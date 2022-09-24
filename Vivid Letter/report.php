<?php
session_start();
if(!isset($_SESSION["user_id"])){
//if login in session is not set
header("location: ../login.php");
}

$user_id=$_SESSION["user_id"];

$servername = "localhost";
$username = "root";
$password = "sazid1498";
$dbname = "sms_portal";

$conn = new mysqli($servername, $username, $password, $dbname);

$result_user = mysqli_query($conn,"SELECT * FROM users WHERE user_id='$user_id'");
$row_user  = mysqli_fetch_array($result_user);
if(is_array($row_user)) {
$department_user = $row_user['department'] ;
$access_user = $row_user['admin_access'] ;
}

//data for details
//$row_details  = mysqli_fetch_array($result_details);
//if(is_array($row_details)) {
//$_SESSION["id_details"] = $row_details['emp_id'];
//$_SESSION["name_details"] = $row_details['emp_name'];
//$_SESSION["designation_details"] = $row_details['emp_designation'];
//$_SESSION["department_details"] = $row_details['emp_department'];
//$_SESSION["doj_details"] = $row_details['emp_doj'];
//$_SESSION["sl_details"] = $row_details['emp_sl'];
//$_SESSION["doc_details"] = $row_details['emp_doc'];
//$_SESSION["pf_mem_details"] = $row_details['emp_pf_mem'];
//$_SESSION["pf_mem_stat_details"] = $row_details['emp_pf_mem_stat'];
//$_SESSION["lwd_details"] = $row_details['emp_lwd'];
//$_SESSION["stat_details"] = $row_details['emp_stat'];

//}


//$result_current_sum= mysqli_query($con,"SELECT SUM(amount) FROM pf_deduc WHERE emp_id='" . $_SESSION["id"] . "'");
//if(is_array($row_current_sum)) {
	//$_SESSION["amount_current_sum"]=$row_current_sum['SUM(amount)'];
//}
?>
<!DOCTYPE html>

<html lang="en">
<head>
<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vivid Letter|| SMS Reports</title>

    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/local.css" />

    <script type="text/javascript" src="../js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<div id="wrapper">
               <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Vivid Letter</a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <?php if($access_user === '1' || $access_user === '2')
{
	?>
				<ul class="nav navbar-nav side-nav">
                    <li class=""><a href="../index.php"><i class="fa fa-bullseye"></i> Send SMS</a></li>

                    <li class="active"><a href="../report.php"><i class="fa fa-bullseye"></i>Report</a></li>


                </ul>
<?php
}
else
{
	?>
					<ul class="nav navbar-nav side-nav">
                    <li class="active"><a href="../index.php"><i class="fa fa-bullseye"></i> Send SMS</a></li>


                </ul>
				<?php
}
?>

                <ul class="nav navbar-nav navbar-right navbar-user">

                    <li class="dropdown user-dropdown">
                       <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION["user_id"]; ?><b class="caret"></b></a>
                       <ul class="dropdown-menu">

                           <li class="divider"></li>
                           <li><a href="../logout.php" tite="Logout"><i class="fa fa-power-off"></i> Log Out</a></li>
                       </ul>
                   </li>
                </ul>

            </div>
        </nav>
        </nav>
         <div id="page-wrapper">

       <!-- <div class="row">
          <div class="col-lg-12 text-center">
            <div class="panel panel-default">
              <div class="panel-body">

              </div>
            </div>
          </div>
        </div><!-- /.row -->

		  <div class="row">
		  		            <div class="col-lg-6 ">
            <div class="panel panel-default">
              <div class="panel-body">

 <form  method="post" action="../export/index.php" enctype="multipart/form-data">
	<h4></h4>
	<label>Department Wise Report</label>
			                <div class="form-group">
                <select name="department_report" class="form-control" placeholder = "">
                  <option value="">Select Department</option>
				  <option value="0">All</option>
				  <option value="Listing">Listing</option>
				  <option value="VAS">VAS</option>
				  <option value="E-Commerce">E-Commerce</option>
				  <option value="After-Sales">After Sales</option>
				  				  <option value="Customer-Support">Customer Support</option>

                </select>
              </div>

									  <div class="row">
<div class="col-lg-6 ">
            <div class="panel panel-default">
              <div class="panel-body">
			 <input class="form-control" type="date" value="2010-12-16;" name="date_form">
</div>
</div>
</div>
<div class="col-lg-6 ">
            <div class="panel panel-default">
              <div class="panel-body">
			 <input class="form-control" type="date" value="2010-12-16;" name="date_to">
</div>
</div>
</div>
              </div>



                        <input class="btn btn-success" type="submit" name="submit_file_department" value="Download Excel"/>

			  </form>

              </div>
            </div>

          </div>

		  		  		            <div class="col-lg-6 ">
            <div class="panel panel-default">
              <div class="panel-body">

 <form  method="post" action="../export/index.php" enctype="multipart/form-data">
	<h4></h4>
			                <div class="form-group">
<label>Phone Number Wise Report</label>
				​<input class="form-control" type="text" name="phone" required>
              </div>

									  <div class="row">
<div class="col-lg-6 ">
            <div class="panel panel-default">
              <div class="panel-body">
			 <input class="form-control" type="date" value="2010-12-16;" name="date_form">
</div>
</div>
</div>
<div class="col-lg-6 ">
            <div class="panel panel-default">
              <div class="panel-body">
			 <input class="form-control" type="date" value="2010-12-16;" name="date_to">
</div>
</div>
</div>
              </div>



                        <input class="btn btn-success" type="submit" name="submit_file_phone" value="Download Excel"/>

			  </form>

              </div>
            </div>

          </div>

		 		        </div>
						<div class="row">

<?php
if($access_user==='2')
{
	?>
								  		  		            <div class="col-lg-6 ">
            <div class="panel panel-default">
              <div class="panel-body">

 <form  method="post" action="../export/index.php" enctype="multipart/form-data">
	<h4></h4>
			                <div class="form-group">
<label>Billing</label>

              </div>

									  <div class="row">
<div class="col-lg-6 ">
            <div class="panel panel-default">
              <div class="panel-body">
			 <input class="form-control" type="date" value="2010-12-16;" name="date_form">
</div>
</div>
</div>
<div class="col-lg-6 ">
            <div class="panel panel-default">
              <div class="panel-body">
			 <input class="form-control" type="date" value="2010-12-16;" name="date_to">
</div>
</div>
</div>
              </div>



                        <input class="btn btn-success" type="submit" name="submit_file_bill" value="Download Excel"/>

			  </form>

              </div>
            </div>

          </div>
<?php } ?>
						</div>
         <!-- <div class="col-lg-4 text-center">
            <div class="panel panel-default">
              <div class="panel-body">
                .col-lg-4
              </div>
            </div>
          </div>
          <div class="col-lg-4 text-center">
            <div class="panel panel-default">
              <div class="panel-body">
                .col-lg-4
              </div>
            </div>
          </div>
        </div>
<!--  <div class="row">
          <div class="col-lg-8 text-center">
            <div class="panel panel-default">
              <div class="panel-body">
                .col-lg-8
              </div>
            </div>
          </div>
          <div class="col-lg-4 text-center">
            <div class="panel panel-default">
              <div class="panel-body">
                .col-lg-4
              </div>
            </div>
          </div>
        </div><!-- /.row -->

      <!--  <div class="row">
          <div class="col-lg-3 text-center">
            <div class="panel panel-default">
              <div class="panel-body">
                .col-lg-3
              </div>
            </div>
          </div>
          <div class="col-lg-6 text-center">
            <div class="panel panel-default">
              <div class="panel-body">
                .col-lg-6
              </div>
            </div>
          </div>
          <div class="col-lg-3 text-center">
            <div class="panel panel-default">
              <div class="panel-body">
                .col-lg-3
              </div>
            </div>
          </div>
        </div><!-- /.row -->



    </div>
</body>
</html>
