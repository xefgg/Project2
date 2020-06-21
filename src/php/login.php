<?php
    session_start();
    $_SESSION['username']=$_POST['username'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $success = array('msg'=>'ok','infoCode'=>0);
    $con = mysqli_connect("localhost", "root", "yxl730924", "travels");
    if ($con->connect_error) {
        die("could not connect to the db:\n");
    }
    mysqli_query($con, 'set names utf8');
    mysqli_query($con, 'set character_set_client=utf8');
    mysqli_query($con, 'set character_set_results=utf8');
    $sql = "SELECT * FROM traveluser WHERE USERNAME ='$username'";
    if ($result = mysqli_query($con, $sql)) {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['Pass'] == $password) {
                /*header("Location: http://localhost/projects/project2/index.php");*/
                $success['infoCode'] = 1;
            }else{
                /*echo"<script>alert('Wrong Password！');</script>";*/
                $success['infoCode'] = 0;
            }
        }
    } else {
        /*echo"<script>alert('No such user！');</script>";*/
        $success['infoCode'] = 0;
    }
    echo json_encode($success);




