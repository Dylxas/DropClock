<?php include('partials/menu.php'); ?>

            <!-- Menu Content Section Starts -->
            <div class="main-content">
                <div class="wrapper">
                    <h1>Manage Admin</h1>
                    <br /> 

                    <?php
                        if(isset($_SESSION['add'])){
                            echo $_SESSION['add'];//displaying Session message
                            unset($_SESSION['add']);//Removing session message
                        }

                        if(isset($_SESSION['delete']))
                        {
                            echo $_SESSION['delete'];
                            unset($_SESSION['delete']);
                        }
                        if(isset($_SESSION['delete']))
                        {
                            echo $_SESSION['update'];
                            unset($_SESSION['update']);
                        }      

                        if(isset($_SESSION['user-not-found'])){
                            echo $_SESSION['user-not-found'];
                            unset($_SESSION['user-not-found']);
                        }
                    ?>
                    <br /> <br /> <br />

                    <!-- Button to add admin -->
                    <a href="add-admin.php" class=btn-primary>Add admin</a>

                    <br /> <br /> <br />

                    <table class="tbl-full">
                        <tr>
                            <th>S.N.</th>
                            <th>Full Name</th>
                            <th>Username</th>
                            <th>Actions</th>
                        </tr>
                        
                        <?php
                            //query to get all admin
                            $sql = "SELECT * FROM dc_admin";
                            //execute
                            $res = mysqli_query($conn, $sql);

                            //check db execute
                            if($res==TRUE){
                                // count rows check
                                $count =mysqli_num_rows($res);// function to get all the rows in database

                                //check row
                                if($count>0){
                                    //We have data
                                    while($rows=mysqli_fetch_assoc($res)){
                                        //use loop to get all data

                                        //getting data
                                        $id=$rows['id'];
                                        $full_name=$rows['full_name'];
                                        $username=$rows['username'];

                                        //display values in table
                                        ?>

                                         <tr>
                                            <td><?php $n =1; echo $n++; ?> </td>
                                            <td><?php echo $full_name; ?></td>
                                            <td><?php echo $username; ?></td>
                                            <td>
                                                <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id ?>" class="btn-primary">Change Password</a>
                                                <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id ?>" class=btn-second>Update Admin</a>
                                                <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id ?>" class=btn-danger>Delete Admin</a>
                                            </td>
                                        </tr>
                                        
                                        <?php
                                    }
                                }else{
                                    //we dont
                                }
                            }
                        ?>


                    </table>

                </div>
            </div>
            <!-- Main Content Section Ends -->


<?php include('partials/footer.php'); ?>


