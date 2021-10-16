<?php

$connection = mysqli_connect('localhost','root','','practicedb');

if($connection){
    echo "We are connected to the database";
}
else{
    echo("Database connection failed");
}

$query = "CREATE TABLE todos(
    id INT NOT NULL AUTO_INCREMENT,
    todo VARCHAR(100),
    PRIMARY KEY (id)   
)";

$result = mysqli_query($connection,$query);

if(!$result){
    die('Query failed');
}
else
    echo "<br/> Table created <br/>";

?>



