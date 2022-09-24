


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
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
mysqli_set_charset($conn,"utf8");
//mysqli->query("SET collation_connection = utf8_general_ci");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result_user = mysqli_query($conn,"SELECT * FROM users WHERE user_id='$user_id'");
$row_user  = mysqli_fetch_array($result_user);
if(is_array($row_user)) {
$department_user = $row_user['department'] ;
$access_user = $row_user['admin_access'] ;
}

if(isset($_POST['To'])){
    $ch = curl_init();
	$language = $_POST['language'];
    $message = $_POST['Message'];
	$char_count=mb_strlen($message);
	$department=$_POST['department'];
    $phone= $_POST['To'];
	$str_arr = explode (",", $phone);

    $encoded_message = curl_escape($ch, $message);
    $target_url = ''.$phone.'&Message='.$encoded_message;

    curl_setopt($ch, CURLOPT_URL, $target_url);
    //curl_setopt($ch, CURLOPT_POST,1);
    //curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  $result =   curl_exec($ch);
	$xml = simplexml_load_string($result);
	$json = json_encode($xml);
	$array = json_decode($json);
	$sms_count= ($array->ServiceClass->SMSCount);
	$sms_status_text= ($array->ServiceClass->StatusText);
	$sms_error_code= ($array->ServiceClass->ErrorCode);
	$sms_error_text= ($array->ServiceClass->ErrorText);
		//$sql_insert_data = "INSERT INTO  `single_sms`(`department`, `phone_number`, `message`) VALUES ('$department','$str_arr','$message')";
   /// header('location:../index.php?success_message=Sms sent successfully');

if ( $sms_error_code == 0)
{
	foreach($str_arr as $phone_insert){

   $sql_insert_data = "INSERT INTO `single_sms`(`department`, `phone_number`, `message`,`char_count`) VALUES ('$department_user','$phone_insert','$message','$sms_count')";

if (mysqli_query($conn,$sql_insert_data))
{

?>
    <h4><?php  echo "<script type=\"text/javascript\">
					alert(\" $sms_status_text || You have Sent $sms_count to $phone_insert\");
					window.location = \"index.php\"
				</script>"; ?></h4>
    <?php
}
}

}
else
{
	foreach($str_arr as $phone_insert){

   $sql_insert_data = "INSERT INTO `single_sms`(`department`, `phone_number`, `message`,`char_count`) VALUES ('$department_user','$phone_insert','$message','0')";

if (mysqli_query($conn,$sql_insert_data))
{

?>
    <h4><?php  echo "<script type=\"text/javascript\">
					alert(\" $sms_status_text || Message Not Sent 0 to $phone_insert || $sms_error_code\");
					window.location = \"index.php\"
				</script>"; ?></h4>
    <?php
}
}
}

}



if(isset($_POST["submit_file"])){

$file = $_FILES["file"]["tmp_name"];


if($_FILES["file"]["size"] > 0){
 $file_open = fopen($file,"r");
 while(($csv = fgetcsv($file_open, 1000, ",")) !== false)
{
$phone = $csv[0];
    $ch = curl_init();
    $message = $_POST['Message'];
	$str_arr = explode (",", $phone);
    $encoded_message = curl_escape($ch, $message);
    $target_url = ''.$phone.'&Message='.$encoded_message;

    curl_setopt($ch, CURLOPT_URL, $target_url);
    //curl_setopt($ch, CURLOPT_POST,1);
    //curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $result =   curl_exec($ch);
	$xml = simplexml_load_string($result);
	$json = json_encode($xml);
	$array = json_decode($json);
	$sms_count= ($array->ServiceClass->SMSCount);
	$sms_status_text= ($array->ServiceClass->StatusText);
	$sms_error_code= ($array->ServiceClass->ErrorCode);
	$sms_error_text= ($array->ServiceClass->ErrorText);

		foreach($str_arr as $phone_insert){

   $sql_insert_data = "INSERT INTO `single_sms`(`department`, `phone_number`, `message`,`char_count`) VALUES ('$department_user','$phone_insert','$message','$sms_count')";


}

if (mysqli_query($conn,$sql_insert_data))
{
?>
    <h4><?php  echo "<script type=\"text/javascript\">
					alert(\" Your SMS Sent Successfully\");
					window.location = \"index.php\"
				</script>"; ?></h4>
    <?php
}

}
}
}



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
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="refresh" content="1800">
    <title>Vivid Letter || SMS Poral</title>

    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/local.css" />

    <script type="text/javascript" src="../js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	<script>
	function countChars(obj){
    document.getElementById("charNum").innerHTML = obj.value.length+' characters';
}
</script>
	<script>
	function countChars2(obj){
    document.getElementById("charNum2").innerHTML = obj.value.length+' characters';
}
</script>
 <script
        src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>
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
                <?php if($access_user==='1' || $access_user==='2')
{
	?>
				<ul class="nav navbar-nav side-nav">
                    <li class="active"><a href="../index.php"><i class="fa fa-bullseye"></i>Send SMS</a></li>

                    <li class=""><a href="../report.php"><i class="fa fa-bullseye"></i>Report</a></li>


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
					                       <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <b class="caret"></b></a>
                       <ul class="dropdown-menu">

                           <li class="divider"></li>
                           <li><a href="../logout.php" tite="Logout"><i class="fa fa-power-off"></i> Log Out</a></li>
                       </ul>
                   </li>
                </ul>

            </div>
        </nav>


         <div id="page-wrapper">



		          <div class="row">
          <div class="col-lg-6">
            <div class="panel panel-default" style="padding-bottom: 20Px;">
              <div class="panel-body">
 <form accept-charset="utf-8" method="POST" action="index.php" class="submit_form_data" enctype="multipart/form-data">
 	<h4> Single SMS Send </h4>
               <div class="form-group">
                <label>Department</label>
								​<input class="form-control" type="text" value="<?php echo $department_user;?>" name="department" readonly >
<label>Masking</label>
								​<input class="form-control" type="text" value="Bikroy.com" name="To" readonly>
<label>Language</label>
                <select name="language" class="form-control" placeholder = "">
				  <option value="0">Bangla</option>
				  <option value="1">English</option>
                </select>

				<label>Phone Number</label>
				​<input class="form-control" type="text" name="To" required>
				<label>Text</label>
                <textarea onkeyup="countChars(this);" name="Message" type="text" class="form-control" required></textarea>
				<p id="charNum">0 characters</p>




              </div>
			                          <input class="btn btn-success" type="submit" name="submit_btn" id="sms_submit_form" value="Submit"/>
 			 </form>

              </div>
            </div>
          </div>


		          <div class="col-lg-6 ">
            <div class="panel panel-default">
              <div class="panel-body">

 <form  method="post" action="index.php" enctype="multipart/form-data">
	<h4> Bulk SMS Upload </h4>
			                <div class="form-group">
                              <input type="file" name="file" />
              </div>
			  <label>Text</label>
                <textarea onkeyup="countChars2(this);" name="Message" type="text" class="form-control"required></textarea>
				<p id="charNum2">0 characters</p>
                        <input class="btn btn-success" type="submit" name="submit_file" value="Submit"/>

			  </form>

              </div>
            </div>
          </div>


      </div>

    </div>
</body>
</html>
