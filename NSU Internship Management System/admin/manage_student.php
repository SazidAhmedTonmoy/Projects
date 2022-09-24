<?php 
     include('partials/content.php');
?>  
<div class="main-content">
   <div class="container-fluid">
      <h1>Registered Student List</h1>
      <?php 
           if(isset($_SESSION['delete'])){
                  echo $_SESSION['delete'];
                  unset($_SESSION['delete']);
           }
      ?>
      <div class="jumbotron">
          <div class="card">
             <div class="card-body">

                <table class="tbl-full">
                     <tr>
                        <th width="60">S.No</th>
                        <th width="90">Fisrt Name</th> 
                        <th width="90">Last Name</th> 
                        <th width="150">Email</th> 
                        <th width="90">User Name</th>
                        <th width="80">Resume</th> 
                        <th width="100">Student ID</th>
                        <th width="130">Student Number</th> 
                        <th width="90">Skill</th>
                        <th width="90" class="position">Action</th> 
                     </tr>

                    <?php 
                        $sql="SELECT * FROM student_information";
                        $result = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($result);
 
                        $serial=1;

                        if($count>0){
                            while($row=mysqli_fetch_assoc($result))
                            {
                                $id = $row['id'];
                                $first_name = $row['first_name']; 
                                $last_name = $row['last_name'];
                                $email = $row['email'];
                                $st_user_name = $row['st_user_name'];
                                $resume = $row['resume'];
                                $st_id = $row['st_id'];
                                $st_number = $row['st_number'];
                                $st_password = $row['st_password'];
                                $skill = $row['skill'];
                    ?>
                        <tr>
                            <td><?php echo $serial++; ?></td>
                            <td><?php echo $first_name; ?></td>
                            <td><?php echo $last_name; ?></td>
                            <td><?php echo $email; ?></td>
                            <td><?php echo $st_user_name; ?></td>
                            <td><?php echo $resume; ?></td>
                            <td><?php echo $st_id; ?></td>
                            <td><?php echo $st_number; ?></td>
                            <td><?php echo $skill; ?></td>

                            <td class="position">
                                 <a href="<?php echo site_url;?>admin/delete_student.php?id=<?php echo $id;?>&st_id=<?php echo $st_id;?>" class="btn3">Delete</a>
                            </td>
                        </tr>
                    <?php
                      }
                    }
                 ?>
                 </table>
              </div>
           </div>
        </div>
    </div>  
 </div>
<?php
      include('partials/footer.php'); 
?>