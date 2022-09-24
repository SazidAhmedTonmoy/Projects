<?php
   include('partials/content.php'); 
   if(!isset($_SESSION['com_id'], $_SESSION['role2'], $_SESSION['com_name'])){
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
          <div class="col-md-12 bg-white">
            <h2><b>My Company Job Posts</b></h2>
            <div class="row margin-top-20">
              <div class="col-md-12">
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <thead>
                      <th>Job Title</th>
                      <th>View</th>
                    </thead>
                    <tbody>
                    <?php
                     $sql = "SELECT * FROM job_list WHERE com_id='$_SESSION[com_id]'";
                      $result = $conn->query($sql);
                      if($result->num_rows > 0){
                        while($row = $result->fetch_assoc()) 
                        {       
                      ?>
                      <tr>
                        <td><?php echo $row['job_name']; ?></td>
                        <td><a href="view_job_post.php?id=<?php echo $row['job_id']; ?>">View Post</a></td>
                      </tr>
                      <?php
                       }
                     }
                     ?>
                    </tbody>                    
                  </table>
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
