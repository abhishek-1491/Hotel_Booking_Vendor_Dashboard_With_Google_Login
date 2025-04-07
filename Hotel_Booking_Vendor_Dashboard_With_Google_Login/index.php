<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Booking</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        body {
            margin: 0;
            background: url(images/back.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            /* color: aliceblue; */
            font-family: "Poppins", sans-serif;

        }

        .container {
            display: grid;
            grid-template-columns: 40% 60%;
            /* grid-gap: 10px; */
        }

        .container .inside {
            height: 100vh;
            /* background-color: red; */
            position: relative;
        }

        .container .content {
            width: 60%;
            color: white;
            border-radius: 15px;
            padding: 50px;
            font-size: large;
            background-color: rgba(113, 102, 102,0.6);
            margin-top: 20%;
        }

        .container .inside .booking-form {
            width: 400px;
            /* border: 1px solid; */
            border-radius: 15px;
            position: absolute;
            padding: 20px;
            padding-bottom: 40px;
            top: 20%;
            left: 10%;
            background-color: #EAEAEA;
            color: black;
            
        }
        .container .inside .booking-form h1{
            margin-top: 10px;
            text-align: center;
        }
        .container .inside .booking-form .form-group{
            width: 100%;
            /* background-color: red; */
            margin: 10px 0px;
            padding: 10px 0px;
        }
        .container .inside .booking-form .form-group input{
            width: 100%;
            height: 30px;
            margin-top: 10px;
        }
        .container .inside .booking-form .form-group input[id="checkin"]{
            width: 40%;
        }

        .container .inside .booking-form .form-group input[id="checkout"]{
            width: 40%;
            margin-left: 30px;
        }
        .container .inside .booking-form .form-group input[id="noofRooms"]{
            width: 35%;
        }
        .container .inside .booking-form .form-group input[id="noofAdults"]{
            width: 22%;
            margin-left: 35px;
        }
        .container .inside .booking-form .form-group input[id="noofChilds"]{
            width: 22%;
            margin-left: 10px;
        }
        .adult{
            margin-left: 38px;
        }
        .childs{
            margin-left: 55px;
        }
        .checkout{
            margin-left: 75px;
        }
        .container .inside .booking-form .form-group button{
            width: 200px;
            padding: 10px 30px;
            border: none;
            background-color: blue;
            color: white;
            font-size: large;
            transition: 0.2s ease-in-out;

        }
        .container .inside .booking-form .form-group button:hover{
            cursor: pointer;
            scale: 1.1;
            background-color: orange;
            transition: 0.2s ease-in-out;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php 
        include 'booking-form.php';
        ?>
        <div class="inside">
            <div class="content">
                <h1>MAKE <span style="color: red;">YOUR</span> <br> RESERVATION</h1>
                <p>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Doloribus alias in iusto ullam maiores
                    dolorem
                    porro animi, suscipit quaerat exercitationem quisquam ab ut sequi repudiandae quod itaque accusamus
                    aperiam eos recusandae illum tenetur! Magni cum error exercitationem eum rem explicabo.
                </p>
            </div>
        </div>
    </div>
</body>

</html>