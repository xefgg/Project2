<?php
    $success = array('msg'=>'ok','country'=>array());
    $con = mysqli_connect("localhost", "root", "yxl730924", "travels");
    if ($con->connect_error) {
        die("could not connect to the db:\n");
    }
    $sql = "SELECT * FROM GEOCOUNTRIES_REGIONS";
    if ($result = mysqli_query($con, $sql)) {
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($success['country'],$row['Country_RegionName']);
        }
    }
    echo json_encode($success);
