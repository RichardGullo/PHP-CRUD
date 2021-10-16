<?php

$connection = mysqli_connect('localhost','root','','practiceDB');

if(!$connection){
    die("Database connection failed");
}

$query = "SELECT * FROM todos";

$result = mysqli_query($connection,$query);

if(!$result){
    die('Query failed');
}
else{
    $string = "";
    $num_rows = mysqli_num_rows($result);
    $i = 0;
    while($row = mysqli_fetch_assoc($result)){

            if($i++ != (mysqli_num_rows($result)-1))
                $string = $string."{".
                                    '"todo":'."\"".$row["todo"]."\"".",".
                                    '"id":'.$row["id"].
                                    "}".",";
            else
                $string = $string."{".
                                    '"todo":'."\"".$row["todo"]."\"".",".
                                    '"id":'.$row["id"].
                                    "}";
    }

    echo "[".$string."]";

}



?>