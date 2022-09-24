<?php 
      include('partials/content.php'); 

      if(!isset($_SESSION['com_id'], $_SESSION['username2'], $_SESSION['role2'])){
           header("location:login.php");  
      } 
 ?>
      <div class="main-content">
         <div class="wrapper">
            <div class="col-4 text-center">
                <?php 
                       $sql = "SELECT * FROM apply_job_post WHERE com_id='$_SESSION[com_id]'";
                       $res = mysqli_query($conn, $sql);
                       $count = mysqli_num_rows($res);
                 ?>
                 <h1><?php echo $count; ?></h1><br/>
                 <p style="font-size: 30px;">Application For Job</p>
            </div>
            <div class="col-4 text-center">
                 <?php 
                        $sql2 = "SELECT * FROM job_list WHERE com_id='$_SESSION[com_id]'";
                        $res2 = mysqli_query($conn, $sql2);
                        $count2 = mysqli_num_rows($res2);
                  ?>
                  <h1><?php echo $count2; ?></h1><br/>
                  <p style="font-size: 30px;">Number of Job Created</p>
            </div>        
            <div class="col-4 text-center">
                  <?php 
                        $sql = "SELECT * FROM company_information";
                        $res3 = mysqli_query($conn, $sql);
                        $count3 = mysqli_num_rows($res3);
                   ?>
                   <h1><?php echo $count3; ?></h1><br/>
                   <p style="font-size: 30px;">Registered Company</p>
            </div>
            <div class="clearfix"></div>

         </div>
      </div>
<?php 
      include('partials/footer.php') 
?>