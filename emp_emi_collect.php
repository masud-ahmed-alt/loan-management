<?php require_once 'menu/header.php' ?>


<div class="container-fluid">
    <h3><span class="badge badge-success">Collection Entry</span></h3>

    <div class="container-fluid panel-body scroll"  style="overflow:auto; height: calc(100vh - 200px);">
        <div class="input-group col-5">
            <input type="search" id="accno" class="form-control form-control-sm rounded" placeholder="Search Account" value="123456" aria-label="Search" aria-describedby="search-addon" />
            <button type="button" id="btn_search" class="btn btn-sm btn-outline-primary">Search</button>
        </div>
        <hr>

        <div id="maindiv" class="container-fluid">
        </div>

    </div>
</div>


<script>
    $(document).ready(function() {

        $('#btn_search').on('click', function() {

            var accno = $('#accno').val();

            if (accno == '') {
                alert('Please enter loan account no.');
            } else {
                $.post('backend/getcustomer_model.php', {
                    accno: accno
                }, function(data, status) {
                    var values = jQuery.parseJSON(data);
                    // console.log(values);

                    var loan_id = values.loan_id;
                    var cus_id = values.cid;

                    var sch = '';
                    if (values.emi_schedule == 1)
                        sch = "Monthly";
                    else
                        sch = "Weekly";

                    var output = `<div class="row">
                <div class="col">
                    <div class="card">
                        <p class="card-header" style="height: 40px;"><b> Customer Info</b></p>
                        <div class="card-body">
                            <div class="row">
                                <p class="col-5"><b>Loan A/C No.</b></p>
                                <p>: ${values.loan_ac_no}</p>
                            </div>
                            <div class="row">
                                <p class="col-5"><b>Loan Amount</b></p>
                                <p>: Rs. ${financial(values.loan_amount)}</p>
                            </div>
                            <div class="row">
                                <p class="col-5"><b>Interest Rate</b></p>
                                <p>:${values.interest_rate}</p>
                            </div>
                            <div class="row">
                                <p class="col-5"><b>EMI Amount</b></p>
                                <p>:${financial(values.emi_amount)}</p>
                            </div>
                            <div class="row">
                                <p class="col-5"><b>EMI Scheduled</b></p>
                                <p>:${sch}</p>
                            </div>
                            <div class="row">
                                <p class="col-5"><b>EMI Left</b></p>
                                <p>:${values.no_emi_left}</p>
                            </div>
                            <div class="row">
                                <p class="col-5"><b>Customer Name</b></p>
                                <p>:${values.cname}</p>
                            </div>
                            <div class="row">
                                <p class="col-5"><b>Address</b></p>
                                <p>:${values.adds}</p>
                            </div>
                            <div class="row">
                                <p class="col-5"><b>Phone</b></p>
                                <p>:${values.phone}</p>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <p class="card-header" style="height: 40px;"><b> Collect EMI</b></p>
                        <div class="card-body">
                            <input type="hidden" id="loan_id">
                            <div class="row">
                                <p class="col-3"><b>EMI amount</b></p>
                                <input class="form-control form-control-sm col-4" id="emiamount" type="text" value="${ (values.emi_amount)}" disabled>
                            </div>
                            <div class="row" class="">
                                <p class="col-3"><b>Select Fine</b></p>
                                <select class="form-control form-control-sm col-4" id="finepercent">
                                <option value="" >Select Fine </option>    
                                <option value="0" >0 % - Default Fine</option>    
                                </select>
                                
                            </div>
                            <div class="row">
                                <p class="col-3"><b>Fine Amount</b></p>
                                <input class="form-control form-control-sm col-4" id="fineamt" type="text" disabled>
                            </div>
                            <div class="row">
                                <p class="col-3"><b>Total Amount</b></p>
                                <input class="form-control form-control-sm col-4" id="totalamt" type="text" disabled>
                            </div>

                            <button type="button" id="btncollect" class="btn btn-success btn-sm btn-block col-7 btn-center">Collect EMI</button>
                        </div>
                    </div>
                    <hr>
                    <div class="col">
                        <div class="card">
                            <p class="card-header" style="height: 40px;"><b>Recent Transactions</b></p>
                            <div class="card-body">
                                <table class="table table-sm text-center">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">Date</th>
                                            <th scope="col">Emi Amount</th>
                                            <th scope="col">Fine Amount</th>
                                            <th scope="col">Total Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tabledata">
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>`;

                    if (values == false) {
                        $('#maindiv').html('<h1 class="text-danger text-center">No Result Found!</h1>');
                    } else {
                        $('#maindiv').html(output);

                        // get fine details 
                        var fine = 'fine';
                        $.post('backend/getfinemaster_model.php', {
                            fine: fine
                        }, function(data, status) {
                            var obj = $.parseJSON(data);
                            
                            for (var i = 0; i < obj.length; i++) {
                                var fineOut = `<option value="${obj[i].fine_percent}">${obj[i].fine_percent+" % - " +obj[i].fine_name}</option>`
                                $('#finepercent').append(fineOut);
                            }
                        });

                        // get transaction history code start
                        $.post('backend/transaction_model.php', {
                            loan_id
                        }, function(data, status) {
                            var trans = jQuery.parseJSON(data);
                            for (var i = 0; i < 3; i++) {
                                var date = new Date(trans[i].collection_date);
                                var d = ((date.getMonth() > 8) ? (date.getMonth() + 1) : ('0' + (date.getMonth() + 1))) +
                                    '/' + ((date.getDate() > 9) ? date.getDate() : ('0' + date.getDate())) + '/' + date.getFullYear();

                                var tableOut = `<tr>
                                                    <th scope="row">${d}</th>
                                                    <td>${"₹"+financial(trans[i].emi_amount)}</td>
                                                    <td>${"₹"+financial(trans[i].fine_amount)}</td>
                                                    <td>${"₹"+financial(trans[i].total_amount)}</td>
                                            </tr>`;

                                $('#tabledata').append(tableOut);
                            }
                        });
                        // get transaction history code end

                        $('#finepercent').on('input', function() {
                            var emiamt = $('#emiamount').val();
                            var fine = $('#finepercent').val();
                            var fineamt = emiamt * parseFloat(fine / 100);
                            var totalamt = parseFloat(emiamt) + parseFloat(fineamt) + parseFloat(0.01);
                            $('#fineamt').val(financial(fineamt));
                            $('#totalamt').val(financial(totalamt));
                        });

                        $('#btncollect').click(function() {
                            var emiamt = $('#emiamount').val();
                            var fine = $('#finepercent').val();
                            var fineamt = $('#fineamt').val();
                            var tamt = $('#totalamt').val();

                            if (fine == '')
                                alert('Please Select Fine Percent!')
                            else {
                                // console.log(emiamt,fine,fineamt,tamt);

                                $.post('backend/collection_entry_model.php', {
                                    accno,
                                    loan_id,
                                    emiamt,
                                    fineamt,
                                    tamt,
                                    cus_id
                                }, function(data, status) {
                                    console.log(data);
                                    alert(data);
                                    window.location.href = 'emp_emi_collect.php';
                                });
                            }
                        });

                    }
                });
            }
        });

        function financial(x) {
            return Number.parseFloat(x).toFixed(2);
        }
    });
</script>


<?php require_once 'menu/footer.php' ?>