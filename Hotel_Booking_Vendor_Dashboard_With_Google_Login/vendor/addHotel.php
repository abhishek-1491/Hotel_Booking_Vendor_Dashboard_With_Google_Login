<?php
session_start();
include "../db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hotel_name = $_POST['hotel_name'];
    $hotel_email = $_POST['hotel_email'];
    $hotel_mobile = $_POST['hotel_mobile'];
    $hotel_location = $_POST['hotel_location'];
    $vendor_id = $_POST['vendor_id'];
    $hotel_desc = $_POST['hotel_desc'];
    
    // echo "Name = " . $hotel_name;
    // echo "<br>Email = " . $hotel_email;
    // echo "<br>Mobile = " . $hotel_mobile;
    // echo "<br>Location = " . $hotel_location;
    // echo "<br>Desc = " . $hotel_desc;
    // echo "<br>Vendor ID = " . $vendor_id;


    $query = "INSERT INTO hotels (hotel_name,hotel_location,hotel_desc,hotel_email,hotel_mobile,vendor_id) VALUES ('$hotel_name','$hotel_location','$hotel_desc','$hotel_email','$hotel_mobile','$vendor_id')";
    
    if ($conn->query($query)) {
        // $_SESSION['hotel'] = [
        //     "hotel_name" => $hotel_name,
        //     "hotel_email" => $hotel_email,
        //     "hotel_mobile" => $hotel_mobile,
        //     "hotel_location" => $hotel_location,
        //     "hotel_desc" => $hotel_desc
        // ];

        // print_r($_SESSION['hotel']);
        header('location:vendor_dashboard.php');
    } else {
        echo "Error: " . $conn->error;
    }
}
?>