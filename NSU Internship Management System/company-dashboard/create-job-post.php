<?php
    include('partials/content.php'); 
    if(!isset($_SESSION['com_id'], $_SESSION['role2'], $_SESSION['com_name'])){
           header("location:login.php");  
    }
    if(isset($_POST['submit'])){
        $job_name=$_POST['job_name'];
        $job_category=$_POST['job_category'];
        $vacancies=$_POST['vacancies'];
        $publish_date=$_POST['publist_date'];
        $dead_line=$_POST['dead_line'];
        $location=$_POST['location'];
        $internship_status=$_POST['internship_status'];
        $policy=$_POST['policy'];
        $discription=$_POST['discription'];
        $res_discription=$_POST['res_discription'];
           
        $sql="INSERT INTO job_list(com_id,job_name,job_category,vacancies,publish_date, application_deadline,location,internship_status,intern_paid_or_unpaid,intern_description,intern_responsibility)VALUES (?,?,?,?,?,?,?,?,?,?,?)";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ississsssss",$_SESSION['com_id'],$job_name,$job_category,$vacancies,$publish_date,$dead_line,$location,$internship_status, $policy,$discription,$res_discription);
            $stmt->execute();
            if( $stmt->execute()){
                 $_SESSION['jobpostsucess'] = true;
                 header("Location:my_job-list.php");
            } 
            else{
                 echo "Error ";
            }   
        }   
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <title>NSU Internship Management System</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body style="background-color: lightsalmon";>

<section class="stillGot">
    <div class="container">
        <div class="row text-center">
            <div class="col-sm-12 mx-auto">
                <h2>Post a <span class="text-red"> Job</span></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <form method="post">
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <input type="text" name="job_name" id="name" class="form-control" placeholder="Name" value="" required>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group dropdown-container">
                            <select name="job_category" id="job_cate" class="form-control">
                                <option value="web">Web & Software</option>
                                <option value="data_science">Data Science & Analist</option>
                                <option value="graphics">Graphics Designing</option>
                                <option value="data_entry">Data Entry</option>
                                <option value="mechanic">Mechanic Engineering</option>
                            </select>
                        </div>
                        <div class="col-sm-6 form-group dropdown-container">
                            <select name="location" id="location" class="form-control">
                                <option value="">Internship Loaction</option>
                                <option value="dhaka">Dhaka</option>
                                <option value="chittagong">Chittagong</option>
                                <option value="rajshahi">Rajshahi</option>
                                <option value="sylhet">Sylhet</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <input type="text" name="publist_date" id="publist_date" class="form-control" placeholder="Publist Date" value="" required>
                        </div>
                         <div class="col-sm-6 form-group dropdown-container">
                            <input type="text" name="dead_line" class="form-control" placeholder="Application Deadline" value="" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <input type="text" name="vacancies" id="vacancies" class="form-control" placeholder="Vacancies" value="" required>
                        </div>
                        <div class="col-sm-6 form-group dropdown-container">
                            <select name="policy" id="experince" class="form-control">
                                <option value="Unpaid">Unpaid</option>
                                <option value="Paid">Paid</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 form-group dropdown-container">
                            <select name="internship_status" class="form-control">
                                <option value="">Internship Status</option>
                                <option value="part_time">Part Time</option>
                                <option value="full_time">Full Time</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <textarea class="form-control" name="discription" rows="5" placeholder="Internship Descriptions" required></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <textarea class="form-control" name="res_discription" rows="5" placeholder="Responsibilities" required></textarea>
                        </div>
                    </div>
                    <div class="row pt-4">
                        <div class="col-sm-12 form-group">
                            <button type="submit" name="submit" class="btn btn-danger btn-block" id="post">Post Your Job </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

   <!--  <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script> -->
</body>
</html>
<?php 
      include('partials/footer.php') 
?>
