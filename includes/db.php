<?php

//ANOTHER WAY TO CONNECT TO DATABASE IS USING ARRAY AND MAKING EVERYTHING CONSTANT
$db['db_host']="localhost";
$db['db_user']="root";    //here we create an array
$db['db_pass']="";
$db['db_name']="cms";

foreach ($db as $key => $value) {
	define(strtoupper($key), $value);    // make the uppercase means constant.
}

$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);  //all capital letter variables are constant.
/*

if($connection){
	echo "we are connected";
}
*/
 






/* THIS THE NORMAL WAY TO CONNECT TO DATABASE
$connection=mysqli_connect('localhost','root','','cms');   // it will connect the php to the database.
if($connection){
	echo "we are connected";
}
*/

?>