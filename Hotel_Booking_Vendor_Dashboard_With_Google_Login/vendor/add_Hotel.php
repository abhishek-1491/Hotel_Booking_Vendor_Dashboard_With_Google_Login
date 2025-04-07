<?php
session_start();


if (!isset($_SESSION['vendor'])) {
    header("Location: ../login.html");
    exit();
}
$vendor = $_SESSION['vendor'];
print_r($vendor);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="static/vendor-style.css">
</head>
<body>

    <section class="addHotel">
        <h1>Add Hotel</h1>
        <form action="addHotel.php" method="POST">
            <div class="form-group">
                <label for="">Hotel Name </label>
                <input type="text" name="hotel_name">
            </div>
            <div class="form-group">
                <label for="">Hotel Email </label>
                <input type="email" name="hotel_email">
            </div>
            <div class="form-group">
                <label for="">Hotel Contact </label>
                <input type="number" name="hotel_mobile">
            </div>
            <div class="form-group">
                <label for="">Hotel Location </label>
                <input type="text" name="hotel_location">
            </div>
            <div class="form-group">
                <label for="">Hotel Description </label><br>
                <textarea name="hotel_desc" id="" cols="73" rows="5"></textarea>
            </div>
            <div class="form-group">
                <label for="">Hotel Images </label>
                <input type="file" name="hotel_images">
            </div>
            
            <input type="number" name="vendor_id" value="<?php echo $vendor['id'] ?>" hidden>
            

            <div class="form-group">
                <button>Add Hotel</button>
            </div>
        </form>
    </section>
</body>
</html>