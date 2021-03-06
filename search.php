<!DOCTYPE html>

<html lang="en">

<?php include "includes/db.php";   // we need to connect to the database to access the database..

?>

<?php include "includes/header.php";?>

<body>

    <!-------NAVIGATION------>

    <?php include "includes/navigation.php";?>



    <!-- Page Content -->

    <div class="container">



        <div class="row">



            <!-- Blog Entries Column -->

            <div class="col-md-8">


                

                <?php


        // ---------   SEARCH ENGINE------------

        if(isset($_POST['submit'])){
         $search = $_POST['search'];   // when the search button is clicked 

         $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%'";   // fetch the data from database where somthing similar to the search
         $search_query = mysqli_query($connection, $query);
         if(!$search_query){
            die("QUERY FAILED" . mysqli_error($connection));  // if search query is failed then operation dismiss
         }

         $count = mysqli_num_rows($search_query);  // if nothing to show print no result.
         if($count == 0){
            echo "<h1> NO RESULT </h1>";
         }else{


                while($row = mysqli_fetch_assoc($search_query)){     //we fetch perticular post title from database.

                    $post_title = $row['post_title'];

                    $post_author = $row['post_author'];

                    $post_date = $row['post_date'];

                    $post_image = $row['post_image'];

                    $post_content = $row['post_content'];



                    ?>


                <!-- First Blog Post -->

                <h2>

                    <a href="#"><?php echo $post_title;?></a>

                </h2>

                <p class="lead">

                    by <a href="index.php"><?php echo $post_author; ?></a>

                </p>

                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>

                <hr>

                <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">  <!-- we provide a image referance from the database.  -->

                <hr>

                <p><?php echo $post_content;?></p>

                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>



                <hr>


                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

                

                <?php } 
         }
        }
        ?>


                


            </div>



            <!-- Blog Sidebar Widgets Column -->

            <?php include "includes/sidebar.php";?>

        </div>

        <!-- /.row -->



        <hr>

<?php

include "includes/footer.php";  // it includes thefooter.php file

?>
</div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>



</html>
