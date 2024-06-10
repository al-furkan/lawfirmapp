 <header style="
    margin:10px;
    font-size:20px;
    padding:5px;
   
    ">Submit Data</header>
 
 <form action="./register.php" method="post" enctype="multipart/form-data">


      <div class="form second">
                <div class="details address">

                    <div class="fields">
                        <div class="input-field">
                            <label>Address Type</label>
                            <input type="text" name="address_type" placeholder="Permanent or Temporary" required>
                        </div>

                        <div class="input-field">
                            <label>Nationality</label>
                            <input type="text" name="nationality" placeholder="Enter nationality" required>
                        </div>

                        <div class="input-field">
                            <label>State</label>
                            <input type="text" name="state" placeholder="Enter your state" required>
                        </div>

                        <div class="input-field">
                            <label>District</label>
                            <input type="text" name="district" placeholder="Enter your district" required>
                        </div>

                        <div class="input-field">
                            <label>Post Number</label>
                            <input type="number" name="post_number" placeholder="Enter post number" required>
                        </div>

                        <div class="input-field">
                            <label>Ward/Village Name</label>
                            <input type="text" name="ward_village" placeholder="Enter ward/village name" required>
                        </div>
                    </div>
                </div>

                <div class="details office">
                    <span class="title">Office Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Occupation</label>
                            <select name="occupation" required>
                                <option disabled selected>Select Position in Office</option>
                                <option>Advocate</option>
                                <option>Manager</option>
                                <option>Lawyer</option>
                                <option>Marketing</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Office ID Number</label>
                            <input type="text" name="office_id" placeholder="Office ID Number" required>
                        </div>

                        <div class="input-field">
                            <label>Password</label>
                            <input type="password" name="password" placeholder="Password" required>
                        </div>

                        <div class="input-field">
                            <label>Repeat Password</label>
                            <input type="password" name="repeat_password" placeholder="Repeat Password" required>
                        </div>
                    </div>

                        
                        <button type="submit" name="btn" class="submitBtn">
                             <span class="btnText">Submit</span>
                             <i class="uil uil-navigator"></i>
                        </button>
                    </div>
                </div> 
      </div>
</form>