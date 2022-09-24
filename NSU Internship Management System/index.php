<?php
      include ("database/database-connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>NSU Internship Management System</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <?php 
        include('header/header.php');
    ?>
    <section class="main-content bg-white">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
               <h1>Find Your Best</h1>
               <h2>Internship Opportunity</h2>
               <p class="text-justify">The internship management system is an important        component of interaction between  students, educational institutions, and companies. It also has a significant impact on the digitization of internship-related procedures. Internships will make it easier to identify talents that fit the internal culture of the companies and will increase output. 
               </p>  
             </div>
             <div class="col-sm-6 d-none d-md-block">
                    <img class="w-100" src="images/home/internship1.jpg" alt="Banner"/>
            </div>
          </div>
        </div>
    </section>

    <section id="jobs" style="margin-bottom: 40px;">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 latest-job margin-bottom-20">
            <h1 class="text-center">Latest Internships</h1>
            <?php
          $sql = "SELECT * FROM job_list Order By Rand() Limit 5";
          $result = $conn->query($sql);
          if($result->num_rows > 0) {
            while($row = $result->fetch_assoc())
            {
              $sql1 = "SELECT * FROM company_information WHERE com_id='$row[com_id]'";
              $result1 = $conn->query($sql1);
              if($result1->num_rows > 0) {
                while($row1 = $result1->fetch_assoc())
                {
             ?>
            <div class="card container" style="width:300px; height: 150px; float: left; margin-left: 25px; padding: 25p;">
              <div class="card-body">
                <h4><a href="view_job_post.php?id=<?php echo $row['job_id']; ?>" style="text-decoration: none;"><?php echo $row['job_name']; ?></a></h4>
                <div>
                    <div><strong>Company Name:<?php echo $row1['com_name']; ?></strong></div>
                </div>
              </div>
            </div>
          <?php
              }
            }
            }
          }
          ?>

          </div>
        </div>
      </div>
    </section>


    <section class="internship-process">
        <div class="container-fluid">
            <h1>Internship <span class="text-danger">Process</span></h1>
            <div class="row">
                <div class="col-sm-4">
                    <div class="process mb-4"><i class="fa fa-users" aria-hidden="true"></i>
                        <h3>Create Account</h3>
                        <p>Users can create their account as either a student, company, or admin.The admin will have additional features that the others will not have.</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="process mb-4">
                        <i class="fa fa-search" aria-hidden="true"></i>
                        <h3>Search Internship</h3>
                        <p>A search bar is implemented to make it easy for users to search for their desired internship opportunities. Keywords can be inputted into the search bar.</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="process mb-4">
                        <i class="fa fa-file-text-o" aria-hidden="true"></i>
                        <h3>Upload Resume</h3>
                        <p>An intern can view their inputted information in this section, and companies can check on the available interns' information.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php 
          include("footer/footer.php");
    ?>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>