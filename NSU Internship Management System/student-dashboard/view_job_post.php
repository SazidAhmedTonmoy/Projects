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
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="assets/font-awesome/css/font-awesome.min.css">
   <link rel="stylesheet" href="admin-style/admin_sidenav.css" type="text/css"/>
   <link rel="stylesheet" href="admin-style/admin_dashboard.css" type="text/css">
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
                   $sql = "SELECT * FROM job_list INNER JOIN company_information ON job_list.com_id=company_information.com_id WHERE job_id='$_GET[id]'";
                   $result = $conn->query($sql);
                   if($result->num_rows > 0) 
                   {
                     while($row = $result->fetch_assoc()) 
                   {
               ?>
                <div class="pull-left" style='margin-top: 10px;'>
                  <h2><b><?php echo $row['job_name']; ?></b></h2>
                </div>
                <div class="pull-right" style='margin-top: 10px;'>
                  <a href="offer_internship.php" class="btn bg-success text-white btn-default btn-lg btn-flat margin-top-20"><i class="fa fa-arrow-circle-left"></i>Back</a>
                </div>
                <div class="clearfix"></div>
                <hr> 
                    <div class="card">                   
                           <div class="card-body">
                              <p>Job Name: <?php echo $row['job_name'];?></p>
                              <p>Job Category: <?php echo $row['job_category'];?></p>
                              <p>Internship Location: <?php echo $row['location'];?></p>
                              <p>Internship Status: <?php echo $row['internship_status'];?></p>
                              <p>Vacancie: <?php echo $row['vacancies'];?></p>
                              <p>Job Publish Date: <?php echo $row['publish_date'];?></p>
                              <p>Application Deadline Date: <?php echo $row['application_deadline'];?></p>
                             <p>Internship Description: <?php echo $row['intern_description'];?></p>
                             <p>Responsibility: <?php echo $row['intern_responsibility'];?></p>

                          </div>
                          <div style='margin-bottom: 20px; margin-left: 20px;'>
                               <a href="apply.php?id=<?php echo $row['job_id']; ?>" class="btn btn-success btn-flat margin-top-50">Apply</a>
                          </div>
                    </div>
                <div>
                </div>
                <?php
                  }
                }
                ?>
              </div>
            </div>           
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
</body>
</html>
<?php 
      include('partials/footer.php') 
?>
