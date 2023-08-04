<?php

$email = $_GET['email'];

$data = file('users.txt');

foreach ($data as $key => $value) {

    $line = explode(':', $value);

    if($email == $line[1]){
        unset($data[$key]);
        break;
    }

}

$file = fopen('users.txt', 'w');

foreach ($data as $key => $value) {
    fwrite($file, $value);
}

fclose($file);

header('location:home.php');
