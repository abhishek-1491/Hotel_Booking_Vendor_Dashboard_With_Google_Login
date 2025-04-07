<?php

include '../db.php';

$jsonData = file_get_contents("php://input");

$data = json_decode($jsonData, true);

$room_no = $data["room_no"];
$room_type_id = $data["room_type_id"];
$hotel_id = $data["hotel_id"];

$getRoomTypeSQL = "SELECT room_type FROM room_type WHERE room_type_id = $room_type_id";
$getRoomName = $conn->query($getRoomTypeSQL);
$roomname = $getRoomName->fetch_assoc();
$roomTypeName = $roomname["room_type"];




$insertRoom = $conn->prepare("INSERT INTO rooms (room_no,room_type_id,room_type_name,hotel_id) VALUES (?,?,?,?)");
$insertRoom->bind_param("sssi", $room_no, $room_type_id,$roomTypeName, $hotel_id);

if ($insertRoom->execute()) {

    $allRooms = [];
    $allroomsSQL = "SELECT * FROM rooms WHERE hotel_id = $hotel_id";
    $allroomResult = $conn->query($allroomsSQL);
    if ($allroomResult->num_rows > 0) {
        while ($room = $allroomResult->fetch_assoc()) {
            $allRooms[] = $room;
        }
    }


    echo json_encode(["status" => "success", "Data Stored Successfully", "allRooms" => $allRooms , "RoomName" => $roomTypeName]);
} else {
    echo json_encode(["status" => "error", "message" => $conn->error]);
}

$conn->close();
?>