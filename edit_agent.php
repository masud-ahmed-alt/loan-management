<?php require_once 'menu/header.php'?>


<div class="container-fluid">
    <h3><span class="badge badge-secondary">Edit Agent</span></h3>
    <h6><span onclick="goBack()" class="badge badge-dark btn btn-dark">Go Back</span></h6>
    <div class="container panel-body scroll" style="overflow:auto; height: calc(100vh - 200px);">

        <?php
        if (isset($_POST['submit'])) {
            $aid = $_POST['aid'];

            $sqlget = "SELECT * FROM `agent` WHERE `aid`='$aid'";
            $sql = $conn->prepare($sqlget);
            $sql->execute();
            $data = $sql->fetch();
        ?>

            <div class="container">
                <div class="form-row form-group">
                    <label for="" class="">Agent Name</label>
                    <input class="form-control form-control-sm" id="name" type="text" value="<?= $data['name'] ?>">
                </div>
                <div class="form-row form-group">
                    <label for="" class="">Agent Phone</label>
                    <input class="form-control form-control-sm" id="phone" type="text" value="<?= $data['phone'] ?>">
                </div>
                <div class="form-row form-group">
                    <label for="" class="">Agent Email</label>
                    <input class="form-control form-control-sm" id="email" type="text" value="<?= $data['email'] ?>">
                </div>
                <div class="form-row form-group">
                    <label for="" class="">Agent Comission (%)</label>
                    <input class="form-control form-control-sm" id="comm" type="text" value="<?= $data['comm_per'] ?>">
                </div>
                <div class="form-row form-group">
                    <label for="" class="">Agent Address</label>
                    <input class="form-control form-control-sm" id="adds" type="text" value="<?= $data['adds'] ?>">
                </div>
                <button onclick="updateAgent(<?= $data['aid'] ?>)" class="btn btn-sm btn-block btn-success">Update</button>
                <p id="para" class="text-center text-primary"></p>
            </div>
        <?php
        }
        ?>

    </div>
</div>

<script>
    function updateAgent(aid) {
        var name = $("#name").val();
        var phone = $("#phone").val();
        var email = $("#email").val();
        var comm = $("#comm").val();
        var adds = $("#adds").val();
        var editAgent = 'editAgent';
        $.ajax({
            url: 'backend/actions.php',
            data: {
                aid,
                name,
                phone,
                email,
                comm,
                adds,
                editAgent
            },
            type: 'POST',
            success: function(data, status) {
                // window.location.href = 'edit_agent.php'
                $('#para').html('Agent Updated');
            }
        });
    }

    function goBack() {
        window.location.href = 'agent.php'
    }
</script>


<?php require_once 'menu/footer.php'?>