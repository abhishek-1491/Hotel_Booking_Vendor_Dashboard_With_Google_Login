<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST['password'];
    $cnfpassword = $_POST['cnfpassword'];


    if ($password == $cnfpassword) {
        $name = $_POST['name'];
        $google_id = $_POST['gID'];
        $role = $_POST['role'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $sql = "UPDATE users SET name = ?, password = ?, role = ? WHERE google_id = ?";

        // Prepare statement
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $name, $password, $role, $google_id);


        // Execute query
        if ($stmt->execute()) {

            switch ($role) {
                case 'user':
                    header('location:user/user_dashboard.php');

                    break;
                case 'vendor':
                    header('location:vendor/vendor_dashboard.html');

                    break;

                default:
                    header('location:index.html');
                    break;
            }


        } else {
            echo "Error updating user: " . $stmt->error;
        }

        // Close connection
        $stmt->close();
        $conn->close();
    } else {
        echo "Failed";
    }
}
?>