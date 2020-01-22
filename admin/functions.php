<?php


function confirmQuery($result){          //to check the query is working

    global $connection;

    if(!$result){
        die("QUERY FAILED".mysqli_error($connection));
    }
}




function insert_categories(){

	global $connection;


	if(isset($_POST['submit'])){
                            $cat_title = $_POST['cat_title'];

                            if($cat_title==""||empty($cat_title)){
                                echo "<h2><b>This field should not be empty</b></h2>";
                            }else{
                                $query ="INSERT INTO categories(cat_title) ";
                                $query .="VALUE('{$cat_title}')";
                                $create_category_query = mysqli_query($connection,$query);
                                if(!$create_category_query){
                                    die("QUERY FAILED" . mysqli_error($connection));
                                }
                            }
                        }               //we add category hare.

}





function findAllCategories(){


			global $connection;
			$query="SELECT * FROM categories";
			$select_categories=mysqli_query($connection,$query);

			while($row=mysqli_fetch_assoc($select_categories)){
			$cat_id=$row['cat_id'];
			$cat_title=$row['cat_title'];

			echo "<tr>";
			echo "<td>{$cat_id}</td>";
			echo "<td>{$cat_title}</td>";
			echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
			echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
			echo "</tr>";

			}  //display category fetch from category table.
}



function deleteCategories(){
	global $connection;



	if(isset($_GET['delete'])){
            echo "<font color='rgb(139, 13, 229)'><h2>Are you sure you want to delete</h2></font>";
            ?>
            <form action="" method="post">
                <div class="form-group">
                <input class="btn btn-primary" type="submit" name="yes" value="YES">
                <input class="btn btn-primary" type="submit" name="no" value="NO">
                </div>    
            </form>




    <?php 
        if(isset($_POST['yes'])){

            $del_cat_id = $_GET['delete'];
            $query="DELETE FROM categories WHERE cat_id = {$del_cat_id}";
            $delete_query = mysqli_query($connection,$query);
            header("location:categories.php");  // this actually refresh the page

        }
        if(isset($_POST['no'])){

            header("location:categories.php");  // back to the categories.php page.

        }
    }






}


?>