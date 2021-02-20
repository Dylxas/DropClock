<?php 


    //include constant.php file here
    include('../config/constants.php');

    //get id to delete
    $id = $_GET['id'];

    //create query delete
    $sql = "DELETE FROM dc_admin WHERE id=$id";

    //Execute the query
    $res = mysqli_query($conn, $sql);

    //check query execute
    if($res==true)
    {
        //query executed successfully and admin deleted
        //echo "Admin Deleted";
        //create session variable to display message
        $_SESSION['delete'] = "<div class='success'> Admin Deleted Successfully.</div>";
        //redirect to manage Admin Page
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
    else
    {
        //Failed to Delete Admin
        //echo "Failed to Delete Admin";

        $_SESSION['delete'] = "<div class='succeerrorss'>Failed to Delete Admin. try Again Later.</div";
        header('location:'.SITEURL.'admin/manage-admin.php');
    }


    //back to manage admin failed/success
 
?>