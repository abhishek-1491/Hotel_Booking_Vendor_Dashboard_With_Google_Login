<?php
session_start();

include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            // print_r($user);
            switch ($user['role']) {
                case 'vendor':

                    $_SESSION['vendor'] = [
                        "id" => $user['id'],
                        "name" => $user['name'],
                        "email" => $user['email'],
                        "role" => $user['role']
                    ];
                    // print_r($_SESSION['vendor']);
                    $user_id = $user['id'];
                    $query2 = "SELECT * FROM hotels WHERE vendor_id = '$user_id'";
                    $result2 = $conn->query($query2);
                    if($result2->num_rows > 0){
                        $hotel = $result2->fetch_assoc();
                        $_SESSION['hotel'] = $hotel;
                        // print_r($_SESSION['hotel']);
                        header('location:vendor/vendor_dashboard.php');
                    }
                    else{
                        header('location:vendor/add_Hotel.php');
                    }
                    break;

                default:
                    # code...
                    break;
            }


        } else {
            echo "Invalid password!";
        }
    } else {
        echo "User not found!";
    }
}
?>