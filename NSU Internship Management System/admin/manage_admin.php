<?php
      include('partials/content.php');
 ?>
        <div class="main-content">
            <div class="container">
                <h1>Registered Admin</h1>
                </br>
                <?php 
                    if(isset($_SESSION['add'])){
                        echo $_SESSION['add']; 
                        unset($_SESSION['add']); 
                    }

                    if(isset($_SESSION['delete'])){
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }
                    
                    if(isset($_SESSION['update'])){
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }

                    if(isset($_SESSION['user-not-found'])){
                        echo $_SESSION['user-not-found'];
                        unset($_SESSION['user-not-found']);
                    }

                    if(isset($_SESSION['password-not-match'])){
                        echo $_SESSION['password-not-match'];
                        unset($_SESSION['password-not-match']);
                    }

                    if(isset($_SESSION['change-password'])){
                        echo $_SESSION['change-password'];
                        unset($_SESSION['change-password']);
                    }
                ?>
                <a href="add_admin.php" class="btn3">Add Admin</a>

                <br /><br />

       <div class="jumbotron">
           <div class="card">
             <div class="card-body">
                <table class="tbl-full">
                    <tr>
                        <th width="90">Serial No</th>
                        <th width="100">Username</th>
                        <th width="100">Email</th>
                        <th width="110">Password</th>
                        <th width="300">Actions</th>
                    </tr>

                    <?php 
                         $sql = "SELECT * FROM admin";                
                         $res = mysqli_query($conn, $sql);

                         if($res==TRUE){
                             
                             $count = mysqli_num_rows($res); 
                             $sn=1; 

                             if($count>0){
                               while($rows=mysqli_fetch_assoc($res)){
                                 
                                  $id = $rows['id'];
                                  $username = $rows['username'];
                                  $email = $rows['email'];
                                  $password = $rows['password'];
                    ?>
                                    
                    <tr class="position">
                        <td><?php echo $sn++; ?>. </td>
                        <td><?php echo $username; ?></td>
                        <td><?php echo $email; ?></td>
                        <td><?php echo $password; ?></td>
                        <td>
                           <a href="<?php echo site_url; ?>admin/update_admin_password.php?id=<?php echo $id; ?>" class="btn3">Change Password</a>
                           <a href="<?php echo site_url; ?>admin/update_admin.php?id=<?php echo $id; ?>" class="btn3">Update Admin</a>
                           <a href="<?php echo site_url; ?>admin/delete_admin.php?id=<?php echo $id; ?>" class="btn3">Delete Admin</a>
                        </td>
                    </tr>

                            <?php

                              }
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