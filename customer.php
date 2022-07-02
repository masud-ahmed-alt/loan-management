<?php require_once 'menu/header.php' ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Accounts</h1>
</div>

<div class="row">
    <div class="container-fluid">
        <br> <br>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">All Accounts</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive text-center">
                    <table class="table table-sm table-bordered" id="dataTable" width="100%" cellspacing="0" id="table">
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Loan A/C NO</th>
                                <th>Loan Amount</th>
                                <th>Interest Rate (%)</th>
                                <th>EMI Amount</th>
                                <th>Scheduled</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <?php
                        $sqlget = "SELECT * FROM `customer` as cus INNER JOIN `loan_ac` as loan ON loan.`customer_id`=cus.`cid`  WHERE cus.status=1";
                        $cus = $conn->prepare($sqlget);
                        $cus->execute();
                        if ($cus->rowCount() > 0) {
                            $sl = 1;

                            // print_r($data);
                            while ($data = $cus->fetch()) {
                        ?>
                                <tbody>
                                    <tr>
                                        <td><?= $sl++ ?></td>
                                        <td><?= $data['cname'] ?></td>
                                        <td><?= $data['adds'] ?></td>
                                        <td><?= $data['loan_ac_no'] ?></td>
                                        <td><?= "₹" . number_format(($data['loan_amount']), 2) ?></td>
                                        <td><?= $data['interest_rate'] . "%" ?></td>
                                        <td><?= "₹" . number_format(($data['emi_amount']), 2) ?></td>

                                        <td><?php
                                            $emi = $data['emi_schedule'];
                                            if ($emi == 1)
                                                echo "Monthly";
                                            else
                                                echo "Weekly";
                                            ?>
                                        </td>
                                        <td class="btn" id="<?= "cid_" . $data['cid'] ?>" data-toggle="modal" data-target="#<?= "active_" . $data['cid'] ?>">
                                            <?php
                                            $status = $data['activity'];
                                            if ($status == 0)
                                                echo "<h6><span class='badge badge-secondary'>Pending</span></h6>";
                                            else if ($status == 1)
                                                echo "<h6><span class='badge badge-success'>Active</span></h6>";
                                            else if ($status == 2)
                                                echo "<h6><span class='badge badge-warning'>Closed</span></h6>";
                                            ?>
                                        </td>

                                        <td>
                                            <form action="view_customer.php" method="post">
                                                <input type="hidden" name="cid" value="<?= $data['cid'] ?>">
                                                <input type="submit" name="btnView" class="btn btn-sm btn-success" value="View">
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>

                                <!-- Modal -->
                                <div class="modal fade" id="<?= "active_" . $data['cid'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Active <?= " " . $data['loan_ac_no'] . "?" ?></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="" id="loan_ac_<?= $data['loan_id'] ?>" value="<?= $data['loan_ac_no'] ?>">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
                                                <button type="button" id="btn_active_<?= $data['loan_ac_no'] ?>" class="btn btn-sm btn-success">Active</button>
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        $(document).ready(function() {
                                            $('#btn_active_<?= $data['loan_ac_no'] ?>').click(function() {
                                                var loan_ac = $('#loan_ac_<?= $data['loan_id'] ?>').val();
                                                // console.log(loan_id);
                                                var active = 'active';
                                                $.post('backend/actions.php', {
                                                    loan_ac,
                                                    active: active
                                                }, function(data, status) {
                                                    // console.log(data)
                                                    window.location.href = 'customer.php';
                                                });
                                            });
                                        });
                                    </script>
                                </div>
                        <?php
                            }
                        } else {
                            echo "No data found";
                            echo "";
                        }
                        ?>

                    </table>
                </div>
            </div>

        </div>
    </div>
</div>




<?php require_once 'menu/footer.php' ?>