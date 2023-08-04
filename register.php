<?php

if(isset($_GET['errors'])){
    $arrErrors = json_decode($_GET['errors'], true);
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>



</head>
<body>


<div class='container'>
    
<form action='save.php' method='POST' enctype='Multipart/form-data'>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input  type="text" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email">
    <span> <?php if(isset($arrErrors['email'])){echo $arrErrors['email'];}  ?> </span>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Name</label>
    <input type="text" class="form-control" name="name" placeholder="name">
    <span> <?php if(isset($arrErrors['name'])){echo $arrErrors['name'];}  ?> </span>

  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password" placeholder="password">
    <span> <?php if(isset($arrErrors['password'])){echo $arrErrors['password'];}  ?> </span>

  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Confirm Password</label>
    <input type="password" class="form-control" name="confPassword" placeholder="confPassword">
    <span> <?php if(isset($arrErrors['confPassword'])){echo $arrErrors['confPassword'];}  ?> </span>

  </div>

<div class="mb-3">
  <label for="formFile" class="form-label">Profilr Picture</label>
  <input class="form-control" type="file" id="formFile" name="image">
</div>

  <button type="submit" class="btn btn-primary">Submit</button>
  <button type="reset" class="btn btn-primary">Reset</button>

</form>

</div>


</body>
</html>