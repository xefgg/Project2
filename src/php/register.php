<?php
    $username = $_POST['username'];
    $password = $_POST['password'];
    $success = array('msg'=>'ok','infoCode'=>1);
    $con = mysqli_connect("localhost", "root", "yxl730924", "travels");
    $flag = null;
    if ($con->connect_error) {
        die("could not connect to the db:\n");
    }
    mysqli_query($con, 'set names utf8');
    mysqli_query($con, 'set character_set_client=utf8');
    mysqli_query($con, 'set character_set_results=utf8');
    $sql = "SELECT * FROM traveluser WHERE USERNAME ='$username'";
    if ($result = mysqli_query($con, $sql)) {
        if($result->num_rows>0) {
            //echo"<script type='text/javascript'>alert('Duplicated username！');</script>";
            $success['infoCode'] = 0;
            $flag = 0;
        }else{
            $flag = 1;
        }
    }
    if($flag == 1){
        $sql2 = "INSERT INTO traveluser(UserName,Pass,State) VALUES ('$username', '$password', '1')";
        if ($result = mysqli_query($con, $sql2)) {
            //echo"<script type='text/javascript'>alert('Successful registration！');</script>";
        }
    }
    echo json_encode($success);
