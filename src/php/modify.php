<?php
    $id = $_POST['id'];
    $success = array('msg'=>'ok','src'=>'','title'=>'','description'=>'','content'=>'','country'=>'','city'=>'');
    $con = mysqli_connect("localhost", "root", "yxl730924", "travels");
    if ($con->connect_error) {
        die("could not connect to the db:\n");
    }
    mysqli_query($con, 'set names utf8');
    mysqli_query($con, 'set character_set_client=utf8');
    mysqli_query($con, 'set character_set_results=utf8');
    $sql = "SELECT * FROM travelimage WHERE ImageID ='$id'";
    $sql3 = "SELECT * FROM GEOCOUNTRIES_REGIONS WHERE ISO = (SELECT COUNTRY_REGIONCODEISO FROM travelimage WHERE ImageID = '$id')";
    $sql4 = "SELECT * FROM GEOCITIES WHERE GEONAMEID = (SELECT CITYCODE FROM travelimage WHERE ImageID = '$id')";
    if ($result = mysqli_query($con, $sql)) {
        while ($row = mysqli_fetch_assoc($result)) {
            $success['src'] = $row['PATH'];
            $success['title'] = $row['Title'];
            $success['description'] = $row['Description'];
            $success['content'] = $row['Content'];
        }
    }
    if ($result3 = mysqli_query($con, $sql3)) {
        while ($row3 = mysqli_fetch_assoc($result3)) {
            $success['country'] = $row3['Country_RegionName'];
        }
    }
    if ($result4 = mysqli_query($con, $sql4)) {
        while ($row4 = mysqli_fetch_assoc($result4)) {
            $success['city'] = $row4['AsciiName'];
        }
    }
    echo json_encode($success);