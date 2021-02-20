<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br /><br />

        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td><input type="text" name="full_name" placeholder="Enter Your Full Name"></td>
                    <td></td>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td><input type="text" name="username" placeholder="Your Username"></td>
                    <td></td>
                </tr>

                <tr>
                    <td>Password: </td>
                    <td><input type="password" name="password" placeholder="Your Password"></td>
                    <td></td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-second"> 
                    </td>
                </tr>

            </table>
            
        </form>


    </div>
</div>

<?php include('partials/footer.php'); ?>

<?php 
    //process the value from form and save in db

    //check btn

    if(isset($_POST['submit'])){
        //button clicked
        //echo "ButtonClicked";

        //get data from form 
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']); //encrypt md5

        //SQL query save data to db
        $sql = "INSERT INTO dc_admin SET
            full_name='$full_name',
            username='$username',
            password='$password'
        ";

        //exec
        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        //check if saved or failed
        if($res==TRUE){
            //check done
            //echo"done";
            //create a session variable to display
            $_SESSION['add'] = "Admin Successfully";
            //Redirect Page MANAGE ADMIN
            header("location:".SITEURL.'admin/manage-admin.php');
        }else{
            //check faild
            //echo"failed";
            //create a session variable to display
            $_SESSION['add'] = "Failed to Admin";
            //Redirect Page add ADMIN
            header("location:".SITEURL.'admin/add-admin.php');
        }
    }

?>