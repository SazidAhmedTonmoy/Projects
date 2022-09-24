<?php 
     include('partials/content.php');

     if(!isset($_SESSION['com_id'], $_SESSION['username2'], $_SESSION['role2'])){
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
</head>
<body style="background-color: lightsalmon";>

<div class="main-content bg-white">
  <div class="wrapper">
    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-12 bg-white padding-2">
            <h2><b>Recent Applications</b></h2>
            <?php
             $sql = "SELECT * FROM job_list INNER JOIN apply_job_post ON job_list.job_id=apply_job_post.job_id INNER JOIN student_information ON student_information.id=apply_job_post.id WHERE apply_job_post.com_id='$_SESSION[com_id]'";
                  $result = $conn->query($sql);
                  if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) 
                    {     
            ?>
          <div class="card">                   
            <div class="card-body">
              <h5><a href="user_application.php?id=<?php echo $row['id']; ?>&job_id=<?php echo $row['job_id']; ?>"><?php echo $row['job_name'].' @ ('.$row['first_name'].' '.$row['last_name'].')'; ?></a></h5>

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
            <div>
                   <a href="<?php echo site_url;?>company-dashboard/delete_application.php?id=<?php echo $row['id'];?>&job_id=<?php echo $row['job_id'];?>">Delete</a>
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
