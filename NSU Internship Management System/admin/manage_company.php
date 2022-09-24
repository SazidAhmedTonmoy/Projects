<?php 
     include('partials/content.php');
?>  
<div class="main-content">
   <div class="container">
      <h1>Registered Company List</h1>
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
                        <th width="50">S.N</th>
                        <th width="140">Company Name</th> 
                        <th width="150">Registered Number</th> 
                        <th width="140">Email</th> 
                        <th width="100">User Name</th> 
                        <th width="110">Address</th>
                        <th width="130">Contact Number</th> 
                        <th width="110">Password</th>
                        <th width="90" >Action</th> 
                     </tr>

                    <?php 
                        $sql="SELECT * FROM company_information";
                        $result = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($result);
 
                        $serial=1;

                        if($count>0){
                            while($row=mysqli_fetch_assoc($result))
                            {
                                $id = $row['com_id'];
                                $com_name = $row['com_name']; 
                                $com_reg_num = $row['com_reg_num'];
                                $email = $row['email'];
                                $user_name = $row['com_user_name'];
                                $com_reg_address = $row['com_reg_address'];
                                $com_number = $row['com_number'];
                                $password = $row['password'];
                    ?>
                        <tr>
                            <td><?php echo $serial++; ?></td>
                            <td><?php echo $com_name; ?></td>
                            <td><?php echo $com_reg_num; ?></td>
                            <td><?php echo $email; ?></td>
                            <td><?php echo $user_name; ?></td>
                            <td><?php echo $com_reg_address; ?></td>
                            <td><?php echo $com_number; ?></td>
                            <td><?php echo $password; ?></td>

                            <td class="position">
                              <a href="<?php echo site_url;?>admin/delete_company.php?id=<?php
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