<?php require_once 'menu/headeragent.php' ?>
<div class="container-fluid">
    <h3>Welcome <span class="badge badge-success">
            <?php
            $au_id =  $_SESSION['user'][0][0];
            $sql = "SELECT `name` FROM `agent` WHERE `auth_id` ='$au_id' ";
            $getsql = $conn->prepare($sql);
            $getsql->execute();
            $name = $getsql->fetch();
            echo $name[0] . " !";
            ?>
        </span></h3>

    <div class="container-fluid panel-body scroll" style="overflow:auto; height: calc(100vh - 200px);">

        <hr>
        <div id="maindiv" class="container-fluid">
            <div class="row d-flex justify-content-center">
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Total EMI Collections</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?php
                                        $au_id =  $_SESSION['user'][0][0];
                                        $sql = $conn->prepare("SELECT id FROM `collect_emi` WHERE `collected_by` = '$au_id'");
                                        $sql->execute();
                                        echo $sql->rowCount() . " Nos.";
                                        ?>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa-solid fa-chart-line fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Total Collections Amount</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?php
                                        $au_id =  $_SESSION['user'][0][0];
                                        $sql = $conn->prepare(" SELECT SUM(`total_amount`) FROM `collect_emi` WHERE `collected_by` = '$au_id'");
                                        $sql->execute();
                                        $amt = $sql->fetch();
                                        echo "₹ " . $amt[0];
                                        ?>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa-solid fa-indian-rupee-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Total Commission</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?php
                                        $sqlget = "SELECT SUM(`total_amount`) as amt, comm_per FROM `collect_emi` as emi INNER JOIN `agent` as ag  WHERE emi.collected_by = ag.auth_id AND emi.collected_by='$au_id'";
                                        $sql = $conn->prepare($sqlget);
                                        $sql->execute();
                                        $data = $sql->fetch();
                                        echo "₹ " . number_format($data[0] * ($data[1] / 100), 2);
                                        ?>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa-solid fa-indian-rupee-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once 'menu/footeragent.php' ?>