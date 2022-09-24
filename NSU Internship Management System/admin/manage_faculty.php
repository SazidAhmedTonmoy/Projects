<?php 
     include('partials/content.php');
?>  
<div class="main-content">
   <div class="container">
      <h1>Registered Faculty List</h1>
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
                        <th width="90">Serial No</th>
                        <th width="140">Fisrt Name</th> 
                        <th width="120">Last Name</th> 
                        <th width="180">Email</th>
                        <th width="110">User Name</th> 
                        <th width="110">Faculty ID</th>
                        <th width="150">Faculty Number</th> 
                        <th width="110">Password</th>
                        <th width="100" class="position">Action</th> 
                     </tr>

                    <?php 
                        $sql="SELECT * FROM faculty_information";
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
                                $fac_user_name = $row['fac_user_name'];
                                $fac_id = $row['fac_id'];
                                $fac_number = $row['fac_number'];
                                $fac_password = $row['fac_password'];
                    ?>
                        <tr>
                            <td><?php echo $serial++; ?></td>
                            <td><?php echo $first_name; ?></td>
                            <td><?php echo $last_name; ?></td>
                            <td><?php echo $email; ?></td>
                            <td><?php echo $fac_user_name; ?></td>
                            <td><?php echo $fac_id; ?></td>
                            <td><?php echo $fac_number; ?></td>
                            <td><?php echo $fac_password; ?></td>

                            <td class="position">
                              <a href="<?php echo site_url;?>admin/delete_faculty.php?id=<?php
                              echo $id;?>"class="btn3">Delete</a>
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