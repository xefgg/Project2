<?php
    $success = array('msg'=>'ok','src'=>array(),'title'=>array(),'description'=>array(),'link'=>array());
    $con = mysqli_connect("localhost", "root", "yxl730924", "travels");
    if ($con->connect_error) {
        die("could not connect to the db:\n");
    }
    $sql = "SELECT * FROM travelimage ORDER BY RAND() LIMIT 3";
    if ($result = mysqli_query($con, $sql)) {
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($success['src'],$row['PATH']);
            array_push($success['title'],$row['Title']);
            array_push($success['description'],$row['Description']);
            array_push($success['link'],$row['ImageID']);
        }
    }
    echo json_encode($success);

