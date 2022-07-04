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
                        <input type="hidden" id="eid" class="form-control" value="">
                        <input type="hidden" id="roll" class="form-control" value="">
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
                    <button class="btn btn-primary profile-button" id="saveprofile" type="button">Save Profile</button>
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
                    <input type="password" id="currPass" class="form-control" placeholder="Current Password" value="">
                </div>
                <br>
                <div class="col-md-12">
                    <label class="labels">New password</label>
                    <input type="password" id="newPass" class="form-control" placeholder="New Password" value="">
                </div>

                <div class="mt-5 text-center">
                    <button id="changePass" class="btn btn-primary profile-button" type="button">Change Password</button>
                </div>
                <br>

                <div class="msg"></div>

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
                $('#txtroll').html(data.user_roll)
                $('#txtname').html(data.name)
                $('#txtphone').html(data.phone)
                $('#txtemail').html(data.email)
                $('#txtadds').html(data.adds)
                $('#name').val(data.name)
                $('#phone').val(data.phone)
                $('#email').val(data.email)
                $('#adds').val(data.adds)
                $('#roll').val(data.user_roll)
                $('#eid').val(data.eid)
            }
        });

        $("#saveprofile").click(function() {

            var user = $('#roll').val()
            var ename = $('#name').val()
            var ephone = $('#phone').val()
            var eemail = $('#email').val()
            var eadds = $('#adds').val()
            var eid = $('#eid').val()
            if (user == 'master_admin') {
                alert('Master Admin Does not any changes');
            } else {
                $.ajax({
                    url: 'backend/employee_profile_update.php',
                    type: 'POST',
                    data: {
                        ename,
                        ephone,
                        eemail,
                        eadds,
                        eid
                    },
                    success: function(resp, status) {
                        alert('Profile Updated!')
                        window.location.href = 'profile.php'
                    }
                })
            }

        });

        $('#changePass').click(function() {
            var currPass = $('#currPass').val();
            //  currPass = currPass.trim()
            var newPass = $('#newPass').val();
            //  newPass = newPass.trim()

            if (currPass == '')
                $('#msg').html('<p class="text-center text-danger">Please enter current Password</p>')
            else if (newPass == '')
                $('#msg').html('<p class="text-center text-danger">Please enter New Password</p>')
            else {
                console.log(currPass, newPass)
            }



        })

    });
</script>

<?php require_once 'menu/footer.php' ?>