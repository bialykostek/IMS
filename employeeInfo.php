<?php
    include "database.php";
    $query = "SELECT * FROM `tasks` WHERE `person`= ".$_GET['id']." LIMIT 1";
    $temp = mysqli_query($link, $query);
    $task = mysqli_fetch_row($temp);
    if(mysqli_num_rows($temp) > 0){
        echo("<h1>".$task[2]." - ".$task[3]."</h1><br / >");
        echo("Person: ".$_GET['id']." - Stand: ".$task[4]);
    }else{
        echo("Nothing to do in this moment :c");
        whoHasJob($_GET['id']);
    }
?>