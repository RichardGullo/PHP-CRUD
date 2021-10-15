<?php

$connection = mysqli_connect('localhost','root','','practiceDB');

if(!$connection){
    die("Database connection failed");
}

$query = "SELECT * FROM cats";

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
                                    '"name":'."\"".$row["name"]."\"".",".
                                    '"id":'.$row["id"].
                                    "}".",";
            else
                $string = $string."{".
                                    '"name":'."\"".$row["name"]."\"".",".
                                    '"id":'.$row["id"].
                                    "}";
    }

    echo "[".$string."]";

}

    echo `[
            {"name":"dusty", id:}
        
        ]`;

    


?>