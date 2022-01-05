<?php 
    $con = new mysqli('localhost', 'root', 'fosa980515', 'gdlwebcamp');
    if($con->connect_error) {
        echo $error -> $con->connect_error;
    }
?>