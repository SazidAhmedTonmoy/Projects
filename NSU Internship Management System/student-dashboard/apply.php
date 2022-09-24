<?php
      include('partials/content.php'); 
      if(!isset($_SESSION['student_id'],$_SESSION['username1'], $_SESSION['role1'])){
           header("location:login.php");  
      } 
      if(isset($_GET['id'])) {
	     $sql = "SELECT * FROM job_list WHERE job_id='$_GET[id]'";
	     $result=$conn->query($sql);
	     if($result->num_rows > 0) 
	     {
	      	$row=$result->fetch_assoc();
	      	$com_id=$row['com_id'];
	     }

          $sql1="SELECT * FROM apply_job_post WHERE id='$_SESSION[student_id]' AND job_id='$row[job_id]'";
          $result1=$conn->query($sql1);
          if($result1->num_rows==0) {  
    	          $sql="INSERT INTO apply_job_post(job_id,com_id,id, status) VALUES('$_GET[id]','$com_id','$_SESSION[student_id]', '0')";
               if($conn->query($sql)===TRUE) {
			$_SESSION['jobApplySuccess'] = true;
			header("Location: my_application.php");	
		     }
		else{
			echo "Error " . $sql . "<br>" . $conn->error;
		}
    }  
    else {
		header("Location: offer_internship.php");
    }
} 
else{
	header("Location:offer_internship.php");
}