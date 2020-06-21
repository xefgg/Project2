<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Favor</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/Favor.css">
    <link rel="stylesheet" type="text/css" href="../font%20awesome/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/pagination.css">
    <script src="https://cdn.bootcss.com/jquery/3.4.1/jquery.js"></script>
    <script src="JS/jquery.pagination.js"></script>
    <script type="text/javascript" src="JS/Favor.js"></script>
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
<div class="favor">
    <p class="favorTitle">My favorite</p>
    <?php
    for($i=0;$i<5;$i++) {
        echo '<div class="favorCollection">';
        echo '<div class="img-container">';
        echo '<a class="imageid">';
        echo '<img class="src">';
        echo '</a>';
        echo '</div>';
        echo '<div>';
        echo '<p class="title"></p>';
        echo '</div>';
        echo '<div>';
        echo '<a class="description"></a>';
        echo '</div>';
        echo '<div class="operation">';
        echo '<button type="submit" name="delete" class="delete">Delete</button>';
        echo '</div>';
        echo '</div><div class="clear"></div>';
    }
    ?>
    <div class="M-box"></div>
</div>
<footer>
    <p>Copyright © 2020 Software School Web Fundamental. All Rights Reserved. Internet Content Provider：Fudan 18307130274</p>
</footer>
</body>
</html>