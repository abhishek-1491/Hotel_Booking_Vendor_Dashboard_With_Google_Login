<?php
session_start();
include "../db.php";


if (!isset($_SESSION['vendor'])) {
    header("Location: ../login.html");
    exit();
}
$vendor = $_SESSION['vendor'];
$v_id = $vendor["id"];
$hotelALL = $conn->query("SELECT * FROM hotels WHERE vendor_id = '$v_id'")->fetch_all(MYSQLI_ASSOC);
$hotel = $hotelALL[0];
$hotel_ID = $hotel["hotel_id"];

// print_r($hotel);

// echo $hotel["hotel_id"];
// $roomTypes = [];
// $roomTypeSQL = "SELECT * FROM room_type";
// $roomTypeResult = $conn->query($roomTypeSQL);
// if ($roomTypeResult->num_rows > 0) {
//     while ($room = $roomTypeResult->fetch_assoc()) {
//         $roomTypes[] = $room;
//     }
// }

$roomTypes = $conn->query("SELECT * FROM room_type")->fetch_all(MYSQLI_ASSOC);
$idCardTypes = $conn->query("SELECT * FROM id_card_type")->fetch_all(MYSQLI_ASSOC);

$allRooms = [];

$allroomsSQL = "SELECT * FROM rooms WHERE hotel_id = '$hotel_ID'";
$allroomResult = $conn->query($allroomsSQL);
if ($allroomResult->num_rows > 0) {
    while ($room = $allroomResult->fetch_assoc()) {
        $allRooms[] = $room;
        
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendor Panel</title>
    <script src="https://kit.fontawesome.com/35821647e0.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="static/vendor-style.css">
</head>
<style>
    .message-box {
    display: none;
    background-color: green;
    color: white;
    padding: 15px;
    border-radius: 5px;
    position: fixed;
    top: 60px;
    right: 20px;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    animation: fadeInOut 3s ease-in-out;
}
@keyframes fadeInOut {
    0% { opacity: 0; transform: translateY(-10px); }
    20% { opacity: 1; transform: translateY(0); }
    80% { opacity: 1; transform: translateY(0); }
    100% { opacity: 0; transform: translateY(-10px); }
}
</style>

<body>
    <nav>
        <div class="logo">
            <h1>
                <?php echo $hotel['hotel_name'] ?>
            </h1>
        </div>
        <div class="logout-btn">

            <button><a href="../logout.php">Logout</a></button>
        </div>
    </nav>

    
    <!-- Admin Sidebar -->

    <section class="sidebar">
        <div class="profile">
            <img src="../images/admin.png" alt="">
            <h2>
                <?php echo $vendor['name'] ?>
            </h2>
        </div>
        <div class="sidebar-container">
            <div class="menu-item active tablink" onclick="showContainer('dashboard')">Dashboard</div>
            <div class="menu-item tablink" onclick="showContainer('reservation')">Reservations</div>

            <div class="menu-item tablink" onclick="showContainer('manageRoom')">Manage Rooms</div>

            <div class="menu-item tablink">Staff Section</div>

            <div class="menu-item tablink">Manage Complaints</div>
            <div class="menu-item tablink">Statistics</div>


        </div>
    </section>


    <!-- Main Container -->

    <section class="main-container">


        <!-- dashboard container -->
        <div class="dashboard-container tabcontent" id="dashboard">
            <h1>Vendor Dashboard</h1>
            <!-- <?php
                print_r($idCardTypes);
            ?>  -->
            
            <div class="sub-container">
                <div>Total Rooms</div>
                <div>Reservations</div>
                <div>Staff</div>
                <div>Complaints</div>
                <div>Booked Rooms</div>
                <div>Available Rooms</div>
                <div>Checked In</div>
                <div>Total Earnings</div>
                <div>Pending Payments</div>

            </div>
        </div>


        <!-- Reservation Section -->

        <div class="reservation-container hidden tabcontent" id="reservation">
            <!-- <?php print_r($roomTypes) ?> -->
            <div class="room-information">

                <h1>Room Information</h1>
                <div class="group-container">
                    <div class="group">
                        <label for="">Room Type</label><br>
                        <select name="room_type" onchange="filterRooms()" id="filterRoom">
                            <option value="">-- Select Room Type --</option>
                            <?php
                                foreach ($roomTypes as $key => $value) {
                                    ?>
                                    <option value="<?php echo $value["room_type_id"] ?>"><?php echo $value["room_type"] ?></option>
                                    <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="group">
                        <label for="">Room No</label><br>
                        <select name="room_type" id="r_room_no" onchange="runningPrice()">
                            <option value="">-- Select Room No --</option>
                            
                        </select>
                    </div>
                    <div class="group">
                        <label for="">Check In Date</label><br>
                        <input type="date" name="" id="checkin" min="" style="font-size: large;">
                    </div>
                    <div class="group">
                        <label for="">Check Out Date</label><br>
                        <input type="date" name="" id="checkout" min="" style="font-size: large;" onchange="totalPrice()">
                    </div>
                </div>
                <div class="total">
                    <h2>Total Days : <span id="days">0</span> Days</h2>
                    <h2>Price : <span id="price">0</span>/-</h2>
                    <h2>Total Amount : <span id="totalPrice">0</span>/-</h2>
                </div>
            </div>
            <div class="customer-information">
                <h1>Customer Information</h1>
                <div class="group-container">
                    <div class="group">
                        <label for="">First Name</label><br>
                        <input type="text" name="fname" placeholder="Enter First Name" id="r_fname">
                    </div>
                    <div class="group">
                        <label for="">Last Name</label><br>
                        <input type="text" name="lname" placeholder="Enter Last Name" id="r_lname">
                    </div>
                    <div class="group">
                        <label for="">Mobile No</label><br>
                        <input type="number" name="mobile" placeholder="Enter Mobile No" id="r_mobile">
                    </div>
                    <div class="group">
                        <label for="">Email</label><br>
                        <input type="email" name="email" placeholder="Enter Email" id="r_email">
                    </div>
                    <div class="group">
                        <label for="">ID Card Type</label><br>
                        <select name="idcard_type" id="r_id_card_type">
                            <option value="">-- Select ID Card Type --</option>
                            <?php 
                                foreach ($idCardTypes as $key => $value) {
                                    ?>
                                        <option value="<?php echo $value["id_card_type"] ?>"><?php echo $value["id_card_type"] ?></option>
                                    <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="group">
                        <label for="">Selected ID Card Number</label><br>
                        <input type="text" name="idcard_no" placeholder="Enter ID Card Number" id="r_id_number">
                    </div>
                    <div class="group">
                        <label for="">Residential Address</label><br>
                        <input type="text" name="r_address" placeholder="Enter Residensial Address" id="r_address">
                    </div>
                </div>
                <button onclick="bookRoom('<?php echo $hotel_ID ?>','<?php echo $v_id ?>')">Book Now</button>
            </div>
        </div>


        <!-- Manage Rooms Section -->

        <div class="manage-rooms-container hidden tabcontent" id="manageRoom">
            <div class="subNav">
                <h1>Manage Rooms</h1>
                <button onclick="ShowAddRoomForm()">Add Room</button>
            </div>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Room No</th>
                            <th>Room Type</th>
                            <th>Booking Status</th>
                            <th>Check In</th>
                            <th>Check Out</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="table-body">
                    <?php 
                        

                        foreach ($allRooms as $key => $eachRoom) {
                            
                            ?>
                            <tr>
                                <td><?php echo $eachRoom["room_no"] ?></td>
                                <td><?php echo $eachRoom["room_type_name"] ?></td>
                                <?php $b_status = $eachRoom["booking_status"];
                                    if($b_status == 0){
                                        ?>
                                            <td><button style="background-color:blue">Book Now</button></td>
                                        <?php
                                    }
                                    else{
                                        ?>
                                            <td><button style="background-color:red" disabled>Booked</button></td>
                                        <?php
                                    }
                                ?>
                                <td><?php echo $eachRoom["check_in_status"] ?></td>
                                <td><?php echo $eachRoom["check_out_status"] ?></td>
                                <td><button>Delete</button></td>
                            </tr>
                            <?php
                        }

                    ?>
                    </tbody>

                </table>
            </div>
            <div class="pagination">
                <button onclick="prevPage()">Previous</button>
                <button onclick="nextPage()">Next</button>
            </div>
            <div class="addRoom" id="addRoom">
                <h1>Add Room</h1>
                <label for="">Select Room Type</label>
                <select name="room_type_id" id="room_type">
                    <option>-- Select Room Type --</option>

                    <?php

                    for ($i = 0; $i < count($roomTypes); $i++) {
                        ?>
                        <option value="<?php echo $roomTypes[$i]['room_type_id'] ?>">
                            <?php echo $roomTypes[$i]['room_type'] ?>
                        </option>
                        <?php
                    }

                    ?>
                </select>

                <label for="">Room No</label>
                <?php $hid = $hotel["hotel_id"] ?>
                <input type="text" placeholder="Enter Room Number" name="room_no" id="room_no">
                <button onclick="addRoom('<?php echo $hid ?>'">Add Room</button>
                <button onclick="closeAddRoomForm()">Cancel</button>
            </div>
        </div>



    </section>

    <div id="successMessage" class="message-box">Record Inserted Successfully!</div>

</body>
<script>
    function runningPrice(){
        // let price = document.getElementById("r_room_no").value;
        let roomname =document.getElementById("filterRoom").value;
        // console.log(roomname);
        var roomprices = <?php echo json_encode($roomTypes) ?>;
        var price;
        // console.log(roomprices);

        roomprices.forEach(element => {
            if(element["room_type_id"] == roomname){
                price = element["price"];
            }
        });




        document.getElementById("price").innerText = price;
        document.getElementById("totalPrice").innerText = "0";
        document.getElementById("days").innerText = "0";
        
        let checkin = this.value;
    let checkoutInput = document.getElementById("checkout");

    // Reset checkout date when check-in date changes
    checkoutInput.value = "";
    checkoutInput.setAttribute("min", checkin); // Update checkout min date

    }

    function totalPrice(){
        let price = document.getElementById("price").innerText;
        let checkIN =document.getElementById("checkin").value;
        let checkOUT =document.getElementById("checkout").value;
        let days =document.getElementById("days");
        let total =document.getElementById("totalPrice");

        let checkinDate = new Date(checkIN);
        let checkoutDate = new Date(checkOUT);

        // Calculate difference in milliseconds and convert to days
        let timeDifference = checkoutDate - checkinDate;
        let totalDays = timeDifference / (1000 * 60 * 60 * 24);

        let totalP = price*totalDays;

        days.innerText =totalDays;
        total.innerText=totalP;


        // console.log(totalDays);
        // console.log("price = "+price+"Check In = "+checkIN+"check Out = "+checkOUT);
    }
    // Get today's date in YYYY-MM-DD format
    let today = new Date().toISOString().split("T")[0];

    // Set min attribute dynamically
    let checkinInput = document.getElementById("checkin");
    let checkoutInput = document.getElementById("checkout");

    checkinInput.setAttribute("min", today);
    checkoutInput.setAttribute("min", today);

    // Automatically update checkout min date based on checkin selection
    checkinInput.addEventListener("change", function () {
        checkoutInput.setAttribute("min", this.value);
    });


    function filterRooms() {
        var rooms = <?php echo json_encode($allRooms) ?>;
        var roomprices = <?php echo json_encode($roomTypes) ?>;
        let roomname =document.getElementById("filterRoom").value;
        var container = document.getElementById("r_room_no");
        container.innerHTML = "";
        let html = "<option>-- Select Room No --</option>";
        var room_NO = [];
        var price;
        // console.log(rooms);
        rooms.forEach(each => {
            if(each["room_type_id"] == roomname){
                room_NO.push(each["room_no"]);
            }
        });


        roomprices.forEach(element => {
            if(element["room_type_id"] == roomname){
                price = element["price"];
            }
        });
        // console.log(room_NO);
        // console.log(price);
        room_NO.forEach(element => {
            html += `
                <option value="${element}">${element}</option>
            `;
        });
        container.innerHTML =html;
    }

    function showContainer(str) {
        let tablinks = document.querySelectorAll(".tablink");
        let tabcontents = document.querySelectorAll(".tabcontent");

        for (const tab of tablinks) {
            tab.classList.remove("active");
        }
        for (const tabcontent of tabcontents) {
            tabcontent.classList.add("hidden");
        }
        event.currentTarget.classList.add("active");
        document.getElementById(str).classList.remove("hidden");
    }



    const records = [];
    // for (let index = 1; index <= 50; index++) {

    //     records.push({
    //         Room_No: index,
    //         Room_Type: "Single",
    //         Booking_Status: "Booked",
    //         Check_In: "-",
    //         Check_out: "-",
    //         Action: "<button>Delete</button>"
    //     });

    // }
    let currentPage = 1;
    const recordsPerPage = 7;

    function renderTable() {
        const tableBody = document.getElementById('table-body');
        tableBody.innerHTML = "";

        const start = (currentPage - 1) * recordsPerPage;
        const end = start + recordsPerPage;
        const paginatedRecords = records.slice(start, end);

        paginatedRecords.forEach(record => {
            const row = `<tr>
                <td>${record.Room_No}</td>    
                <td>${record.Room_Type}</td>    
                <td>${record.Booking_Status}</td>    
                <td>${record.Check_In}</td>    
                <td>${record.Check_out}</td>    
                <td>${record.Action}</td>    
            </tr>`;

            tableBody.innerHTML += row;
        });
    }

    function nextPage() {
        if (currentPage * recordsPerPage < records.length) {
            currentPage++;
            renderTable();
        }
    }
    function prevPage() {
        if (currentPage > 1) {
            currentPage--;
            renderTable();
        }
    }
    // renderTable();


    function ShowAddRoomForm() {
        let form = document.getElementById('addRoom');
        form.style.display = "block";
        form.style.animation = "fadeIn 1s ease-in-out forwards";


    }
    function closeAddRoomForm() {
        let form = document.getElementById('addRoom');
        form.style.animation = "fadeOut 1s ease-in-out forwards";
        setTimeout(() => {
            form.style.display = "none";
        }, 3000);
    }
    function addRoom(hid) {
        let roomType = document.getElementById("room_type").value;
        let roomNo = document.getElementById("room_no").value;

        document.querySelectorAll("#room_no , #room_type").forEach(element => {
            element.value = ""; // Reset value
        });
        const data = {};
        data['room_no'] = roomNo;
        data['room_type_id'] = roomType;
        data['hotel_id'] = hid;

        // console.log(hid);
        // console.log(data);

        fetch("addRoom.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(data)
        })
            .then(response => response.json())
            .then(result => {
                if (result['status'] == "success") {
                    // console.log("Successfully record inserted");

                    let allRooms = result['allRooms'];
                    // console.log(result["RoomName"]);

                    let roomRecords = document.getElementById("table-body");
                    roomRecords.innerHTML = "";
                    let html = "";

                    allRooms.forEach(each => {
                        
                        if (each["booking_status"] == 0) {
                            html = html + `
                            <tr>
                                <td>${each["room_no"]}</td>
                                <td>${each["room_type_name"]}</td>
                                <td><button style="background-color:blue">Book Now</button></td>
                                <td>${each["check_in_status"]}</td>
                                <td>${each["check_out_status"]}</td>
                                <td><button>Delete</button></td>

                            </tr>
                        `;
                        } else {
                            html = html + `
                            <tr>
                                <td>${each["room_no"]}</td>
                                <td>${each["room_type_name"]}</td>
                                <td><button style="background-color:red">Booked</button></td>
                                <td>${each["check_in_status"]}</td>
                                <td>${each["check_out_status"]}</td>
                                <td><button>Delete</button></td>

                            </tr>
                        `;
                        }
                        
                    });

                    roomRecords.innerHTML = html;
                }
                else {
                    console.log("Failed");
                }
            })
            .catch(error => console.log("Error : ", error))

        closeAddRoomForm();
    }


    function bookRoom(hotelID,userID){

        let a = document.getElementById("filterRoom").value;
        
        let allRoom = <?php echo json_encode($roomTypes) ?>;
        var roomType;
        
        allRoom.forEach(element => {
            if(element["room_type_id"] == a){
                roomType =element["room_type"];   
            }
        });      
        const data = {
            user_id:userID,
            hotel_id : hotelID,
            room_Type : roomType,
            roomNo: document.getElementById("r_room_no").value,
            checkIN: document.getElementById("checkin").value,
            checkOUT: document.getElementById("checkout").value,
            totalAmount: document.getElementById("totalPrice").innerText,
            firstName: document.getElementById("r_fname").value,
            lastName: document.getElementById("r_lname").value,
            mobile: document.getElementById("r_mobile").value,
            email: document.getElementById("r_email").value,
            idType: document.getElementById("r_id_card_type").value,
            idNumber: document.getElementById("r_id_number").value,
            address: document.getElementById("r_address").value
        };

        console.log(data);
        fetch("bookRoom.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify(data)
        })
            .then(response => response.json())
            .then(result => {
                if (result['status'] == "success") {
                    console.log("Sucess");
                    showMessage();
                    
                    // showContainer("reservation");

                    console.log(result);
                }
                else {
                    console.log("Failed");
                }
            })
            .catch(error => console.log("Error : ", error))
    }

    function showMessage() {
            const messageBox = document.getElementById('successMessage');
            messageBox.style.display = 'block';
            setTimeout(() => {
                messageBox.style.display = 'none';
            }, 3000);
    }
    
</script>

</html>