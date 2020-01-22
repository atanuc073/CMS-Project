<?php 

if(isset($_POST['create_post'])){

	$post_title=$_POST['title'];
	$post_author=$_POST['author'];
	$post_category_id = $_POST['post_category_id'];
	$post_status=$_POST['post_status'];
	$post_image=$_FILES['image']['name']; //to get the image we need to use the $_FILES global variable.
	$post_image_temp = $_FILES['image']['tmp_name'];
	$post_tags = $_POST['post_tags'];
	$post_content = $_POST['post_content'];
	$post_date = date('d-m-y');  // to get date we use date function
	$post_comment_count = 4;



	// function to send the file from the temporary location to the images so that it can be stored in the database  we use the function move_uploaded_file(temporary, the location you want to store)


	move_uploaded_file($post_image_temp,"../images/$post_image");   // this will upload the file to the images folder.


	$query="INSERT INTO posts(post_category_id,post_title,post_author,post_date,post_image,post_content,post_tags,post_comment_count,post_status)";
	$query.="VALUES({$post_category_id},'{$post_title}','$post_author',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_comment_count}','{$post_status}' )";


	$create_post_query= mysqli_query($connection, $query);

	confirmQuery($create_post_query);
}

?>




				<h1 class="page-header">
				Add Posts
				<small>atanuc73</small>
				</h1>
				</div>
				</div>




<form action="" method="post" enctype="multipart/form-data">   <!-- to select image we here use enctype -->
	<div class="form-group">
		<label for="title">Post Title</label>
		<input type="text" class="form-control" name="title">
	</div>
	<div class="form-group">
		<label for="post_category">Post Category</label>
		<input type="text" class="form-control" name="post_category_id">
	</div>

	<div class="form-group">
		<label for="author">Post Author</label>
		<input type="text" class="form-control" name="author">
	</div>
	<div class="form-group">
		<label for="post_status">Post Status</label>
		<input type="text" class="form-control" name="post_status">
	</div>
	<div class="form-group">
		<label for="post_image">Post Image</label>
		<input type="file" class="form-control" name="image">
	</div>
	<div class="form-group">
		<label for="post_tags">Post Tags</label>
		<input type="text" class="form-control" name="post_tags">
	</div>
	<div class="form-group">
		<label for="post_content">Post Content</label>
		<textarea class="form-control" name="post_content" id="" cols="30" rows="10"></textarea>
	</div>
	<div class="form-group">
		<input type="submit" name="create_post" value="Publish Post" class="btn btn-primary">
		
	</div>

</form>