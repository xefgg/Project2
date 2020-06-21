<?php
    $action = $_POST['action'];
    $filter = $_POST['filter'];
    $page = $_POST['page'];
    $start = ($page-1)*20;
    $success = array('msg'=>'ok','src'=>array(),'id'=>array());
    $totalSize = 0;
    $con = mysqli_connect("localhost", "root", "yxl730924", "travels");
    if ($con->connect_error) {
        die("could not connect to the db:\n");
    }
    if ($action == "title") {
        if($page == "1"){
            $sql = "SELECT * FROM travelimage WHERE TITLE LIKE '%$filter%'";
        }else{
            $sql = "SELECT * FROM travelimage WHERE TITLE LIKE '%$filter%' LIMIT $start,20";
        }
    } elseif ($action == "content") {
        if($page == "1"){
            $sql = "SELECT * FROM travelimage WHERE CONTENT = '$filter'";
        }else{
            $sql = "SELECT * FROM travelimage WHERE CONTENT = '$filter' LIMIT $start,20" ;
        }
    } elseif ($action == "city") {
        if($page == "1"){
            $sql = "SELECT * FROM travelimage WHERE CITYCODE = (SELECT GEONAMEID from GEOCITIES where ASCIINAME = '$filter' LIMIT 1)";
        }else{
            $sql = "SELECT * FROM travelimage WHERE CITYCODE = (SELECT GEONAMEID from GEOCITIES where ASCIINAME = '$filter' LIMIT 1) LIMIT $start,20";
        }
    } elseif ($action == "country") {
        if($page == "1"){
            $sql = "SELECT * FROM travelimage WHERE COUNTRY_REGIONCODEISO = (SELECT ISO from GEOCOUNTRIES_REGIONS where COUNTRY_REGIONNAME = '$filter' LIMIT 1)";
        }else{
            $sql = "SELECT * FROM travelimage WHERE COUNTRY_REGIONCODEISO = (SELECT ISO from GEOCOUNTRIES_REGIONS where COUNTRY_REGIONNAME = '$filter' LIMIT 1) LIMIT $start,20";
        }
    } elseif ($action == "filter") {
        $filter = json_decode($filter,true);
        if($page == "1"){
            $sql = "SELECT * FROM travelimage WHERE CONTENT = '$filter[0]' and COUNTRY_REGIONCODEISO = (SELECT ISO from GEOCOUNTRIES_REGIONS where COUNTRY_REGIONNAME = '$filter[1]' LIMIT 1) and CITYCODE = (SELECT GEONAMEID from GEOCITIES where ASCIINAME = '$filter[2]' LIMIT 1)";
        }else{
            $sql = "SELECT * FROM travelimage WHERE CONTENT = '$filter[0]' and COUNTRY_REGIONCODEISO = (SELECT ISO from GEOCOUNTRIES_REGIONS where COUNTRY_REGIONNAME = '$filter[1]' LIMIT 1) and CITYCODE = (SELECT GEONAMEID from GEOCITIES where ASCIINAME = '$filter[2]' LIMIT 1)  LIMIT $start,20";
        }
    }
    if ($result = mysqli_query($con, $sql)) {
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($success['src'],$row['PATH']);
            array_push($success['id'],$row['ImageID']);
            $totalSize = $totalSize +1;
        }
    }
    echo json_encode($success);

