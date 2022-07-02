<?php require_once 'menu/header.php' ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Agent</h1>
</div>

<div class="row">
    <div class="container-fluid">
        <!-- Button trigger modal -->
        <button type="button" class="btn-sm btn-secondary" data-toggle="modal" data-target="#exampleModalCenter">
            Add Agent
        </button>
        <br> <br>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">List Of Agents</h6>
            </div>
            <div class="card-body">


                <div class="table-responsive text-center">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" id="table">
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Commission</th>
                                <th>Address</th>
                                <th>Voter Id</th>
                                <th>Pan Card</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <?php
                        $sqlget = "SELECT * FROM `agent` WHERE `status` = 1";
                        $agent = $conn->prepare($sqlget);
                        $agent->execute();
                        if ($agent->rowCount() > 0) {

                            // print_r($data);
                            while ($data = $agent->fetch()) {
                        ?>
                                <tbody>
                                    <tr>
                                        <td><?= $data['aid'] ?></td>
                                        <td><?= $data['name'] ?></td>
                                        <td><?= $data['phone'] ?></td>
                                        <td><?= $data['email'] ?></td>
                                        <td><?= $data['comm_per']."%" ?></td>
                                        <td><?= $data['adds'] ?></td>
                                        <td><?= $data['voter_id'] ?></td>
                                        <td><?= $data['pan_card'] ?></td>
                                        <td><?php
                                            if ($data['is_active'] == 1) {
                                                echo "";
                                                echo "<span id='active' class='badge badge-success'>Active</span>";
                                            } else {
                                                echo "<span id='inactive' class='badge badge-danger'>Inactive</span>";
                                            }
                                            ?></td>
                                        <td><?= $data['pan_card'] ?></td>
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


<!-- Add Agent Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Agent</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <!-- Name input -->
                        <div class="form-outline">
                            <input type="text" id="name" class="form-control form-control-sm" placeholder="Name" />
                        </div>
                    </div>
                    <div class="col">
                        <!-- phone input -->
                        <div class="form-outline">
                            <input type="number" id="phone" class="form-control form-control-sm" placeholder="Phone" />
                        </div>
                    </div>
                </div>

                <hr />

                <div class="row">
                    <div class="col">
                        <!-- email input -->
                        <div class="form-outline">
                            <input type="text" id="email" class="form-control form-control-sm" placeholder="Email" />

                        </div>
                    </div>
                    <div class="col">
                        <!-- Commission input -->

                        <select class="form-control form-control-sm" id="commission">
                            <option value="0">Select Commission</option>
                            <option value="3">3%</option>
                            <option value="5">5%</option>
                            <option value="7">7%</option>
                        </select>

                    </div>
                    <div class="col">
                        <!-- adds input -->
                        <div class="form-outline">
                            <input type="email" id="adds" class=" form-control form-control-sm" placeholder="Address" />
                        </div>
                    </div>
                </div>
                <hr />

                <div class="row">
                    <div class="col">
                        <!-- pan input -->
                        <div class="form-outline">
                            <input type="text" id="pancard" class="form-control form-control-sm" placeholder="Pan Card No" />
                        </div>
                    </div>
                    <div class="col">
                        <!-- voter input -->
                        <div class="form-outline">
                            <input type="text" id="voter" class="form-control form-control-sm" placeholder="Voter Card No" />
                        </div>
                    </div>

                    <div class="col">
                        <!-- password input -->
                        <div class="form-outline">
                            <input type="text" id="password" class="form-control form-control-sm" placeholder="Password" />
                        </div>
                    </div>

                </div>

                <div class="conatiner-fluid">
                    <p class="text-danger text-center" id="para"></p>
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
    $(document).ready(function() {
        $('#save').click(function() {
            console.log("Ok");

            var name = $('#name').val();
            var phone = $('#phone').val();
            var email = $('#email').val();
            var commission = $('#commission').val();
            var adds = $('#adds').val();
            var pancard = $('#pancard').val();
            var voter = $('#voter').val();
            var password = $('#password').val();

            if (name == '' || phone == '' || email == '' || commission == 0 || adds == '' || pancard == '' || voter == '') {
                $("#para").append("<b>All fields are compulsory!</b>");
            } else {
                $.post("backend/agent_model.php", {
                    name: name,
                    phone: phone,
                    email: email,
                    commission: commission,
                    adds: adds,
                    pancard: pancard,
                    voter: voter,
                    password: password
                }, function(data, status) {
                    console.log(data);
                    $("#para").append(data);
                    // window.location.href = "agent.php";
                })
            }
        })
    })
</script>


<?php require_once 'menu/footer.php' ?>