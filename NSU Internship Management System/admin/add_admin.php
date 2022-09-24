<?php 
      ob_start();
      include('partials/content.php');
 ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br><br>

        <?php 
            if(isset($_SESSION['add'])) 
            {
                echo $_SESSION['add']; 
                unset($_SESSION['add']);
            }
        ?>

        <form action="" method="POST">
            <table>
                <tr>
                    <td>User Name: </td>
                    <td>
                        <input type="text" name="user_name" placeholder="Enter Your username">
                    </td>
                </tr>

                <tr>
                    <td>Email: </td>
                    <td>
                        <input type="text" name="email" placeholder="Your email">
                    </td>
                </tr>

                <tr>
                    <td>Password: </td>
                    <td>
                        <input type="text" name="password" placeholder="Your Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-primary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>


<?php 

    if(isset($_POST['submit'])){

        $user_name = $_POST['user_name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "INSERT INTO admin SET 
            username='$user_name',
            email='$email',
            password='$password'
        ";
 
        $res = mysqli_query($conn, $sql);

        if($res==TRUE)
        {
            $_SESSION['add'] = "<div class='success'>Admin Added Successfully.</div>";
            header("location:manage_admin.php");
        }
        else
        {
            $_SESSION['add'] = "<div class='error'>Failed to Add Admin.</div>";
            header("location:add_admin.php");
        }
    }   
?>
<?php 
      ob_start();
      include('partials/footer.php'); 
?>
