<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="src/css/reset.css">
    <link rel="stylesheet" type="text/css" href="src/css/style.css">
    <link rel="stylesheet" type="text/css" href="src/css/Home.css">
    <link rel="stylesheet" type="text/css" href="font%20awesome/font-awesome/css/font-awesome.min.css">
    <script src="https://cdn.bootcss.com/jquery/3.4.1/jquery.js"></script>
    <script type="text/javascript" src="src/JS/Home.js"></script>
</head>
<body>
<header>
    <nav>
        <div class="nav">
            <ul>
                <li><i class="fa fa-ravelry fa-3x" aria-hidden="true"></i></i></li>
                <li><a class="navHome" href="index.php">Home</a></li>
                <li><a href="src/Browser.php">Browse</a></li>
                <li><a href="src/Search.php">Search</a></li>
            </ul>
        </div>
        <div class="dropdown">
            <?php
            session_start();
            if(!isset($_SESSION['username'])){
                echo '<a href="src/Log in.html"><button>Log in</button></a>';
            } else{
                echo '<button>My Account ▼</button>';
                echo '<div class="dropdown-content">';
                echo '<a href="src/Upload.php"><i class="fa fa-upload" aria-hidden="true"></i><span>Upload</span></a>';
                echo '<a href="src/My%20photo.php"><i class="fa fa-picture-o" aria-hidden="true"></i><span>My photo</span></a>';
                echo '<a href="src/Favor.php"><i class="fa fa-heart" aria-hidden="true"></i><span>Favor</span></a>';
                echo '<a href="src/php/log%20out.php"><i class="fa fa-sign-out" aria-hidden="true"></i><span>Log out</span></a>';
                echo '</div>';
            }
            ?>
        </div>
    </nav>
</header>
<div class="frontPage">
    <img src="img/Home/ans.jpg" height="600px">
</div>
<div class="hotDisplay">
    <?php
    $con = mysqli_connect("localhost", "root", "yxl730924", "travels");
    if ($con->connect_error) {
        die("could not connect to the db:\n");
    }
    $sql = "SELECT ImageID, count( * ) AS count FROM travelimagefavor GROUP BY ImageID ORDER BY count DESC LIMIT 3";
    if ($result = mysqli_query($con, $sql)) {
            while ($row = mysqli_fetch_assoc($result)) {
                $image = $row['ImageID'];
                $sql2 = "SELECT * FROM travelimage WHERE ImageID = '$image'";
                if ($res = mysqli_query($con, $sql2)) {
                    while ($row2 = mysqli_fetch_assoc($res)) {
                        echo '<div class="display">';
                        echo '<a href="src/Details.php?id=' .$image .'" class="link">';
                        echo '<img class="imgdisplay" src="src/travel-images/normal/medium/' . $row2['PATH'] . '">';
                        echo '</a>';
                        echo '<p class="titledisplay">';
                        echo $row2['Title'];
                        echo '</p>';
                        echo '<span class="desdisplay">';
                        echo $row2['Description'];
                        echo '</span>';
                        echo '</div>';
                        }
                    }
                }
    }
    mysqli_free_result($result);
    mysqli_close($con);
    ?>
</div>
<!--<div class="hotDisplay">
    <?php
/*    for($x=0; $x<=2; $x++){
        echo '<div class="display">';
        echo '<a href="src/Details.php">';
        echo '<img src="img/Home/Home_1.jpg">';
        echo '</a>';
        echo '<p>Title</p>';
        echo '<span>Picture desciptions in details</span>';
        echo '</div>';
    }
    */?>
</div>-->

<button class="refresh" onclick="refresh()">
    <i class="fa fa-refresh" aria-hidden="true"></i>
</button>
<button class="backToTop" onclick="backToTop()" >
    <i class="fa fa-chevron-up" aria-hidden="true"></i>
</button>

</body>

<div class="footer">
    <p>
        CopyRight © 2018 Software School Web Fundamental. All Rights Reserved.
    </p>
    <p>
        Internet Content Provider  18307130274  Xiaoli Yu
    </p>
    <p>
        Contact us  wx Monica_1984_   qq  1418344529
    </p>
</div>

</html>