<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//  echo"<h1>CONNECTED</h1>";

$sql = "insert into users (email, name, password, image) VALUES (?, ?, ?, ?)";
if ($stmt = mysqli_prepare($conn, $sql)){

    mysqli_stmt_bind_param($stmt, "ss", $email, $name, $password, $image) ;
    $result = mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_execute($stmt);
}

if ($password !== $confPassword) {
    echo "Passwords do not match.";
    exit;
}


if ($stmt->execute()) {
    echo "Data stored successfully.";
} else {
    echo "Error storing data: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
