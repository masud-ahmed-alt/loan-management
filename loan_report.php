<?php require_once 'menu/header.php' ?>
<div class="container-fluid">
    <h3><span class="badge badge-success">Loan Report</span></h3>

    <div class="container-fluid panel-body scroll" style="overflow:auto; height: calc(100vh - 200px);">
        <div class="input-group col-5">
            <input type="search" id="accno" class="form-control form-control-sm rounded" placeholder="Search Account" value="" aria-label="Search" aria-describedby="search-addon" />
            <button type="button" id="btn_search" class="btn btn-sm btn-outline-primary">Search</button>
        </div>
        <hr>

        <div id="maindiv" class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <p class="card-header" style="height: 40px;"><b> Customer Info</b></p>
                        <div class="card-body">
                            <div class="row">
                                <p class="col-5"><b>Customer Name</b></p>
                                <p id="cname">:</p>
                            </div>
                            <div class="row">
                                <p class="col-5"><b>Address</b></p>
                                <p id="adds">:</p>
                            </div>
                            <div class="row">
                                <p class="col-5"><b>Phone</b></p>
                                <p id="phone">:</p>
                            </div>
                            <div class="row">
                                <p class="col-5"><b>Loan A/C No.</b></p>
                                <p id="loanacc">: </p>
                            </div>
                            <div class="row">
                                <p class="col-5"><b>Loan Amount</b></p>
                                <p id="loanamt">: </p>
                            </div>
                            <div class="row">
                                <p class="col-5"><b>Interest Rate</b></p>
                                <p id="interest_rate">:</p>
                            </div>
                            <div class="row">
                                <p class="col-5"><b>EMI Amount</b></p>
                                <p id="emiamt">:</p>
                            </div>
                            <div class="row">
                                <p class="col-5"><b>EMI Scheduled</b></p>
                                <p id="emisch">:</p>
                            </div>
                            <div class="row">
                                <p class="col-5"><b>EMI Left</b></p>
                                <p id="emileft">:</p>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <p class="card-header" style="height: 40px;"><b> Statement</b></p>
                        <div class="card-body">

                            <div class="form-row">
                                <div class="col">
                                    <label for="">Start Date</label>
                                    <input type="date" id="strtdte" class="form-control-sm form-control">
                                </div>
                                <div class="col">
                                    <label for="">End Date</label>
                                    <input type="date" id="enddate" class="form-control-sm form-control">
                                </div>
                            </div>

                            <hr>

                            <table class="table table-sm text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">Date</th>
                                        <th scope="col">Emi Amt.</th>
                                        <th scope="col">Fine Amt.</th>
                                        <th scope="col">Total Amt.</th>
                                    </tr>
                                </thead>
                                <tbody id="tablebody">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
<?php require_once 'menu/footer.php' ?>

<script>
    $(document).ready(function() {
        $('#btn_search').click(function() {
            var accno = $('#accno').val();

            $.ajax({
                url: 'backend/getcustomer_model.php',
                type: 'POST',
                data: {
                    accno
                },
                success: function(resp) {
                    var value = $.parseJSON(resp);
                    if (value == false) {
                        var noavail = `<div class="container text-center alert alert-danger" role="alert">
                                        <h4>No record found!</h4>
                                        <p>Please check loan account number!</p>
                                        </div>
`
                        $('#maindiv').html(noavail);
                    } else {
                        $('#cname').html(": " + value.cname)
                        $('#adds').html(": " + value.adds)
                        $('#phone').html(": " + value.phone)
                        $('#loanacc').html(": " + value.loan_ac_no)
                        $('#loanamt').html(": ₹" + financial(value.loan_amount))
                        $('#interest_rate').html(": " + value.interest_rate + "%")
                        $('#emiamt').html(": ₹" + financial(value.emi_amount))

                        if (value.emi_schedule == 1)
                            $('#emisch').html(": Monthly")
                        else
                            $('#emisch').html(": Weekly")
                        $('#emileft').html(": " + value.no_emi_left)
                        var loan_id = value.loan_id;
                        // console.log("Loan Acc : "+loan_id);
                        $.post('backend/transaction_model.php', {
                            loan_id
                        }, function(data) {
                            // console.log(data);
                            var d = $.parseJSON(data);
                            var tableFullOut
                            for (var i = 0; i < d.length; i++) {
                                tableFullOut +=
                                    `<tr>
                                    <th scope="row">${formateDate(d[i].collection_date)}</th>
                                    <td>${"₹ "+financial(d[i].emi_amount)}</td>
                                    <td>${"₹ "+financial(d[i].fine_amount)}</td>
                                    <td>${"₹ "+financial(d[i].total_amount)}</td> 
                                </tr>`

                                $("#tablebody").html(tableFullOut)
                            }
                        })
                        $('#enddate').on('input', function() {
                            var startdate = $('#strtdte').val()
                            var enddate = $('#enddate').val()

                            $.post('backend/search_transaction_model.php', {
                                loan_id,
                                startdate,
                                enddate
                            }, function(tran, status) {
                                var data = $.parseJSON(tran);
                                // console.log(tran);
                                var tableFullSort

                                if (data.length == 0) {
                                    var tr = `<tr>
                                               
                                            </tr>`
                                    $("#tablebody").html(tr)
                                } else {
                                    for (var i = 0; i < data.length; i++) {
                                        tableFullSort +=
                                            `<tr>
                                            <th scope="row">${formateDate(data[i].collection_date)}</th>
                                                <td>${"₹ "+financial(data[i].emi_amount)}</td>
                                                <td>${"₹ "+financial(data[i].fine_amount)}</td>
                                                <td>${"₹ "+financial(data[i].total_amount)}</td> 
                                            </tr>`
                                        $("#tablebody").html(tableFullSort)
                                    }
                                }
                            });
                        });
                    }
                }
            });


        });
    });

    function financial(x) {
        return Number.parseFloat(x).toFixed(2);
    }

    function formateDate(date) {
        newDate = new Date(date);

        var d = ((newDate.getDate() > 9) ? newDate.getDate() : ('0' + newDate.getDate())) + '/' +
            ((newDate.getMonth() > 8) ? (newDate.getMonth() + 1) : ('0' + (newDate.getMonth() + 1))) +
            '/' + newDate.getFullYear();
        return d;
    }
</script>