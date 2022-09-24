<?php
     include ("../database/database-connection.php");

$limit = 4;

if(isset($_GET["page"])) {
	$page = $_GET['page'];
} else {
	$page = 1;
}
$start_from = ($page-1) * $limit;
$sql = "SELECT * FROM job_list LIMIT $start_from, $limit";
$result = $conn->query($sql);
if($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$sql1 = "SELECT * FROM company_information WHERE com_id='$row[com_id]'";
              $result1 = $conn->query($sql1);
              if($result1->num_rows > 0) {
                while($row1 = $result1->fetch_assoc())
                {
             ?>
		   <div class="attachment-block clearfix">
             <div class="card">
             <h4 class="attachment-heading">
               <a style="text-decoration: none;" href="view_job_post.php?id=<?php echo $row['job_id'];?>"><?php echo $row['job_name'];?></a>
                <div>
                     <strong>
                             <?php echo $row1['com_name']; ?>
                     </strong>
                </div>          
        </div>
       </div>
		<?php
			}
		}
	}
}
?>



