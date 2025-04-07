<!-- Add Vendor container -->
<div class="addVendor-container tabcontent hidden " id="addVendor">
    <div class="subContainer">
        <div class="steps-nav">
            <span class="step1 backColor">1</span>
            <hr class="" id="step1">
            <span class="step2" id="span2">2</span>
            <hr id="step2">
            <span class="step3 " id="span3">3</span>
        </div>

        <div class="steps-container">

            <!-- Step 1 form (Hotel Details)-->
            <div class="form-container">
                <h1>Enter Hotel Details</h1>
                <form action="">
                    <div class="form-group">
                        <label for=""> Hotel Name</label>
                        <input type="text" name="hotel_name" placeholder="Enter Hotel Name">
                    </div>
                    <div class="form-group">
                        <label for=""> Hotel Location</label>
                        <input type="text" name="hotel_location" placeholder="Enter Hotel Location">
                    </div>
                    <div class="form-group">
                        <label for="">Total Rooms</label>
                        <input type="text" name="hotel_rooms" placeholder="Enter Total Rooms">
                    </div>
                    <div class="form-group">
                        <label for=""> Room Type</label>
                        <input type="text" name="room_type" placeholder="Enter Room Type">
                    </div>
                    <div class="form-group">
                        <label for=""> Room Price</label>
                        <input type="text" name="Room_Price" placeholder="Enter Room Price">
                    </div>
                    <div class="form-group">
                        <label for=""> Hotel Amenities</label><br>

                        <textarea name="" id="" cols="56" rows="5" name="hotel_amenities"
                            placeholder="Enter Hotel Amenities"></textarea>
                    </div>
                    <div class="form-group">
                        <button onclick="nextForm('owner','span2','step1')">Next</button>
                    </div>
                </form>
            </div>

            <!-- Step 2 form (Owner Details)-->

            <div class="form-container hidden" id="owner">
                <h1>Enter Owner Details</h1>
                <form action="">
                    <div class="form-group">
                        <label for=""> Name</label>
                        <input type="text" name="owner_name" placeholder="Enter Owner Name">
                    </div>
                    <div class="form-group">
                        <label for=""> Address</label>
                        <input type="text" name="owner_address" placeholder="Enter Owner Address">
                    </div>
                    <div class="form-group">
                        <label for=""> Contact</label>
                        <input type="number" name="owner_mobile" placeholder="Enter Owner Contact">
                    </div>
                    <div class="form-group">
                        <label for=""> Email</label>
                        <input type="email" name="owner_email" placeholder="Enter Owner Email">
                    </div>
                    <div class="form-group">
                        <label for=""> Password</label>
                        <input type="password" name="password" placeholder="Enter Password">
                    </div>
                    <div class="form-group">
                        <input type="text" name="role" value="vendor" hidden>
                    </div>

                    <div class="form-group">
                        <button onclick="nextForm('manager','span3','step2')">Next</button>
                    </div>
                </form>
            </div>


            <!-- Step 3 form (Manager Details) -->

            <div class="form-container hidden" id="manager">
                <h1>Enter Manager Details</h1>
                <form action="">
                    <div class="form-group">
                        <label for=""> Name</label>
                        <input type="text" name="manager_name" placeholder="Enter Manager Name">
                    </div>
                    <div class="form-group">
                        <label for=""> Address</label>
                        <input type="text" name="manager_address" placeholder="Enter Manager Address">
                    </div>
                    <div class="form-group">
                        <label for=""> Contact</label>
                        <input type="number" name="manager_mobile" placeholder="Enter Manager Contact">
                    </div>
                    <div class="form-group">
                        <label for=""> Email</label>
                        <input type="email" name="manager_email" placeholder="Enter Manager Email">
                    </div>
                    <div class="form-group">
                        <input type="text" name="role" value="vendor" hidden>
                    </div>

                    <div class="form-group">
                        <button>Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Manage Vendor Container -->

<div class="manage-vendor tabcontent hidden " id="manageVendor">
    <h1>Manage Vendors</h1>
    <div class="manageVendor-table">
        <table>
            <tr>
                <th>Sr. No</th>
                <th>Owner Name</th>
                <th>Hotel Name</th>
                <th>Address</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            <tr>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>4</td>
                <td>5</td>
                <td>6</td>
                <td>7</td>
            </tr>
        </table>
    </div>
</div>

<!-- View Vendor Container -->

<div class="view-vendor tabcontent hidden " id="viewVendor">
    <h1>View Vendors</h1>
    <div class="viewVendor-table">
        <table>
            <tr>
                <th>Sr. No</th>
                <th>Owner Name</th>
                <th>Hotel Name</th>
                <th>Address</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Action</th>
            </tr>

        </table>
    </div>
</div>