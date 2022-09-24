<?php
        ob_start();
        include('partials/content.php'); 
?>
<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>
        <br><br>
        <?php 

            $id=$_GET['id'];
            $sql="SELECT * FROM admin WHERE id=$id";

            $res=mysqli_query($conn, $sql);

            if($res==true){

                $count = mysqli_num_rows($res);
                if($count==1){

                    $rows=mysqli_fetch_assoc($res);

                      $username = $rows['username'];
                         $email = $rows['email'];
                }
                else{
                    header("location:manage_admin.php");
                }
            }  
        ?>

        <form action="" method="POST">
           

            <div class="container">
                <div class="row">
                    <div class="col-sm-4 mx-auto">
                      <div class="card m-4">
                          <div class="card-body bg-light text-center">

           <table>
                <tr>
                    <td>User Name:</td>
                    <td>
                        <input type="text" name="user_name" value="<?php echo $username;?>">
                    </td>
                </tr>
                <tr>
                    <td>Email: </td>
                    <td>
                        <input type="text" name="email" value="<?php echo $email; ?>">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Admin" class="btn-primary">
                    </td>
                </tr>
            </table>
                               
                          </div>    
                       </div>       
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?php 
    if(isset($_POST['submit'])){

        $id = $_POST['id'];
        $user_name = $_POST['user_name'];
        $email = $_POST['email'];

        $sql="UPDATE admin SET username='$user_name', email='$email' WHERE id='$id'";

        $res = mysqli_query($conn, $sql);
        if($res==true){
            $_SESSION['update'] = "<div class='success'>Admin Updated Successfully.</div>";
            header('location: manage_admin.php');
        }
        else{
            $_SESSION['update'] = "<div class='error'>Failed to Delete Admin.</div>";
            header('location: manage_admin.php');
        }
    }

?>
<?php 
       ob_end_flush();
       include('partials/footer.php');
?>