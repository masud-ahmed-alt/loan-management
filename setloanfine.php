<?php require_once 'menu/header.php' ?>


<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Fine Master</h1>
</div>

<div class="row">
    <div class="container-fluid">
        <!-- Button trigger modal -->
        <button type="button" class="btn-sm btn-secondary" data-toggle="modal" data-target="#setfinemaster">
            Set Loan Fine
        </button>
        <br> <br>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">List Of Fine Master</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive text-center">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" id="table">
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Fine Name</th>
                                <th>Fine Percentage</th>
                                <th>Description</th>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <?php
                        $sqlget = "SELECT * FROM `fine_master` WHERE `status` = 1";
                        $fine = $conn->prepare($sqlget);
                        $fine->execute();
                        if ($fine->rowCount() > 0) {
                            $sl = 1;
                            // print_r($data);
                            while ($data = $fine->fetch()) {
                        ?>
                                <tbody>
                                    <tr>
                                        <td><?= $sl++ ?></td>
                                        <td><?= $data['fine_name'] ?></td>
                                        <td><?= $data['fine_percent'] . "%" ?></td>
                                        <td><?= $data['description'] ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <input type="submit" class="btn btn-sm btn-success" name="edit_fine" value="Edit" data-toggle="modal" data-target="#editFine_<?= $data['fid'] ?>">
                                                <input type="submit" class="btn btn-sm btn-danger" name="delete_fine" value="Delete" data-toggle="modal" data-target="#deleteFine_<?= $data['fid'] ?>">
                                            </div>

                                            <!-- Modal for Delete fine master -->
                                            <div class="modal fade" id="deleteFine_<?= $data['fid'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle"><?= "Delete " . $data['fine_name'] . " ?" ?></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <input type="hidden" id="del_fid_<?= $data['fid'] ?>" value="<?= $data['fid'] ?>">
                                                            <button type="button" class="btn btn-sm btn-success" data-dismiss="modal">Cancel</button>
                                                            <!-- <input type="submit" class="btn btn-sm btn-danger" name="delete_fine" value="Delete"> -->
                                                            <button id="del_btn__<?= $data['fid'] ?>" class="btn btn-sm btn-danger">Delete</button>
                                                        </div>
                                                    </div>
                                                    <script>
                                                        // code for delete fine master 
                                                        $(document).ready(function() {
                                                            $('#del_btn__<?= $data['fid'] ?>').on('click', function() {
                                                                var fid = $('#del_fid_<?= $data['fid'] ?>').val();
                                                                var del = "del"
                                                                $.post("backend/actions.php", {
                                                                    fid: fid,
                                                                    del: del
                                                                }, function(data, status) {
                                                                    alert(data);
                                                                    window.location.href = "setloanfine.php";
                                                                });
                                                            });
                                                        });
                                                    </script>
                                                </div>
                                            </div>



                                            <!-- Modal for edit fine master -->
                                            <div class="modal fade" id="editFine_<?= $data['fid'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title badge badge-success" id="exampleModalLongTitle">Edit Fine Master</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input type="text" id="edit_fid_<?= $data['fid'] ?>" value="<?= $data['fid'] ?>">
                                                            <div class="form-group">
                                                                <input class="form-control form-control-sm" id="edit_name_<?= $data['fine_name'] ?>" type="text" value="<?= $data['fine_name'] ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <input class="form-control form-control-sm" id="edit_percent_<?= $data['fine_percent'] ?>" type="text" value="<?= $data['fine_percent'] ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <input class="form-control form-control-sm" id="edit_desc_<?= $data['description'] ?>" type="text" value="<?= $data['description'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="button" id="edit_btn__<?= $data['fid'] ?>" class="btn btn-sm btn-success">Save changes</button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <script>
                                                    $(document).ready(function() {
                                                        $('#edit_btn__<?= $data['fid'] ?>').click(function() {
                                                            var fid = $('#edit_fid_<?= $data['fid'] ?>').val()
                                                            var name = $('#edit_name_<?= $data['fine_name'] ?>').val();
                                                            var percent = $('#edit_percent_<?= $data['fine_percent'] ?>').val();
                                                            var desc = $('#edit_desc_<?= $data['description'] ?>').val();
                                                            

                                                            console.log(fid, name, percent, desc);
                                                        });
                                                    });
                                                </script>
                                            </div>

                                        </td>
                                    </tr>
                                </tbody>
                        <?php
                            }
                        } else {
                            echo "No data found";
                        }
                        ?>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>


<!-- Add Fine Master Modal -->
<div class="modal fade" id="setfinemaster" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Set Loan Fine</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <!-- Name input -->
                        <label for="">Fine Name</label>
                        <div class="form-outline">
                            <input type="text" id="fine_name" class="form-control form-control-sm" placeholder="Fine Name" />
                        </div>
                    </div>

                    <div class="col">
                        <!-- Percentage input -->
                        <label for="">Fine Percentage</label>
                        <div class="form-outline">
                            <input type="number" id="percentage" class="form-control form-control-sm" placeholder="Fine Percentage" />
                        </div>
                    </div>

                </div>

                <hr />

                <div class="row">
                    <div class="col">
                        <!-- email input -->
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Fine Description</label>
                            <textarea class="form-control" id="fine_desc" rows="3"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" id="" class="btn-sm btn-danger" data-dismiss="modal">Close</button>
                <button type="button" id="save" class="btn-sm btn-primary">Save</button>
            </div>


        </div>
    </div>
</div>

<script>
    // code for add fine master 
    $(document).ready(function() {
        $('#save').click(function() {
            var fine_name = $('#fine_name').val();
            var percentage = $('#percentage').val();
            var fine_desc = $('#fine_desc').val();


            if (fine_name == '' || percentage == '' || fine_desc == '') {
                $("#para").append("<b>All fields are compulsory!</b>");
            } else {
                $.post("backend/fine_master_model.php", {
                    fine_name,
                    percentage,
                    fine_desc
                }, function(data, status) {
                    console.log(data);
                    alert(data);
                    window.location.href = "setloanfine.php";
                    // window.location.href = "agent.php";
                })
            }
        });
    })
</script>



<?php require_once 'menu/footer.php' ?>