<?php
    $imageid = $_POST['imageid'];
    $con = mysqli_connect("localhost", "root", "yxl730924", "travels");
    if ($con->connect_error) {
        die("could not connect to the db:\n");
    }
    $sql = "SELECT * FROM travelimage WHERE ImageID = $imageid";
    if ($result = mysqli_query($con, $sql)) {
        while ($row = mysqli_fetch_assoc($result)) {
            $url = 'C:\xampp\htdocs\projects\project2\src\travel-images\normal\medium/'.$row['PATH'];
            unlink($url);
            $sql2 = "DELETE FROM travelimage WHERE ImageID = '$imageid'";
            if ($result2 = mysqli_query($con, $sql2)) {
                while ($row2 = mysqli_fetch_assoc($result2)) {
                    //header("Refresh:0");
                }
            }
        }
    }
