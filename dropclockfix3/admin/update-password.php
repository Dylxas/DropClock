<?php include('partials/menu.php'); ?>

    <div class="main-content">
        <div class="wrapper">
            <h1>Change Password</h1>
            <br><br>

        <?php
            if(isset($_GET['id'])){
                $id=$_GET['id'];
            }
        ?>
            <form action="" method="POST">
                <table class='tbl-30'>
                    <tr>
                        <td>Old Password:</td>
                        <td>
                            <input type="password" name="current_password" placeholder="Old Password">
                        </td>
                    </tr>

                    <tr>
                        <td>New Password:</td>
                        <td>
                            <input type="password" name="new_password" placeholder="New Password">
                        </td>
                    </tr>

                    <tr>
                        <td>Confirm Password:</td>
                        <td><input type="password" name="confirm_password" placeholder="Confirm Password"></td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="id" value="<?php echo $id;?>">
                            <input type="submit" name="submit" value="Change Password" class="btn-second">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

 <?php
    //check submit button
    if(isset($_POST['submit'])){

        //echo "button clicked";

        //get data from form
        $id=$POST_['id'];
        $current_password = md5($_POST['current_password']);
        $new_password = md5($_POST['new_password']);
        $confirm_password = md5($_POST['confirm_password']);
        //check curent id and password exist
        $sql = "SELECT * FROM dc_admin WHERE id='$id' AND password='$current_password'";

        //execute query
        $res =mysqli_query($conn, $sql);

        if($res==TRUE){
            //check data
            $count=mysqli_num_rows($res);

            if($count==1){
                //user exist
                echo "user found";
            } else{
                //user doesn't exist set message and redirect
                $_SESSION['user-not-found'] = "<div class='error>User Not Found</div>";
                //redirect
                header('location:'.SITEURL.'admin/manage-admin.php');
            }
        }
        //check new password and confirm password

        //change if all true
    }

 ?>   

<?php include('partials/footer.php'); ?>