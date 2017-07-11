<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="styles.css" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="shortcut icon" href="favicon.ico" />
        <title>Welcome to IMS</title>
    </head>
    <body>
        IMS<br />
        <a href="bigscreen.php"><button>Big screen</button></a><br />
        <button onclick="goToStand()">stand nr:</button><input type="number" id="stand" value="1"></input>
        
        <script>
            function goToStand(){
                var link = "/IMS/stand.php?id=";
                link += document.getElementById("stand").value.toString();
                window.location.href = link;
            }
        </script>
    
    </body>
</html>
