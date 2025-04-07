<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = "INSERT INTO users (name, email, password,role) VALUES ('$name', '$email', '$password','$role')";
    
    if ($conn->query($query)) {
        header('location:login.html');
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
