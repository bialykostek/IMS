<?php

    $link = mysqli_connect("localhost", "root", "password", "ims");
    if(!$link){
        die("Some fucking error while connecting to the database");
    }
    if (!$link->set_charset("utf8")) {
        die("Error loading character set utf8: ".$link->error);
    }

    function whoHasJob($free){
        $link = $GLOBALS['link'];
        
        $query = "SELECT `NoE` FROM `settings` WHERE `id` = 1";
        $temp = mysqli_query($link, $query);
        $temp1 = mysqli_fetch_assoc($temp);
        
        $max = 0;
        $person = 0;        
        
        for($i = 0; $i < $temp1['NoE']; $i++){
            $query = "SELECT * FROM `tasks` WHERE `person`=$i";
            $temp = mysqli_query($link, $query);
            if(mysqli_num_rows($temp) > $max){
                $max = mysqli_num_rows($temp);
                $person = $i;
            }
        }
        
        if($max > 1){
            $query = "SELECT `id` FROM `tasks` WHERE `person`=$person ORDER BY `id` DESC LIMIT 1";
            $temp = mysqli_query($link, $query);
            $temp1 = mysqli_fetch_assoc($temp);

            $query = "UPDATE `tasks` SET `person`=$free WHERE `id`=".$temp1['id'];
            if(!mysqli_query($link, $query)){
                die("Meh, something fucked up again,".$query);
            }
        }
    }

?>
