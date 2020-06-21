<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/Upload.css">
    <link rel="stylesheet" type="text/css" href="../font%20awesome/font-awesome/css/font-awesome.min.css">
    <script src="https://cdn.bootcss.com/jquery/3.4.1/jquery.js"></script>
    <script type="text/javascript" src="JS/Browser.js"></script>
    <script type="text/javascript" src="JS/Upload.js"></script>
</head>
<body>
<header>
    <nav>
        <div class="nav">
            <ul>
                <li><i class="fa fa-ravelry fa-3x" aria-hidden="true"></i></i></li>
                <li><a class="navHome" href="../index.php">Home</a></li>
                <li><a href="Browser.php">Browse</a></li>
                <li><a href="Search.php">Search</a></li>
            </ul>
        </div>
        <div class="dropdown">
            <?php
            session_start();
            if(!isset($_SESSION['username'])){
                header("Location:http://localhost/projects/project2/src/Log%20in.html");
            } else{
                echo '<button>My Account ▼</button>';
                echo '<div class="dropdown-content">';
                echo '<a href="Upload.php"><i class="fa fa-upload" aria-hidden="true"></i><span>Upload</span></a>';
                echo '<a href="../src/My%20photo.php"><i class="fa fa-picture-o" aria-hidden="true"></i><span>My photo</span></a>';
                echo '<a href="Favor.php"><i class="fa fa-heart" aria-hidden="true"></i><span>Favor</span></a>';
                echo '<a href="../src/php/log%20out.php"><i class="fa fa-sign-out" aria-hidden="true"></i><span>Log out</span></a>';
                echo '</div>';
            }
            ?>
        </div>
    </nav>
</header>
<form action="php/upload.php" method="post" enctype="multipart/form-data" name="form">
<div class="upload">
    <p>Upload your picture</p>
    <div class="picture">
        <img id="upPicture" style="display: none"><br>
        <p id="hint">No picture uploaded</p>
        <input type="file" id="picName" name="imgfile" onchange="uploadPic()"><br>
    </div>
</div>
<div class="pictureInfo">
    <div class="infoBlock">
        <p>Picture title</p>
        <input type="text" name="title" class="inputBorder" id="title">
        <p class="warning"></p>
    </div>
</div>
<div class="pictureInfo">
    <div class="infoBlock">
        <p>Picture descriptions</p>
        <textarea name="description" class="picDescription" id="description"></textarea>
        <p class="warning"></p>
    </div>
</div>
<div class="pictureInfo">
    <div class="infoBlock">
        <p>More Information</p>
        <select id="selectContent" name="content">
            <option hidden>Content</option>
            <option value="scenery">Scenery</option>
            <option value="people">People</option>
            <option value="building">Building</option>
            <option value="animal">Animal</option>
            <option value="city">City</option>
            <option value="wonder">Wonder</option>
            <option value="other">Other</option>
        </select>
        <?php
        echo '<select id="selectCountry" name="country" onchange="selectcity()">';
        echo '<option hidden>Country</option>';
        echo '</select>';
        ?>
        <select id="selectCity" name="city">
            <option hidden>City</option>
        </select>
        <p class="warning"></p>
    </div>
</div>
<button type="submit" name="upload" value="Upload" class="uploadBtn" onclick="return checkform()">Upload</button>
</form>
<footer>
    <p>Copyright © 2020 Software School Web Fundamental. All Rights Reserved. Internet Content Provider：Fudan 18307130274</p>
</footer>
</body>
</html>