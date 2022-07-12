<?php require_once 'menu/header.php' ?>
<?php
if (isset($_POST['btnView'])) {
    $id = $_POST['cid'];
    echo "<input type='hidden' id='cid' value='$id'>";
}
?>
<div class="container-fluid  panel-body scroll" style="overflow:auto; height: calc(100vh - 200px);">
    <div class="main-body">
        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                            <div class="mt-3">
                                <h4 id="cname"></h4>
                                <p id="cphone" class="text-muted font-size-sm"></p>

                                <div class="col-row">
                                    <button id="reject" class="btn btn-sm btn-danger">Reject</button>
                                    <button id="accept" class="btn btn-sm btn-primary">Accept</button>
                                    <button id="close" class="btn btn-sm btn-success">Close</button>
                                </div>
                                <hr>
                                <h5 id="para" class="text-center text-danger"></h5>
                                <hr>
                                <button class="btn btn-sm btn-outline-primary" onclick="window.location.href='customer.php'">Go Back</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-8">
                <div class="card mb-1">
                    <div class="card-body">
                        <h5><span class="badge badge-success">Personal Info</span></h5>
                        <div class="row">
                            <div class="col-3">
                                <p class="font-weight-bold">Father's Name</p>
                            </div>
                            <div class="">
                                <p id="fname" class="font-weight-normal">: </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <p class="font-weight-bold">Address</p>
                            </div>
                            <div class="">
                                <p id="adds" class="font-weight-normal">: </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <p class="font-weight-bold">PIN</p>
                            </div>
                            <div class="">
                                <p id="pin" class="font-weight-normal">: </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <p class="font-weight-bold">Bank A/C No</p>
                            </div>
                            <div class="">
                                <p id="bankac" class="font-weight-normal">: </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <p class="font-weight-bold">IFSC</p>
                            </div>
                            <div class="">
                                <p id="ifsc" class="font-weight-normal">: </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <p class="font-weight-bold">Status</p>
                            </div>
                            <div class="">
                                <h6 id="btnstatus">:</h6>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row gutters-sm">
                    <div class="col-sm-6 mb-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <h6><span class="badge badge-success">Loan Details</span></h6>
                                <div class="row">
                                    <div class="col-5">
                                        <p class="font-weight-bold">Loan A/C</p>
                                    </div>
                                    <div class="">
                                        <p id="loanac" class="font-weight-normal">:</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-5">
                                        <p class="font-weight-bold">Loan Amount</p>
                                    </div>
                                    <div class="">
                                        <p id="loanAmt" class="font-weight-normal">:</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-5">
                                        <p class="font-weight-bold">Interest Rate</p>
                                    </div>
                                    <div class="">
                                        <p id="irate" class="font-weight-normal">:</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-5">
                                        <p class="font-weight-bold">Interest Amount</p>
                                    </div>
                                    <div class="">
                                        <p id="iamt" class="font-weight-normal">:</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-5">
                                        <p class="font-weight-bold">No. of Months</p>
                                    </div>
                                    <div class="">
                                        <p id="month" class="font-weight-normal">:</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-5">
                                        <p class="font-weight-bold">No. of EMI's</p>
                                    </div>
                                    <div class="">
                                        <p id="emi" class="font-weight-normal">:</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <h6><span class="badge badge-success">EMI Details</span></h6>
                                <div class="row">
                                    <div class="col-5">
                                        <p class="font-weight-bold">Total Amount</p>
                                    </div>
                                    <div class="">
                                        <p id="tamt" class="font-weight-normal">:</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-5">
                                        <p class="font-weight-bold">EMI Amount</p>
                                    </div>
                                    <div class="">
                                        <p id="emiamt" class="font-weight-normal">:</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-5">
                                        <p class="font-weight-bold">EMI Schedule</p>
                                    </div>
                                    <div class="">
                                        <p id="emiSch" class="font-weight-normal">:</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-5">
                                        <p class="font-weight-bold">EMI Left</p>
                                    </div>
                                    <div class="">
                                        <p id="emileft" class="font-weight-normal">:</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-5">
                                        <p class="font-weight-bold">Start Date</p>
                                    </div>
                                    <div class="">
                                        <p id="startdate" class="font-weight-normal">:</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-5">
                                        <p class="font-weight-bold">End Date</p>
                                    </div>
                                    <div class="">
                                        <p id="enddate" class="font-weight-normal">:</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>



<script>
    $(document).ready(function() {
        var id = $("#cid").val();
        $.ajax({
            url: 'backend/view_customer_model.php?cid=' + id,
            type: 'POST',
            dataType: 'text',
            success: function(data, status) {
                console.log(status);
                var value = JSON.parse(data);
                $('#cname').append(value.cname);
                $('#cphone').append(value.phone);
                $('#fname').append(value.father);
                $('#adds').append(value.adds);
                $('#pin').append(value.pin);
                $('#bankac').append(value.bank_ac_no);
                $('#ifsc').append(value.ifsc);

                var act = value.activity;
                if (act == 0)
                    $('#btnstatus').html('<span class="badge badge-secondary">Pending</span>');
                else if (act == 1)
                    $('#btnstatus').html('<span class="badge badge-success">Active</span>');
                else if (act == 3)
                    $('#btnstatus').html('<span class="badge badge-danger">Rejected</span>');
                else
                    $('#btnstatus').html('<span class="badge badge-danger">Closed</span>');

                $('#loanac').html(value.loan_ac_no);
                $('#loanAmt').html("₹" + financial(value.loan_amount));
                $('#irate').html(value.interest_rate + "%");
                $('#iamt').html("₹" + financial(value.interest_amount));
                $('#month').html(value.no_of_month);
                $('#emi').html(value.no_emi);
                $('#tamt').html("₹" + financial(value.total_amount));
                $('#emiamt').html("₹" + financial(value.emi_amount));
                if (value.emi_schedule == 1)
                    $('#emiSch').html('Monthly');
                else
                    $('#emiSch').html('Weekly');
                $('#emileft').html(value.no_emi_left);
                $('#startdate').html(getDate(value.start_date));
                $('#enddate').html(getDate(value.end_date));
            }
        });

        function financial(x) {
            return Number.parseFloat(x).toFixed(2);
        }

        function getDate(dt) {
            var date = new Date(dt);
            var d = ((date.getMonth() > 8) ? (date.getMonth() + 1) : ('0' + (date.getMonth() + 1))) +
                '/' + ((date.getDate() > 9) ? date.getDate() : ('0' + date.getDate())) + '/' + date.getFullYear();
            return d;
        }

        $('#reject').click(function() {
            var id = $("#cid").val();
            $.ajax({
                url: 'backend/reject_loan_model.php',
                type: 'POST',
                data: {
                    id
                },
                success: function(data, status) {
                    $("#para").html(data)
                }
            })
        })
        $('#accept').click(function() {
            var id = $("#cid").val();

            $.ajax({
                url: 'backend/accept_loan_model.php',
                type: 'POST',
                data: {
                    id
                },
                success: function(data, status) {
                    $("#para").html(data)
                }
            })
        })
        $('#close').click(function() {
            var id = $("#cid").val();
            $.ajax({
                url: 'backend/close_loan_model.php',
                type: 'POST',
                data: {
                    id
                },
                success: function(data, status) {
                    $("#para").html(data)
                }
            })
        })
    });
</script>
<?php require_once 'menu/footer.php' ?>