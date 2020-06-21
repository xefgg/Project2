<?php
    $filter = $_POST['filter'];
    $action = $_POST['action'];
    $page = $_POST['page'];
    $start = ($page-1)*5;
    $success = array('msg'=>'ok','src'=>array(),'id'=>array(),'title'=>array(),'description'=>array());
    $con = mysqli_connect("localhost", "root", "yxl730924", "travels");
    if ($con->connect_error) {
        die("could not connect to the db:\n");
    }
    if ($action == "title") {
        if($page == "1"){
            $sql = "SELECT * FROM travelimage WHERE TITLE LIKE '%$filter%'";
        }else{
            $sql = "SELECT * FROM travelimage WHERE TITLE LIKE '%$filter%' LIMIT $start,5";
        }
    } elseif ($action == "description") {
        if($page == "1"){
            $sql = "SELECT * FROM travelimage WHERE DESCRIPTION LIKE '%$filter%'";
        }else{
            $sql = "SELECT * FROM travelimage WHERE DESCRIPTION LIKE '%$filter%' LIMIT $start,5";
        }
    }
    if ($result = mysqli_query($con, $sql)) {
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($success['src'],$row['PATH']);
            array_push($success['id'],$row['ImageID']);
            array_push($success['title'],$row['Title']);
            array_push($success['description'],$row['Description']);
        }
    }
    echo json_encode($success);

