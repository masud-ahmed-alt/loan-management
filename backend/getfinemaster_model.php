<?php

require '../config/db.php';
require '../config/functions.php';

$sql = "SELECT * FROM `fine_master` WHERE `status` = '1'";
getSql($conn,$sql);