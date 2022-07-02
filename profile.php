<?php require_once 'menu/header.php' ?>



<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">

                <img id="image" class="rounded-circle mt-5" width="150px" src="img/undraw_profile.svg"><br>
                
                <span id="txtroll" class="font-weight-bold">Roll: </span>
                <span id="txtname" class="text-black-50"></span>
                <span id="txtphone" class="text-black-50"></span>
                <span id="txtemail" class="text-black-50"></span>
                <span id="txtadds" class="text-black-50"></span>
                <span> </span>
            </div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>

                <div class="row mt-3">
                    <div class="col-md-12">
                        <label class="labels">Name</label>
                        <input type="text" id="name" class="form-control" value="">
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Phone</label>
                        <input type="number" id="phone" class="form-control" value="">
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Email</label>
                        <input type="email" id="email" class="form-control" value="">
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Address</label>
                        <input type="text" id="adds" class="form-control" value="">
                    </div>
                </div>

                <div class="mt-5 text-center">
                    <button class="btn btn-primary profile-button" type="button">Save Profile</button>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Change Password</h4>
                </div>
                <br>
                <div class="col-md-12">
                    <label class="labels">Current Password</label>
                    <input type="password" class="form-control" placeholder="Current Password" value="">
                </div>
                <br>
                <div class="col-md-12">
                    <label class="labels">New password</label>
                    <input type="password" class="form-control" placeholder="New Password" value="">
                </div>

                <div class="mt-5 text-center">
                    <button class="btn btn-primary profile-button" type="button">Change Password</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $.ajax({
            url: "backend/profile_model.php",
            type: 'GET',
            success: function(res) {
                // console.log(res);
                var data = $.parseJSON(res)
                // console.log(data);
                $('#txtroll').append(data.user_roll)
                $('#txtname').append(data.name)
                $('#txtphone').append(data.phone)
                $('#txtemail').append(data.email)
                $('#txtadds').append(data.adds)
                $('#name').val(data.name)
                $('#phone').val(data.phone)
                $('#email').val(data.email)
                $('#adds').val(data.adds)
            }
        });
    })
</script>

<?php require_once 'menu/footer.php' ?>