<?php
session_start();
if(!isset($_SESSION["user_id"])){
//if login in session is not set
header("location: ../login.php");
}
$user_id=$_SESSION["user_id"];

	$date_form = $_POST['date_form'];
	$date_to = $_POST['date_to'];


$today = date("Y-m-d H:i:s");
// Database Connection
require("db_connection.php");

$result_user = mysqli_query($con,"SELECT * FROM users WHERE user_id='$user_id'");
$row_user  = mysqli_fetch_array($result_user);
if(is_array($row_user)) {
$department_user = $row_user['department'] ;
$access_user = $row_user['admin_access'] ;
}

?>
<head>
<style>
table.blueTable {
  border: 1px solid #1C6EA4;
  background-color: #EEEEEE;
  width: 100%;
  text-align: left;
  border-collapse: collapse;
}
table.blueTable td, table.blueTable th {
  border: 1px solid #AAAAAA;
  padding: 3px 2px;
}
table.blueTable tbody td {
  font-size: 13px;
}
table.blueTable tr:nth-child(even) {
  background: #D0E4F5;
}
table.blueTable thead {
  background: #1C6EA4;
  background: -moz-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
  background: -webkit-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
  background: linear-gradient(to bottom, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
  border-bottom: 2px solid #444444;
}
table.blueTable thead th {
  font-size: 15px;
  font-weight: bold;
  color: #FFFFFF;
  border-left: 2px solid #D0E4F5;
}
table.blueTable thead th:first-child {
  border-left: none;
}

table.blueTable tfoot {
  font-size: 14px;
  font-weight: bold;
  color: #FFFFFF;
  background: #D0E4F5;
  background: -moz-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
  background: -webkit-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
  background: linear-gradient(to bottom, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
  border-top: 2px solid #444444;
}
table.blueTable tfoot td {
  font-size: 14px;
}
table.blueTable tfoot .links {
  text-align: right;
}
table.blueTable tfoot .links a{
  display: inline-block;
  background: #1C6EA4;
  color: #FFFFFF;
  padding: 2px 8px;
  border-radius: 5px;
}
</style>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vivid Letter || SMS Poral</title>

    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/local.css" />

    <script type="text/javascript" src="../js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>

 <script
        src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="../tx/src/jquery.table2excel.js"></script>
</head>



<table class="blueTable" id="table2excel">
<tr>
<th colspan="7" >
<button >Download Excel</button>
<script>

			$(function() {
				$("button").click(function(){
				$("#table2excel").table2excel({
					exclude: ".noExl",
    				name: "Excel Document Name",
					filename: "SMS Report",//do not include extension
fileext:".xls"
				});
				 });
			});
</script>
</th>
</tr>



<?php


if(isset($_POST["submit_file_department"])){
      $department_report = $_POST['department_report'];
date_default_timezone_set("Asia/Dhaka");
?>
<h3 align="center">Vivid Letter SMS Report</h3>
<tr>
<th>Time Stamp</th>
<th>Masking</th>
<th>Department</th>
<th>Phone Number </th>
<th>Text</th>
<th>SMS Count</th>
<?php if($access_user === '2')
{
?>
<th>SMS Cost</th>
</tr>
<?php
}
else
{
?>
</tr>
<?php
}
echo "<p align='center';>";
echo "Duration : ";
echo $date_form;
echo " TO ";
echo $date_to;
echo "</p>";

echo "<p align='center';>";
echo "Report Generated : ";
echo date("Y-m-d h:i:sa");
echo "</p>";
$sms_count_toal=0;
$sms_cost_toal=0;
if($department_report==='0')
{
$query = "SELECT * FROM single_sms WHERE date_time BETWEEN '$date_form 00:00:00' AND '$date_to 23:59:59' ORDER BY date_time ASC";
}
else
{
$query = "SELECT * FROM single_sms WHERE department='$department_report' AND date_time BETWEEN '$date_form 00:00:00' AND '$date_to 23:59:59' ORDER BY date_time ASC";
}
if($result_query = mysqli_query($con, $query)) {
 if(mysqli_num_rows($result_query) > 0){
 while ($row_query = mysqli_fetch_array($result_query)){

$timestamp=$row_query["date_time"];
$masking= 'Bikroy.com';
$department=$row_query["department"];
$phone=$row_query["phone_number"];
$message = $row_query["message"] ;
$sms_count = $row_query["char_count"] ;
$operator = substr($phone, 0, 2);
if($operator === '17' || $operator=== '19'|| $operator === '15' || $operator === '13' ||$operator === '14')
{
	$cost=0.46;
}
else
{
	$cost=0.345;
}

$sms_count_cost=$sms_count*$cost;
?>
<tr>
<td><?php echo $timestamp;?></td>
<td><?php echo $masking;?></td>
<td><?php echo $department;?></td>
<td><?php echo $phone;?></td>
<td><?php echo $message;?></td>
<td><?php echo $sms_count;

?></td>
<?php
		$sms_count_toal+=$sms_count;
if($access_user === '2')

{
?>
<td><?php echo $sms_count_cost;?></td>
<?php
		$sms_cost_toal+=$sms_count_cost;
		}
?>

<?php
	}
}
?>
</tr>
<?php
}
else
{
?>
</tr>
<?php
}
?>
<tr>
		<td  colspan="5" align="right"> <b>Total Sent SMS</b> </td>
		<td> <?php echo $sms_count_toal;?></td>
    <td> <?php echo $sms_cost_toal;?></td>

</tr>

<?php
}
if(isset($_POST["submit_file_phone"])){
  	$phone_number=$_POST['phone'];
date_default_timezone_set("Asia/Dhaka");
?>
<h3 align="center">Vivid Letter SMS Report</h3>
<tr>
<th>Time Stamp</th>
<th>Masking</th>
<th>Department</th>
<th>Phone Number </th>
<th>Text</th>
<th>SMS Count</th>
</tr>
<?php

echo "<p align='center';>";
echo "Duration : ";
echo $date_form;
echo " TO ";
echo $date_to;
echo "</p>";

echo "<p align='center';>";
echo "Report Generated : ";
echo date("Y-m-d h:i:sa");
echo "</p>";
$sms_count_toal=0;
$query = "SELECT * FROM single_sms WHERE phone_number = '$phone_number' AND date_time BETWEEN '$date_form 00:00:00' AND '$date_to 23:59:59' ORDER BY date_time ASC";


if($result_query = mysqli_query($con, $query)) {
 if(mysqli_num_rows($result_query) > 0){
 while ($row_query = mysqli_fetch_array($result_query)){

$timestamp=$row_query["date_time"];
$masking= 'Bikroy.com';
$department=$row_query["department"];
$phone=$row_query["phone_number"];
$message = $row_query["message"] ;
$sms_count = $row_query["char_count"] ;

?>
<tr>
<td><?php echo $timestamp;?></td>
<td><?php echo $masking;?></td>
<td><?php echo $department;?></td>
<td><?php echo $phone;?></td>
<td><?php echo $message;?></td>
<td><?php echo $sms_count;?></td>

<?php
		$sms_count_toal+=$sms_count;
		}
?>

<?php
	}
}


?>
<tr>
		<td  colspan="5" align="right"> <b>Total Sent SMS</b> </td>
		<td> <?php echo $sms_count_toal;?></td>
</tr>

<?php

}
if(isset($_POST["submit_file_bill"])){
date_default_timezone_set("Asia/Dhaka");
?>
<h3 align="center">Vivid Letter SMS Bill Breakdown</h3>
<tr>

<th>Department</th>
<th>SMS Count</th>
<th>Amount</th>
</tr>
<?php
echo "<p align='center';>";
echo "Duration : ";
echo $date_form;
echo " TO ";
echo $date_to;
echo "</p>";

echo "<p align='center';>";
echo "Report Generated : ";
echo date("Y-m-d h:i:sa");
echo "</p>";

$query_dept = "SELECT * FROM users";
if($result_query_dept = mysqli_query($con, $query_dept)) {
 if(mysqli_num_rows($result_query_dept) > 0){
 while ($row_query_dept = mysqli_fetch_array($result_query_dept)){
	 $department_list=$row_query_dept["department"];

	$sms_count_total=0;
	$sms_cost=0;

$query = "SELECT * FROM single_sms WHERE department='$department_list' AND date_time BETWEEN '$date_form 00:00:00' AND '$date_to 23:59:59' ORDER BY department ASC";


if($result_query = mysqli_query($con, $query)) {
 if(mysqli_num_rows($result_query) > 0){
 while ($row_query = mysqli_fetch_array($result_query)){

$masking= 'Bikroy.com';
$phone=$row_query["phone_number"];
$message = $row_query["message"] ;
$sms_count = $row_query["char_count"] ;
$operator = substr($phone, 0, 2);
if($operator === '17' || $operator=== '19'|| $operator === '15' || $operator === '13' ||$operator === '14')
{
	$cost=0.46;
}
else
{
	$cost=0.345;
}

$sms_count_cost=$sms_count*$cost;

$sms_cost+=$sms_count_cost;
$sms_count_total+=$sms_count;
		}

	}

}





?>
<tr>
<td><?php echo $department_list;?></td>
<td><?php echo $sms_count_total;?></td>
<td><?php echo $sms_cost;?></td>
</tr>


<?php

}
		}

	}
}


?>
