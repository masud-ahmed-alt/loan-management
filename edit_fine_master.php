<?php require_once 'menu/header.php' ?>


<div class="container-fluid">
    <h3><span class="badge badge-secondary">Edit Agent</span></h3>
    <h6><span onclick="goBack()" class="badge badge-dark btn btn-dark">Go Back</span></h6>
    <div class="container panel-body scroll" style="overflow:auto; height: calc(100vh - 200px);">


        <?php
        if (isset($_POST['edit_fine'])) {
            $fid = $_POST['fid'];

            $sqlget = "SELECT * FROM `fine_master` WHERE `fid`='$fid'";
            $sql = $conn->prepare($sqlget);
            $sql->execute();
            $data = $sql->fetch();

        ?>
            <div class="container">
                <input type="hidden" id="" value="<?= $data['fid'] ?>">
                <div class="form-row form-group">
                    <label for="" class="">Fine Name</label>
                    <input class="form-control form-control-sm" id="fname" type="text" value="<?= $data['fine_name'] ?>">
                </div>
                <div class="form-row form-group">
                    <label for="" class="">Percentage (%)</label>
                    <input class="form-control form-control-sm" id="perc" type="text" value="<?= $data['fine_percent'] ?>">
                </div>
                <div class="form-row form-group">
                    <label for="" class="">Description</label>
                    <input class="form-control form-control-sm" id="desc" type="text" value="<?= $data['description'] ?>">
                </div>
                <button onclick="updateFineMaster(<?= $data['fid'] ?>)" class="btn btn-sm btn-block btn-success">Update</button>
                <p id="para" class="text-center text-primary"></p>
            </div>
        <?php
        }
        ?>

    </div>
</div>

<script>
    function updateFineMaster(fid) {
        var fname = $("#fname").val();
        var perc = $("#perc").val();
        var desc = $("#desc").val();

        var editFine = 'editFine';
        $.ajax({
            url: 'backend/actions.php',
            data: {
                fid,
                fname,
                perc,
                desc,
                editFine
            },
            type: 'POST',
            success: function(data, status) {
                $('#para').html('Fine Updated');
                console.log(data, status);
            }
        });
    }

    function goBack() {
        window.location.href = 'setloanfine.php'
    }
</script>

<?php require_once 'menu/footer.php' ?>