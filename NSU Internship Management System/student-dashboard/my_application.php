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
<body>
<div class="main-content bg-white">
<div class="wrapper">
    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-9 bg-white padding-2">
            <h2>Recent Applications</h2>
            <?php
                  $sql = "SELECT * FROM job_list INNER JOIN apply_job_post ON job_list.job_id=apply_job_post.job_id WHERE apply_job_post.id='$_SESSION[student_id]'";
                  $result = $conn->query($sql);
                  if($result->num_rows > 0) {

                    while($row = $result->fetch_assoc())
                    {
            ?>
              <div class="card">                   
                <div class="card-body">
                 <div class="attachment-block clearfix padding-2">
                    <h4 class="attachment-heading">
                      <a style="text-decoration: none;" href="view_job_post1.php?id=<?php echo $row['job_id']; ?>"><?php echo $row['job_name'];?></a>
                    </h4>
                  </div>
                  <div class="attachment-text padding-2">
                      <div class="pull-right">
                    <?php 
                       if($row['status'] == 0) {
                         echo '<div><strong class="text-primary">Pending</strong></div>';
                       }
                       else if ($row['status'] == 1) {
                         echo '<div><strong class="text-red">Rejected</strong></div>';
                       } 
                       else if ($row['status'] == 2) {
                        echo '<div><strong class="text-green">Under Review</strong></div> ';
                       }
                    ?>
                       </div>
                    </div>
              </div>
            <?php
              }
            }
            ?>
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