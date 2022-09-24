<?php 
      include('partials/content.php'); 

      if(!isset($_SESSION['username4'], $_SESSION['role4'])){
           header("location:login.php");  
      } 
 ?>
      <div class="main-content">
         <div class="wrapper">
            <div class="col-4 text-center">
                <?php 
                       $sql = "SELECT * FROM student_information";
                       $res = mysqli_query($conn, $sql);
                       $count = mysqli_num_rows($res);
                 ?>
                 <h1><?php echo $count; ?></h1><br/>
                 <p style="font-size: 30px;">Registered Student</p>
            </div>
            <div class="col-4 text-center">
                 <?php 
                        $sql2 = "SELECT * FROM company_information";
                        $res2 = mysqli_query($conn, $sql2);
                        $count2 = mysqli_num_rows($res2);
                  ?>
                  <h1><?php echo $count2; ?></h1><br/>
                  <p style="font-size: 30px;">Registered Company</p>
            </div>        
            <div class="col-4 text-center">
                  <?php 
                        $sql = "SELECT * FROM faculty_information";
                        $res3 = mysqli_query($conn, $sql);
                        $count3 = mysqli_num_rows($res3);
                   ?>
                   <h1><?php echo $count3; ?></h1><br/>
                   <p style="font-size: 30px;">Registered Faculty</p>
            </div>
            <div class="clearfix"></div>

         </div>
      </div>
<?php include('partials/footer.php') ?>