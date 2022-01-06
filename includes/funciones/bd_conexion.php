<?php 
    $con = new mysqli('us-cdbr-east-05.cleardb.net', 'b00601d5c8c502', '7252e53d', 'heroku_1e157c917ea1b5f');
    if($con->connect_error) {
        echo $error -> $con->connect_error;
    }
