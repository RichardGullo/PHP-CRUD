<?php

$connection = mysqli_connect('localhost','root','','practiceDB');

if($connection){
    echo "We are connected to the database";
}
else{
    echo("Database connection failed");
}

$id = $_POST['delete-id'];

$query = "DELETE FROM todos WHERE"." id=".$id;

$result = mysqli_query($connection,$query);

if(!$result){
    die('Query failed');
}
else
    echo "<br/> Table Data Deleted <br/>";


?>



