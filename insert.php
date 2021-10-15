<?php

$connection = mysqli_connect('localhost','root','','practiceDB');

if($connection){
    echo "We are connected to the database";
}
else{
    echo("Database connection failed");
}

$query = "INSERT INTO cats(name,age)
        VALUES('Dusty',7)";

$result = mysqli_query($connection,$query);

if(!$result){
    die('Query failed');
}
else
    echo "<br/> Data inserted into table. <br/>";


?>