<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="styles.css" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="shortcut icon" href="favicon.ico" />
        <script src="jquery.js"></script>
        <title>-| IMS |-</title>
        <script>
            <?php
                include "database.php";
                $query = "SELECT `NoE` FROM `settings` WHERE `id` = 1";
                $temp = mysqli_query($link, $query);
                $temp1 = mysqli_fetch_assoc($temp);
                
                for($i = 0; $i < $temp1['NoE']; $i++){
                    ?>
                    
                    $(document).ready(function() {
                    $("#loader<?php echo($i); ?>").load("employeeInfo.php?id="+<?php echo($i); ?>);
                    var refresh = setInterval(function() {
                    $("#loader<?php echo($i); ?>").load("employeeInfo.php?id="+<?php echo($i); ?>);
                    }, 500);
                    });
                    
                    <?php
                }
            ?>
            
        </script>
    </head>
    <body>
        <?php
            for($i = 0; $i < $temp1['NoE']; $i++){
                ?>
                <div id="loader<?php echo($i); ?>"></div>
                <?php
            }
        ?>
    </body>
</html>
