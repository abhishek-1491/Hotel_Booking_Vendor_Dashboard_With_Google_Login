<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.html");
    exit();
}

$user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        body {
            margin: 0;
            padding: 0;
            background: url(images/background.jpeg);
            background-repeat: no-repeat;
            background-size: cover;
            font-family: "Poppins", sans-serif;
        }

        .container {
            width: 25%;
            padding: 15px;
            /* border: 1px solid; */
            background-color: white;
            margin-top: 7%;
            margin-left: 15%;
            border-radius: 15px;
            box-shadow: 0 0 10px aqua;
        }

        .container input {
            width: 90%;
            padding: 10px;
            margin: 10px 0px;
            background-color: cyan;
            border: none;
            border-radius: 10px;
        }

        .container button {
            width: 96%;
            padding: 10px 0px;
            margin-bottom: 25px;
            background-color: blueviolet;
            color: white;
            font-size: large;
            border: none;
            transition: 0.2s ease;
            font-weight: bold;
            border-radius: 10px;
        }

        .container button:hover {
            cursor: pointer;
            transition: 0.2s ease;
            background-color: orange;
        }

        .container h2 {
            text-align: center;
            font-size: 35px;
            margin-top: 10px;
        }

        .container select {
            width: 96%;
            padding: 10px;
            margin: 10px 0px;
            background-color: cyan;
            border: none;
            border-radius: 10px;
            font-size: large;
            margin-bottom: 25px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Register</h2>
        <form action="updateUser.php" method="POST">
            <label for="">Name : </label><br>
            <input type="text" name="name" value="<?php echo ($user['name']); ?>"><br>
            <label for="">Password : </label><br>
            <input type="password" name="password" required><br>
            <label for="">Confirm Password : </label><br>
            <input type="password" name="cnfpassword" required><br>
            <label for="">Select Account Type</label><br>

            <select name="role" id="role" required>
                <option>-- Select Account Type --</option>
                <option value="user">User</option>
                <option value="vendor">Vendor</option>
            </select>

            <input type="text" name="gID" hidden value="<?php echo ($user['google_id']); ?>"><br>
            <button>Register</button>
        </form>
    </div>
</body>

</html>