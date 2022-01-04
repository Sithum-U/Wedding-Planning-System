<?php

    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbame = 'DreamWedding';

    $connection = mysqli_connect ('localhost','root','','DreamWedding'  );

    //checking connection
    if (mysqli_connect_errno()){
        die('Database connection failed' . mysqli_connect_error());
    }
?>