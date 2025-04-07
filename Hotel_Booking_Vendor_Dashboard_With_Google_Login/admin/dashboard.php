<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://kit.fontawesome.com/35821647e0.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="static/admin-style.css">
</head>

<body>

    <!-- Admin NavBar -->
    
    <?php include "../static/navbar.php" ?>

    <!-- Admin Sidebar -->

    <section class="sidebar">
        <div class="profile">
            <img src="../images/admin.png" alt="">
            <h2>Admin</h2>
        </div>
        <div class="sidebar-container">
            <div class="menu-item active tablink" onclick="toggleSubmenu('dashboard'); showContainer('dashboard');">Dashboard</div>
            <div class="menu-item" onclick="toggleSubmenu('submenu1')">Vendors</div>
            <div class="sub-menu" id="submenu1">
                <li class="tablink" onclick="showContainer('addVendor')">Add Vendor</li>
                <li class="tablink" onclick="showContainer('manageVendor')">Manage Vendor</li>
                <li class="tablink" onclick="showContainer('viewVendor')">View Vendors</li>
            </div>
            <div class="menu-item" onclick="toggleSubmenu('submenu2')">Users</div>
            <div class="sub-menu" id="submenu2">
                <li class="tablink" onclick="showContainer('addUser')">Add User</li>
                <li class="tablink" onclick="showContainer('manageUser')">Manage User</li>
                <li class="tablink"  onclick="showContainer('viewUser')">View Users</li>
            </div>
            <div class="menu-item" >Bookings</div>
            <div class="menu-item" onclick="toggleSubmenu('submenu3')">Financials</div>
            <div class="sub-menu" id="submenu3">
                <li class="tablink">Dispute</li>
                <li class="tablink">Refunds</li>

            </div>
        </div>
    </section>



    <!-- main container -->

    <section class="main-container">


        <!-- dashboard container -->
        <div class="dashboard-container tabcontent" id="dashboard">
            <h1>Admin Dashboard</h1>
            <div class="sub-container">
                <div>Booking</div>
                <div>Earning</div>
                <div>Hotels</div>
                <div>Users</div>
                
            </div>
        </div>


        <!-- Vendor Container -->

        <?php include "admin-vendor-container.php"; ?>

        <!-- User Container -->

        <?php include "admin-user-container.php"; ?>

    </section>

</body>
<script>
    function toggleSubmenu(id) {
        // console.log(id);
        if (id == "dashboard") {
            document.querySelectorAll('.sub-menu').forEach(sub => sub.style.display = 'none');
        }
        else {
            const submenu = document.getElementById(id);
            const isVisible = submenu.style.display === 'block';
            document.querySelectorAll('.sub-menu').forEach(sub => sub.style.display = 'none');
            submenu.style.display = isVisible ? 'none' : 'block';
        }

        document.querySelectorAll('.menu-item').forEach(sub => sub.classList.remove("active"));
        event.currentTarget.classList.add("active");
    }

    function nextForm(str, str2,str3) {
        event.preventDefault();
        let forms = document.querySelectorAll(".form-container");
        // console.log(forms);

        for (const each of forms) {
            each.classList.add("hidden");
        }
        document.getElementById(str).classList.remove("hidden");

        let a = document.getElementById(str2);
        a.style.backgroundColor = "rgb(153, 153, 228)";
        a.style.color = "white";
        a.style.boxShadow = "0 0 5px rgb(206, 182, 182)";

        document.getElementById(str3).style.color="rgb(153, 153, 228)";
    }

    function showContainer(str){
        // console.log(str);
        let tablinks = document.querySelectorAll(".tablink");
        let tabcontents = document.querySelectorAll(".tabcontent");
        console.log(tablinks);

        for (const tab of tablinks) {
            tab.classList.remove("active");
        }
        for (const tabcontent of tabcontents) {
            tabcontent.classList.add("hidden");
        }
        document.getElementById(str).classList.remove("hidden");
        event.currentTarget.classList.add("active");
    }
</script>

</html>