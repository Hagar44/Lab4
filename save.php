<?php

require_once('db.php');


$errors = array();

if(!isset($_POST['name']) or empty($_POST['name'])){
    $errors['name'] = 'Name is required';
}if(!isset($_POST['email']) or empty($_POST['email'])){
    $errors['email'] = 'Email is required';
}if(!isset($_POST['password']) or empty($_POST['password'])){
    $errors['password'] = 'password is required';
}

$imgName = $_FILES['image']['name'];
$tmpName = $_FILES['image']['tmp_name'];
$ext = pathinfo($_FILES['image']['name'])['extension'];

if(!in_array($ext, ['png', 'jpg'])){
    $errors['imageExt'] = 'Not valid';
}

if(empty($errors)){

    $imgNewName = "images/".time().".".$ext;
    move_uploaded_file($tmpName, $imgNewName);

    $username = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $imagePath = $imgNewName;

    $file = fopen('users.txt', 'a');

    fwrite($file, "$username:$email:$password:$imagePath\n");
    
    fclose($file);
    // exit();
    
    header('location:login.php');

}else{
    $errorsStr = json_encode($errors);
    header("location:register.php?errors=$errorsStr");
}


