<?php
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $content = $_POST['content'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $con = mysqli_connect("localhost", "root", "yxl730924", "travels");
    if ($con->connect_error) {
        die("could not connect to the db:\n");
    }
    mysqli_query($con, 'set names utf8');
    mysqli_query($con, 'set character_set_client=utf8');
    mysqli_query($con, 'set character_set_results=utf8');
    $sql1 = "SELECT * FROM geocountries_regions WHERE Country_RegionName ='$country'";
    if ($result1 = mysqli_query($con, $sql1)) {
        while ($row1 = mysqli_fetch_assoc($result1)) {
            //echo"<script type='text/javascript'>alert('Duplicated username！');</script>";
            $countryid = $row1['ISO'];
        }
    }
    $sql2 = "SELECT * FROM geocities WHERE AsciiName ='$city'";
    if ($result2 = mysqli_query($con, $sql2)) {
        while ($row2 = mysqli_fetch_assoc($result2)) {
            //echo"<script type='text/javascript'>alert('Duplicated username！');</script>";
            $cityid = $row2['GeoNameID'];
        }
    }
    $sql3 = "SELECT * FROM travelimage WHERE ImageID = $id";
    if ($result3 = mysqli_query($con, $sql3)) {
        while ($row3 = mysqli_fetch_assoc($result3)) {
            $url = 'C:\xampp\htdocs\projects\project2\src\travel-images\normal\medium/' . $row3['PATH'];
        }
    }
    if(!empty($_FILES['imgfile']['tmp_name'])){
        $imgFile = $_FILES['imgfile'];
        $upErr = $imgFile['error'];
        if ($upErr == 0){
            $imgType = $imgFile['type'];
            if ($imgType == 'image/jpeg'|| $imgType == 'image/gif'){
                $imgFileName = $imgFile['name'];
                $imgSize = $imgFile['size'];
                $imgTmpFile = $imgFile['tmp_name'];
                unlink($url);
                move_uploaded_file($imgTmpFile, 'C:\xampp\htdocs\projects\project2\src\travel-images\normal\medium/'.$imgFileName);
            }
        }
    }
    if(!empty($_FILES['imgfile']['tmp_name'])){
        $sql = "UPDATE travelimage SET PATH = '$imgFileName',Title = '$title',Description = '$description', 
                CityCode = '$cityid',Country_RegionCodeISO = '$countryid',Content = '$content' WHERE ImageID = '$id'";
    } else{
        $sql = "UPDATE travelimage SET Title = '$title',Description ='$description',
                CityCode = '$cityid', Country_RegionCodeISO = '$countryid' ,Content = '$content' WHERE ImageID = '0'";
    }
    if ($result = mysqli_query($con, $sql)) {
        header("Location:http://localhost/projects/project2/src/My%20photo.php");
    }
