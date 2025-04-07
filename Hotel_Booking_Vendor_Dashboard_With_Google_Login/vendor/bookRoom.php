<?php

include '../db.php';

$jsonData = file_get_contents("php://input");

$data = json_decode($jsonData, true);

// customer details
$customerID = "customer_" . mt_rand(1000, 9999);
$userID = $data["user_id"];
$firstName = $data["firstName"];
$lastName = $data["lastName"];
$mobile = $data["mobile"];
$email = $data["email"];
$idType = $data["idType"];
$idNumber = $data["idNumber"];
$address = $data["address"];

// hotel book details
$hotelID = $data["hotel_id"];
$room_Type = $data["room_Type"];
$room_No = $data["roomNo"];
$checkIN = $data["checkIN"];
$checkOUT = $data["checkOUT"];
$totalAmount = $data["totalAmount"];






// $customerInsert = $conn->prepare("INSERT INTO customers (customer_id,user_id,first_name,last_name,mobile,email,id_card_type,id_number,address) VALUES (?,?,?,?,?,?,?,?,?)");
// $customerInsert->bind_param("sississss",$customerID,$userID,$firstName,$lastName,$mobile,$email,$idType,$idNumber,$address );

// if ($customerInsert->execute()) {

//     $insertBooking = $conn->prepare("INSERT INTO booking (user_id,hotel_id,room_type,room_no,check_in_date,checkout_date,total_price,customer_id) VALUES (?,?,?,?,?,?,?,?)");
//     $insertBooking->bind_param("iissssss",$userID,$hotelID,$room_Type,$room_No,$checkIN,$checkOUT,$totalAmount,$customerID);

//     if($insertBooking->execute()){


//         echo json_encode(["status" => "success", "booking stored"]);
//     }
// } else {
//     echo json_encode(["status" => "error", "message" => $conn->error]);
// }

$customerInsert = $conn->prepare("INSERT INTO customers (customer_id, user_id, first_name, last_name, mobile, email, id_card_type, id_number, address) VALUES (?,?,?,?,?,?,?,?,?)");
$customerInsert->bind_param("sississss", $customerID, $userID, $firstName, $lastName, $mobile, $email, $idType, $idNumber, $address);

if ($customerInsert->execute()) {
    $insertBooking = $conn->prepare("INSERT INTO booking (user_id, hotel_id, room_type, room_no, check_in_date, checkout_date, total_price, customer_id) VALUES (?,?,?,?,?,?,?,?)");
    $insertBooking->bind_param("iissssss", $userID, $hotelID, $room_Type, $room_No, $checkIN, $checkOUT, $totalAmount, $customerID);

    if ($insertBooking->execute()) {
        $status = 1;
        $success;
        if ($stmt = $conn->prepare("UPDATE rooms SET booking_status=? WHERE room_no=?")) {
            $stmt->bind_param("is", $status, $room_No);
            $success = $stmt->execute();
        } else {
            $success = false;
        }

        if ($success) {
            echo json_encode(["status" => "success","message" => "Done"]);

        }
    }


} else {
    echo json_encode(["status" => "error", "message" => $conn->error]);
}

$conn->close();
?>