<?php include('../config/constants.php')?>

<html>
    <head>
        <title>Login - Drop Clock</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>

    <body>
        
        <div class="login">
            <h1 class="text-center">Login</h1>
            <br>
            <?php 
                if (isset($_SESSION['login'])){
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

                if(isset($_SESSION['no-login-message']))
                {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
            ?>

            <br><br>

            <!-- login form -->
            <form action="" method="POST" class="text-center">
                Username: <br>  
                <input type="text" name="username" placeholder="enter username"><br><br>

                password: <br>
                <input type="password" name="password" placeholder="enter password"><br><br>

                <input type="submit" name="submit" value="login" class="btn-primary">
            </form>
            <!-- !login form -->
            <br><p class="text-center">DropClock</p>
        </div>

    </body>
</html>

<?php
    //check the submit button 
    if(isset($_POST['submit'])){
        //process login
        //get data from login
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        //check user
        $sql="SELECT * FROM dc_admin WHERE username='$username' AND password='$password'";

        //execute query
        $res = mysqli_query($conn, $sql);

        //count row
        $count = mysqli_num_rows($res);

        if($count==1){
            //user exist, success
            $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
            $_SESSION['user'] = $username; //to check whether the user is logged in or not and logout will unset it

            //redirect to home page/dashboard
            header('location:'.SITEURL.'admin/');
        }else{
            //user not available, fail
            $_SESSION['login'] = "<div class='error text-center'>Username or Password did not match.</div>";
            //redirect to home Page/dashboard
            header('location:'.SITEURL.'admin/login.php');
        }
    }
?>