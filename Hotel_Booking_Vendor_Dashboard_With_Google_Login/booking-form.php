<div class="inside">
    <div class="booking-form">
        <h1>Book Your Stay</h1>
        <form id="bookingForm">
            <div class="form-group">
                <label for="checkin">Search Destination</label>
                <input type="text" id="destination" name="destination" placeholder="Enter City Name" required>
            </div>
            <div class="form-group">
                <label for="checkin">Check-in Date</label>
                <span class="checkout"><label for="checkout">Check-out Date</label></span><br>
                <input type="date" id="checkin" name="checkin" required>
                <input type="date" id="checkout" name="checkout" required>
            </div>
            <div class="form-group">
                <label for="guests">Number of Rooms</label>
                <span class="adult"><label for="guests">Adults</label></span>
                <span class="childs"><label for="guests">Childrens</label></span><br>
                <input type="number" id="noofRooms" name="noofRooms" placeholder="No of Rooms" required>
                <input type="number" id="noofAdults" name="noofAdults" placeholder="No of Adults" required>
                <input type="number" id="noofChilds" name="noofChilds" placeholder="No of Childs" required>
            </div>

            <div class="form-group">
                <button type="submit">Check Availability</button>
            </div>
        </form>
    </div>
</div>