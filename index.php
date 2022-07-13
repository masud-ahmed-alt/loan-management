<?php require_once 'menu/header.php' ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<div class="container panel-body scroll" style="overflow:auto; height: calc(100vh - 200px);">
    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Customers</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                $sql = "SELECT * FROM `customer` WHERE `status`=1";
                                echo countData($conn, $sql)
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
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
                                Total Employees</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                $sql = "SELECT * FROM `employee` WHERE `status`=1";
                                echo countData($conn, $sql)
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-id-card fa-2x text-gray-300"></i>
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
                                Active Loan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                $sql = "SELECT * FROM `loan_ac` WHERE `activity`=1";
                                echo countData($conn, $sql)
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
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
                                Pending Loans</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                $sql = "SELECT * FROM `loan_ac` WHERE `activity`=0";
                                echo countData($conn, $sql)
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Closed Loans</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                $sql = "SELECT * FROM `loan_ac` WHERE `activity`=2";
                                echo countData($conn, $sql)
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-folder-xmark fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-danger text-uppercase mb-1">
                                Rejected Loans</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                $sql = "SELECT * FROM `loan_ac` WHERE `activity`=3";
                                echo countData($conn, $sql)
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-xmark-large fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Agents</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                $sql = "SELECT * FROM `agent` WHERE `status`=1";
                                echo countData($conn, $sql)
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-xmark-large fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <h5><span class="badge badge-success">Performace</span></h5>
    <hr>
    <!-- Content Row -->
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Amount Disburst</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                $sql = "SELECT SUM(`loan_amount`) FROM `loan_ac` WHERE `activity`=1 OR `activity`=2";
                                 echo "₹ ".number_format(allData($conn, $sql),2); 
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

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Interest Amount</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                $sql = "SELECT SUM(`interest_amount`) FROM `loan_ac` WHERE `activity`=1 OR `activity`=2";
                                echo "₹ ".number_format(allData($conn, $sql),2) 
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
                                Total EMI Pending</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                $sql = "SELECT SUM(`no_emi_left`) FROM `loan_ac` WHERE `activity`=1 OR `activity`=2";
                                echo allData($conn, $sql)
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
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
                                Total EMI Collected</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                $sql = "SELECT SUM(`no_emi`)-SUM(`no_emi_left`) FROM `loan_ac` WHERE `activity`=1 OR `activity`=2";
                                echo allData($conn, $sql)
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h5><span class="badge badge-success">Amounts</span></h5>
    <hr>
    <!-- Content Row -->
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                 Total Amount to be collect</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                $sql = "SELECT SUM(`total_amount`) FROM `loan_ac` WHERE `activity`=1 OR `activity`=2";
                                 echo "₹ ".number_format(allData($conn, $sql),2); 
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

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Fine Amount Collect</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                $sql = "SELECT SUM(`fine_amount`) FROM `collect_emi`";
                                echo "₹ ".number_format(allData($conn, $sql),2) 
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
                                Total emi Amount Collected</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                $sql = "SELECT SUM(`emi_amount`) FROM `collect_emi`";
                                echo "₹ ".number_format(allData($conn, $sql),2)
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
                                Total Amount Collected</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                               $sql = "SELECT SUM(`total_amount`) FROM `collect_emi`";
                               echo "₹ ".number_format(allData($conn, $sql),2)
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

    <hr>

</div>



<?php require_once 'menu/footer.php' ?>

<?php
function countData($con, $sql)
{
    $sql = $con->prepare($sql);
    $sql->execute();
    return $sql->rowCount();
}

function allData($con, $sql)
{
    $sql = $con->prepare($sql);
    $sql->execute();
    $amt = $sql->fetch();
    return$amt[0];
}
?>