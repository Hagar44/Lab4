<?php
    $email = $_GET['email'];
    $data = file('users.txt');
    $user = null;

    foreach ($data as $key => $value) {

        $line = explode(':', $value);

        if($email == $line[1]){
            $user = $line;
            break;
        }

    }

    if(!$user){
        header('location:home.php');
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $imagePath = $imgNewName;

        $user[0] = $name;
        $user[1] = $email;
        $user[3] = $password;
        $user[4] = $imagePath;


        $data[$key] = implode(':', $user) . "\n";

        $file = fopen('users.txt', 'w');

        foreach ($data as $key => $value) {
            fwrite($file, $value);
        }

        fclose($file);

        header('location:home.php');
    }


?>


<!DOCTYPE html>
<html>
<head>
    <title>Edit</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

    <div class="container">
        <h2>Edit User</h2>
        <form method="POST">
            <div class="form-group">
                <label for="name"> Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $user[0]; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" id="email" name="email" value="<?php echo $user[1]; ?>">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="text" class="form-control" id="password" name="password" value="<?php echo $user[2]; ?>">
            </div>
            <div class="">
                <label for="confPassword">Confirm Password:</label>
                <input type="text" class="form-control" id="confPassword" name="confPassword" value="<?php echo $user[3]; ?>">
            </div>
            <div class="mb-3 form-group">
            <label for="formFile" class="form-label">Profilr Picture</label>
            <input class="form-control" type="file" id="formFile" name="image"  value="<?php echo $user[4]; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>

</body>
</html>