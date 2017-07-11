<?php
    include "database.php";
    $query = "DELETE FROM `tasks` WHERE `id`=".$_GET['id'];
    if(!mysqli_query($link, $query)){
        die("Well, the program has just fucked up. Have a nice day :)");
    }
    $query = "SELECT * FROM `tasks` WHERE `person`= ".$_GET['person']." LIMIT 1";
    
    $temp = mysqli_query($link, $query);
    $task = mysqli_fetch_row($temp);
    if(mysqli_num_rows($temp) == 0){
        whoHasJob($_GET['person']);
    }

    header("Location: stand.php?id=".$_GET['stand']);
?>