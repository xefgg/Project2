<?php
session_start();
$username = $_SESSION['username'];
$imageid = $_POST['id'];
$success = array('msg'=>'ok');
$con = mysqli_connect("localhost", "root", "yxl730924", "travels");
if ($con->connect_error) {
    die("could not connect to the db:\n");
}
mysqli_query($con, 'set names utf8');
mysqli_query($con, 'set character_set_client=utf8');
mysqli_query($con, 'set character_set_results=utf8');
$sql1 = "SELECT * FROM traveluser WHERE UserName = '$username'";
if ($result1 = mysqli_query($con, $sql1)) {
    while ($row1 = mysqli_fetch_assoc($result1)) {
        //echo"<script type='text/javascript'>alert('Duplicated username！');</script>";
        $uid = $row1['UID'];
    }
}
$sql2 = "DELETE FROM travelimagefavor WHERE UID = '$uid' AND ImageID = '$imageid'";
if ($result2 = mysqli_query($con, $sql2)) {
    while ($row2 = mysqli_fetch_assoc($result2)) {
    }
}
echo json_encode($success);
