<?php

$connection = mysqli_connect('localhost','root','','practiceDB');

if($connection){
    echo "We are connected to the database";
}
else{
    echo("Database connection failed");
}

$query = "DELETE FROM cats WHERE id=3";

$result = mysqli_query($connection,$query);

if(!$result){
    die('Query failed');
}
else
    echo "<br/> Table Data Deleted <br/>";


?>



