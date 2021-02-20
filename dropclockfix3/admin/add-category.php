<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
    <h1>Add Category</h1>

    <br><br>

    <?php
    
        if(isset($_SESSION['add'])){
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }

    ?>
    
    <!-- Add Category Fom -->
    <form action=""method="POST">

        <table class="tbl-30">
            <tr>
                <td>Title:</td>
                <td>
                    <input type="text" name="title" placeholder="Category title">
                </td>
            </tr>

            <tr>
                <td>Featured:</td>
                <td>
                    <input type="radio" name="featured" placeholder="YES">YES
                    <input type="radio" name="featured" placeholder="NO">NO
                </td>
            </tr>      
            
            <tr>
                <td>Active:</td>
                <td>
                    <input type="radio" name="active" placeholder="YES">YES
                    <input type="radio" name="active" placeholder="NO">NO
                </td>
            </tr>   

            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Add Category" class="btn-second">
                </td>
            </tr>                
        </table>

    </form>
    <!-- !Add Category Form -->

    <?php
        //check whether the submit button is clicked or not
        if(isset($_POST['submit'])){
            //echo "Clicked";

            //get value from form
            $title =$_POST['title'];

            //radio input
             if(isset($_POST['featured'])){
                 $featured = $_POST['featured'];
             }else{
                 //set deafult vlue
                 $featured = 'No';
             }

             if(isset($_POST['active'])){
                $active = $_POST['active'];
            }else{
                //set deafult vlue
                $active = 'No';
            }

            //sql query
            $sql = "INSERT INTO dc_category SET
                title='$title,
                featured='$featured',
                active='$active";
             
            //execute query 
            $res = mysqli_query($conn, $res);

            //check query executed
            if($res==true){
                $_SESSION['add'] = "<div class='success'>Category added successfully.</div>";
                //redirect to manage Category Page
                header("location:".SITEURL.'admin/manage-category.php');
            }else{
                //failed to add
                $_SESSION['add'] = "<div class='error'>Failed to Add Category.</div>";
                //redirect to manage Category Page
                header("location:".SITEURL.'admin/add-category.php');                
            }
        }

        

 
    ?>

    </div>
</div>
<?php include('partials/footer.php'); ?>