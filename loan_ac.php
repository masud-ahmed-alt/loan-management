<?php require_once 'menu/header.php' ?>

<div class="container-fluid">
    <h3><span class="badge badge-secondary">Create Loan Account</span></h3>
    <div class="container panel-body scroll" style="overflow:auto; height: calc(100vh - 200px);">

        <h6><span class="badge badge-success">Personal Details</span></h6>
        <form>
            <div class="form-row">
                <div class="col">
                    <label for="">Customer Name</label>
                    <input type="text" id="cname" class="form-control-sm form-control" placeholder="Customer Name">
                </div>
                <div class="col">
                    <label for="">Father Name</label>
                    <input type="text" id="fname" class="form-control-sm form-control" placeholder="Father Name">
                </div>
                <div class="col">
                    <label for="">Address</label>
                    <input type="text" id="adds" class="form-control-sm form-control" placeholder="Address">
                </div>
            </div>
            <hr>

            <div class="form-row">
                <div class="col">
                    <label for="">Phone No.</label>
                    <input type="Number" id="phone" class="form-control-sm form-control" placeholder="Phone No.">
                </div>
                <div class="col">
                    <label for="">PIN</label>
                    <input type="number" id="pin" class="form-control-sm form-control" placeholder="PIN">
                </div>
                <div class="col">
                    <label for="">Bank Ac No.</label>
                    <input type="text" id="bankac" class="form-control-sm form-control" placeholder="Bank Ac No.">
                </div>
            </div>
            <hr>
            <div class="form-row">
                <div class="col">
                    <label for="">IFSC Code</label>
                    <input type="text" id="ifsc" class="form-control-sm form-control" placeholder="IFSC">
                </div>

                <div class="col">
                    <label for="voterimage">Upload Voter Card</label>
                    <input type="file" id="voter" class="form-control-sm form-control-file">
                </div>

                <div class="col">
                    <label for="voterimage">Upload PAN Card</label>
                    <input type="file" id="pan" class="form-control-sm form-control-file">
                </div>

            </div>
            <hr>

            <h5><span class="badge badge-success">Loan Details</span></h5>
            <!-- <hr> -->
            <div class="form-row">
                <div class="col">
                    <label for="">Loan A/C No.</label>
                    <input type="Number" id="loanac" class="form-control-sm form-control" placeholder="Loan A/C No.">
                </div>
                <div class="col">
                    <label for="">Loan Amount</label>
                    <input type="number" id="amt" class="form-control-sm form-control" placeholder="Loan Amount">
                </div>
                <div class="col">
                    <label for="">Interest Rate (%)</label>
                    <input type="text" id="interest" class="form-control-sm form-control" placeholder="0">
                </div>
            </div>
            <hr>
            <div class="form-row">

            <div class="col">
                    <label for="">No. of Months</label>
                    <input type="text" id="month" class="form-control-sm form-control" placeholder="0">
                </div>
                <div class="col">
                    <label for="">Interest Amount</label>
                    <input type="Number" id="interestamt" class="form-control-sm form-control" placeholder="0" disabled>
                </div>
                
                
                <div class="col">
                    <label for="">Total Amount</label>
                    <input type="number" id="ttlamt" class="form-control-sm form-control" placeholder="0" disabled>
                </div>
            </div>

            <hr>
            <div class="form-row">
                <div class="col">
                    <!-- <input type="text" class="form-control-sm form-control" placeholder="EMI Scheduled"> -->
                    <label for="">EMI Schedule</label>
                    <select class="form-control form-control-sm" id="schedule">
                        <option selected value="0">Select Emi Schedule</option>
                        <option value="4">Weekly</option>
                        <option value="1">Monthly</option>
                    </select>

                </div>
                <div class="col">
                    <label for="">EMI Amount</label>
                    <input type="Number" id="emiamt" class="form-control-sm form-control" placeholder="0" disabled>
                </div>
                <div class="col">
                    <label for="">Number of EMI</label>
                    <input type="number" id="noemi" class="form-control-sm form-control" placeholder="0" disabled>
                </div>
            </div>
            <hr>
            <div class="form-row">
                <div class="col">
                    <label for="">Start Date</label>
                    <input type="date" id="strtdte" class="form-control-sm form-control">
                </div>
                <div class="col">
                    <label for="">End Date</label>
                    <input type="date" id="enddate" class="form-control-sm form-control" disabled>
                </div>
                <div class="col">
                    <label for="">Remarks</label>
                    <input type="text" id="rmrk" class="form-control-sm form-control" placeholder="Remarks">
                </div>
            </div>
            <hr>
            <button type="button" id="createac" class="btn btn-success btn-sm btn-block">Create Loan Account</button>
            <hr>
        </form>
    </div>
