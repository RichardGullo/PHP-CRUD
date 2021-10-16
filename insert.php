<?php

$connection = mysqli_connect('localhost','root','','practiceDB');

if($connection){
    // echo "We are connected to the database";
}
else{
    echo("Database connection failed");
}

$textField = $_POST['test'];

$query = "INSERT INTO todos(todo)
        VALUES(".'"'.$textField.'"'.")";


$result = mysqli_query($connection,$query);

if(!$result){
    die('Query failed');
}
else{

    $query = "SELECT * FROM todos ORDER BY id DESC LIMIT 1";

    $result = mysqli_query($connection,$query);

    if(!$result){
        die('Query failed');
    }
    else{

        $result = mysqli_fetch_assoc($result);
        echo "{".
            '"todo":'."\"".$result["todo"]."\"".",".
            '"id":'.$result["id"].
            "}";
    }
}



?>