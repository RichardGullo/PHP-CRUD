<?php

$connection = mysqli_connect('localhost','root','','practiceDB');

if($connection){
    echo "We are connected to the database";
}
else{
    echo("Database connection failed");
}

$name = $_POST['update-name'];
$id = $_POST['update-id'];

$query = "UPDATE cats SET name = ". "'".$name."'".
         " WHERE id = ".$id;

$result = mysqli_query($connection,$query);

if(!$result){
    die('Query failed');
}
else
    echo "<br/> Data inserted into table. <br/>";


?>