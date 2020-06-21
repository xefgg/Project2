<?php
    $country = $_POST['country'];
    $success = array('msg' => 'ok', 'city' => array());
    $con = mysqli_connect("localhost", "root", "yxl730924", "travels");
    if ($con->connect_error) {
        die("could not connect to the db:\n");
    }
    $sql = "SELECT * FROM GEOCITIES WHERE COUNTRY_REGIONCODEISO = (SELECT ISO FROM GEOCOUNTRIES_REGIONS WHERE COUNTRY_REGIONNAME = '$country') ORDER BY AsciiName";
    if ($result = mysqli_query($con, $sql)) {
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($success['city'], $row['AsciiName']);
        }
    }
    echo json_encode($success);