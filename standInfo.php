<script>
    function brought(id, person){
        window.location.href = "/IMS/brought.php?id="+id.toString()+"&stand="+<?php echo($_GET['id']); ?>+"&person="+person.toString();
    }
</script>
<?php
    include "database.php";
    $query = "SELECT `NoE` FROM `settings` WHERE `id` = 1";
    $temp = mysqli_query($link, $query);
    $temp1 = mysqli_fetch_assoc($temp);
    
    $anyone = false;
    for($i = 0; $i < $temp1['NoE']; $i++){
        $query = "SELECT * FROM `tasks` WHERE `stand`= ".$_GET['id']." AND `person`=$i LIMIT 1";
        $temp = mysqli_query($link, $query);
        $task = mysqli_fetch_row($temp);
        if(mysqli_num_rows($temp) > 0){
            $anyone = true;
            echo("<button onclick='brought(".$task[0].",".$task[1].")'><div>");
            echo("<h1>".$task[2]." - ".$task[3]."</h1><br />");
            echo("Person: ".$task[1]." - Stand: ".$task[4]);
            echo("</div></button>");
        }
        
    }
    if(!$anyone){
        echo("Waiting for tasks...");
    }
?>
