<?php

$con = mysqli_connect('127.0.0.1:3316', 'root', '123', 'myshop');
if ($con) {
    echo "connected";
} else {
    die(mysqli_error($con));
}


?>