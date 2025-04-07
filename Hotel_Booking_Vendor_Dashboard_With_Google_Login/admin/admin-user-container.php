<!-- Add Users Container -->

<div class="add-users tabcontent hidden " id="addUser">
            <div class="form-container">
                <h1>Add User</h1>
                <form action="">
                    <div class="form-group">
                        <label for="">Enter Name</label>
                        <input type="text" name="u_name" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label for="">Enter Email</label>
                        <input type="email" name="u_email" placeholder="Enter Email">
                    </div>
                    <div class="form-group">
                        <label for="">Enter Password</label>
                        <input type="password" name="u_password" placeholder="Enter Password">
                    </div>
                    <div class="form-group">
                        <label for="">Select Role</label>
                        <select name="role" id="role" required>
                            <option>-- Select Account Type --</option>
                            <option value="user">User</option>
                            <option value="vendor">Vendor</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button>Add User</button>
                    </div>
                </form>
            </div>
            
        </div>

        <!-- Manage Users Container -->

        <div class="manage-users tabcontent hidden " id="manageUser">
            <h1>Manage Users</h1>
            <div class="manageUser-table">
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

        <!-- View Users Container -->

        <div class="view-users tabcontent hidden " id="viewUser">
            <h1>View Users</h1>
            <div class="viewUser-table">
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