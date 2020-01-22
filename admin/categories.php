<!DOCTYPE html>
<html lang="en">

<?php
include "includes/admin_header.php";
?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php
        include "includes/admin_navigation.php";
        ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                       <!--  <h1 class="page-header">
                            Wellcome To Blog
                            <small>Author</small>
                        </h1> -->

                    <div class="col-xs-6">

                        <?php
                        insert_categories();               //we add category hare.
                        ?>

                        <form action="" method="post">
                            <div class="form-group">
                                <label for="cat_title"><h2>Add Category</h2></label>
                                <input class="form-control" type="text" name="cat_title">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                            </div>

                            </form>

            <!-- ---------category update ------------------->

                            <?php

                            if(isset($_GET['edit'])){
                                $cat_id = $_GET['edit'];
                                include "includes/update_categories.php";
                                
                            }

                            ?>



                    </div>  <!-- Add Category form-->
                    <div class="col-xs-6">
                        <?php
                        $query="SELECT * FROM categories";
                        $select_categories=mysqli_query($connection,$query);

                        ?>


                    
                        
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Category Title</th>
                </tr>
            </thead>

            <tbody>
                
                    <?php     //--- FIND ALL CATEGORIES-------
                    findAllCategories(); //display category fetch from category table.
                    ?>

        <?php     //------DELETE THE CATEGORY---------
            deleteCategories();
        ?>
                
            </tbody>

        </table>

                    </div>


                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php include "includes/admin_footer.php"; ?>