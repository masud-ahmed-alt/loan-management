<?php require_once 'menu/header.php' ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Employees</h1>
</div>

<div class="row">
    <div class="container-fluid">
        <br> <br>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">All Employees</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive text-center">
                    <table class="table table-sm table-bordered" id="dataTable" width="100%" cellspacing="0" id="table">
                        <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Roll</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="tblbody">

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $.ajax({
            url: 'backend/employee_model.php',
            success: function(data, status) {
                var value = [];
                value = $.parseJSON(data);
                var sl = 0;
                for (var i = 0; i < value.length; i++) {
                    sl++
                    var tableOut =
                        `<tr>
                                    <td >${sl}</td>
                                    <td>${value[i][7]}</td>
                                    <td>${value[i][1]}</td>
                                    <td>${value[i][8]}</td>
                                    <td>${value[i][10]}</td>
                                    <td>${value[i][9]}</td>
                                    <td>${value[i][3]}</td>
                                    <td><img src="images/profile.jpg" alt="Error" style="width: 60px;"></td>
                                    <td>
                                    <div class="btn-group">
                                        <button id="" onclick="deleteEmp(${(value[i].eid)})"  class="btn btn-sm btn-danger">Delete</button>
                                    </div>
                                    </td>
                                </tr>`;
                    $("#tblbody").append(tableOut);
                }
            }
        });

    });

    function deleteEmp(id) {
        var delEmp = 'delEmp';
        $.post('backend/actions.php', {
            delEmp,
            id
        }, function(data, status) {
            alert('Deleted!');
            window.location.href='employee.php'
        })
    }


    // if (value[0].user_roll == 'master_admin')
    //     console.log('Master Admin');
    // else
    //     alert('Only Access for master admin')
</script>



<?php require_once 'menu/footer.php' ?>