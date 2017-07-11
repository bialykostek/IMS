<?php

include "database.php";

session_start();

if(isset($_POST["standset"])){
    $_SESSION['stand'] = $_POST['stand'];
}

if(!isset($_SESSION['stand'])){
    ?>

    <form method="post">
        <input type="number" name="stand" value="1" />
        <input type="submit" name="standset" />
    </form>

    <?php
}else{

    $djangodb = mysqli_connect("localhost", "root", "Palonek$$$", "djangotests");
    if(!$link){
        die("Some fucking error while connecting to the Django database");
    }

    $task = array();

    $query = "SELECT `NoE` FROM `settings` WHERE `id` = 1";
    $temp = mysqli_query($link, $query);
    $temp1 = mysqli_fetch_assoc($temp);

    $min = 10000000;
    $person = 0;        

    for($i = 0; $i < $temp1['NoE']; $i++){
        $query = "SELECT * FROM `tasks` WHERE `person`=$i";
        $temp = mysqli_query($link, $query);
        if(mysqli_num_rows($temp) <= $min){
            $min = mysqli_num_rows($temp);
            $person = $i;
        }
    }

    $query = "SELECT `book_type_id` FROM `books_book` WHERE `order_id`=".$_GET['id'];
    $tempx = mysqli_query($djangodb, $query);

    while($order = mysqli_fetch_assoc($tempx)){

        $query = "SELECT `title`, `isbn` FROM `books_booktype` WHERE `id`=".$order['book_type_id'];
        $temp = mysqli_query($djangodb, $query);
        $temp1 = mysqli_fetch_assoc($temp);

        $query = "INSERT INTO `tasks` (`person`, `book`, `ISBN`, `stand`) VALUES ($person, '".$temp1['title']."', ".$temp1['isbn'].", ".$_SESSION['stand'].")";
        if(!mysqli_query($link, $query)){
            die("Don't Worry Be Happy, don't think about this fucking system");
        }
        
    }
    echo "<script>window.close();</script>";
}

?>