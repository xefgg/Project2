<?php
    session_start();
    $username = $_SESSION['username'];
    $imgid = $_POST['imgid'];
    $page = $_POST['page'];
    $start = ($page-1)*5;
    $success = array('msg'=>'ok','src'=>array(),'id'=>array(),'title'=>array(),'description'=>array());
    $con = mysqli_connect("localhost", "root", "yxl730924", "travels");
    if ($con->connect_error) {
        die("could not connect to the db:\n");
    }
     if($page == "1"){
         $sql = "SELECT * FROM travelimage WHERE UID = (SELECT UID FROM traveluser WHERE USERNAME = '$username')";
     }else{
         $sql = "SELECT * FROM travelimage WHERE UID = (SELECT UID FROM traveluser WHERE USERNAME = '$username') LIMIT $start,5";
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