</div>

<script>
    $(document).ready(function() {

        $('#month').on('input', function() {
            var amount = $('#amt').val();
            var interest = $('#interest').val();
            var mn = $('#month').val();
            var year = mn/12;
            var t_intertest = (amount*interest*year)/100;
            var t_amt = parseInt(amount) + parseFloat(t_intertest);
            $('#interestamt').val(t_intertest.toFixed(2));
            $('#ttlamt').val(t_amt.toFixed(2));


            // For EMI calculation
            $('#schedule').on('change', function() {

                var schedule = $('#schedule').val();
                var mnth = $('#month').val();

                var no_emi = parseInt(mnth * schedule);
                var emiamt = parseFloat(t_amt / no_emi) + 0.1;

                $('#emiamt').val(emiamt.toFixed(2));
                $('#noemi').val(no_emi);


                // For date calculation 
                $('#strtdte').on('input', function() {

                    var strtdate = $('#strtdte').val();
                    var dt = new Date(strtdate);

                    dt.setMonth(dt.getMonth() + parseInt(mnth));

                    var date = new Date(dt);
                    var endDate = new Date(date.getTime() - (date.getTimezoneOffset() * 60000))
                        .toISOString()
                        .split("T")[0];
                    $('#enddate').val(endDate);
                });
            });
        });

        $('#createac').on('click', function() {
            console.log("Button Clicked");
            var cname = $('#cname').val();
            var fname = $('#fname').val();
            var adds = $('#adds').val();
            var phone = $('#phone').val();
            var pin = $('#pin').val();
            var bankac = $('#bankac').val();
            var ifsc = $('#ifsc').val();
            var voter = $('#voter').val();
            var pan = $('#pan').val();
            var loanac = $('#loanac').val();
            var l_amt = $('#amt').val();
            var interest = $('#interest').val();
            var i_amt = $('#interestamt').val();
            var t_amount = $('#ttlamt').val();
            var month = $('#month').val();
            var schdl = $('#schedule').val();
            var emi_amt = $('#emiamt').val();
            var no_emi = $('#noemi').val();
            var s_date = $('#strtdte').val();
            var e_date = $('#enddate').val();
            var rmrk = $('#rmrk').val();

            if (cname == '') {
                alert('Customer name required!');
            } else if (fname == '') {
                alert('Father name required!');
            } else if (adds == '') {
                alert('Address required!');
            } else if (phone == '') {
                alert('Phone Number required!');
            } else if (pin == '') {
                alert('PIN Code required!');
            } else if (bankac == '') {
                alert('Bank A/C required!');
            } else if (ifsc == '') {
                alert('IFSC required!');
            }
            // else if(voter==''){
            //     alert('Upload Voter Image');
            // }
            // else if(pan==''){
            //     alert('Upload PAN Image');
            // }
            else if (loanac == '') {
                alert('Loan A/C required!');
            } else if (l_amt == '') {
                alert('Loan Amount Required');
            } else if (interest == '') {
                alert('Interest rate required');
            } else if (month == '') {
                alert('Month required');
            } else if (schdl == 0) {
                alert('EMI schedule Required required');
            } else if (s_date == '') {
                alert('Start Date required');
            } else {
                $.post("backend/create_loan_ac_model.php", {
                        cname,
                        fname,
                        adds,
                        phone,
                        pin,
                        bankac,
                        ifsc,
                        voter,
                        pan,
                        loanac,
                        l_amt,
                        interest,
                        i_amt,
                        t_amount,
                        month,
                        schdl,
                        emi_amt,
                        no_emi,
                        s_date,
                        e_date,
                        rmrk
                    },
                    function(data, status) {
                        alert(data);
                        window.location.href='loan_ac.php'
                    });
            }
        });

    });
</script>

<?php require_once 'menu/footer.php' ?>