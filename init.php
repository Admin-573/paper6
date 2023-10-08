<?php
    
    $host='127.0.0.1';
    $user='root';
    $pass='1234';
    $db='mat';

    //tables
    $reg='reg';

    //register content
    $rid='rid';
    $remail='remail';
    $rpass='rpass';
    $rdate='rdate';
    $rgender='rgender';
    $rheight='rheight';
    $rstatus='rstatus';
    $rlang='rlang';
    $religious='religious';
    $rcity='rcity';
    $rmno='rmno';
    $email='email';
    //login content
    $lemail='lemail';
    $lpass='lpass';
    $lcity='lcity';
    $lreligious='lreligious';

    $con = mysqli_connect($host,$user,$pass,$db);
    if(!$con){
        echo "Not";
    } else {
        //echo "Connected";
    }

?>