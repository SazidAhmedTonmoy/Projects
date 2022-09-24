<?php
    include('partials/content.php');
    if(!isset($_SESSION['com_id'],$_SESSION['username2'],$_SESSION['role2'])){
           header("location:login.php");  
    } 
    if(isset($_POST['To'])){
    $ch = curl_init();
    $message = $_POST['Message'];
    $char_count=mb_strlen($message);
    $phone= $_POST['To'];
    $str_arr = explode (",", $phone);
    $encoded_message = curl_escape($ch, $message);
    $target_url = 'https://api.mobireach.com.bd/SendTextMultiMessage?Username=bikroy&Password=Abcd@1122&From=Bikroy.com&To='.$phone.'&Message='.$encoded_message;

    curl_setopt($ch, CURLOPT_URL, $target_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $result =   curl_exec($ch);
    $xml = simplexml_load_string($result);
    $json = json_encode($xml);
    $array = json_decode($json);
    $sms_count= ($array->ServiceClass->SMSCount);
    $sms_status_text= ($array->ServiceClass->StatusText);
    $sms_error_code= ($array->ServiceClass->ErrorCode);
    $sms_error_text= ($array->ServiceClass->ErrorText);

    if($sms_error_code==0){
      foreach($str_arr as $phone_insert){
         $sql= "INSERT INTO `single_sms`(`phone_number`,`message`) VALUES('$phone_insert','$message')";
            if (mysqli_query($conn,$sql)){
                echo "<script type=\"text/javascript\">
                      alert(\" $sms_status_text || You have Sent $sms_count to $phone_insert\");
                      </script>";
            }
      }
    }
}
     $sql="SELECT * FROM apply_job_post WHERE com_id='$_SESSION[com_id]' AND id='$_GET[id]'";
     $result=$conn->query($sql);
     if($result->num_rows==0) 
     {
        header("Location:company_dashboard.php");
     }
?>
<!DOCTYPE html>
<html>
<head>
   <title>NSU Internship Management System</title>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <script>
       function countChars(obj){
           document.getElementById("charNum").innerHTML = obj.value.length+' characters';
    }
    </script>
</head>
<body style="background-color: lightsalmon";>
<div class="main-content bg-white">
  <div class="wrapper">
    <section>
      <div class="container">
        <div class="row">        
          <div class="col-md-9 bg-white padding-2">
            <div class="row margin-top-20">
              <div class="col-md-12">
              <?php
               $sql = "SELECT * FROM student_information WHERE id='$_GET[id]'";
                $result = $conn->query($sql);

                if($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) 
                  {
                ?>
                <div class="pull-left"  style='margin-top: 10px;'>
                  <h2><b><?php echo $row['first_name']. ' '.$row['last_name']; ?></b></h2>
                </div>
                <div class="pull-right" style='margin-top: 10px;'>
                    <a href="internship_application.php" class="btn bg-success text-white btn-default  btn-lg btn-flat margin-top-20"><i class="fa fa-arrow-circle-left"></i>Back</a>
                </div>
                <div class="clearfix"></div>
                <hr>
                <div>
                  <?php
                    echo 'Email: '.$row['email'];
                    echo '<br>';
                    echo 'Contact Number: '.$row['st_number'];
                    echo '<br>';
                    echo 'Student Id: '.$row['st_id'];
                    echo '<br>';
                    echo '<br>';
                  ?>
                  <div class="row" style='margin-bottom: 40px;'>
                     <div class="col-md-3 pull-right">
                      <?php
                           if($row['resume'] != ""){
                           echo '<a href="../upload/resume/'.$row['resume'].'" class="btn btn-info" download="Resume">Download Resume</a>';
                           }
                      ?>
                    </div>
                    <div class="col-md-3 pull-right">
                      <a href="under_review.php?id=<?php echo $row['id']; ?>&job_id=<?php echo $_GET['job_id']; ?>" class="btn btn-warning text-black"><b>Mark Under Review</b></a>
                    </div>
                    <div class="col-md-3 pull-right">
                      <a href="rejected.php?id=<?php echo $row['id']; ?>&job_id=<?php echo $_GET['job_id']; ?>" class="btn btn-danger"><b>Reject Application</b></a>
                    </div>
                  </div>
                </div>

                <div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </section>

    
    <div class="container">
       <div class="row">
          <div class="col-lg-6">
            <div class="panel panel-default" style="padding-bottom: 20Px;">
              <div class="panel-body">
                <form accept-charset="utf-8" method="POST"enctype="multipart/form-data">
                  <h4> Single SMS Send </h4>
                  <div class="form-group">
                      <label>Phone Number</label>
                      <input class="form-control" type="text" name="To" 
                      value="<?php echo $row['st_number'];?>" required>
                      <label>Text</label>
                      <textarea onkeyup="countChars(this);" name="Message" type="text" class="form-control" required></textarea>
                      <p id="charNum">0 characters</p>
                  </div>
                  <input class="btn btn-success" type="submit" name="submit_btn" id="sms_submit_form" value="Submit"/>
                </form>
              </div>
            </div>
          </div>
        </div>
    </div>
     <?php
        }
       }
     ?>
  </div>
</div>
</body>
</html>
<?php 
      include('partials/footer.php') 
?>

