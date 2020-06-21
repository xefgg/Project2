<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Details</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/Details.css">
    <link rel="stylesheet" type="text/css" href="../font%20awesome/font-awesome/css/font-awesome.min.css">
    <script src="https://cdn.bootcss.com/jquery/3.4.1/jquery.js"></script>
    <script src="JS/Detail.js" type="text/javascript"></script>
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
                echo '<a href="../src/Log in.html"><button>Log in</button></a>';
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
<div class="details">
    <p class="detailTitle">Details</p>
</div>
<div class="pic-header">
    <p class="picTitle">Picture Title</p>
    <p class="author">by author</p>
</div>
<div class="picDetail">
    <img id="image" src="../img/sample.jpg" style="height: 50vh">
    <div class="picLike">
        <p><span>Like Number:</span><a class="likeNum">5201314</a></p>
        <p><span>Image Details</span></p>
        <p><span>Content:</span><a class="content">Scenery</a></p>
        <p><span>Country:</span><a class="country">Unknown</a></p>
        <p><span>City:</span><a class="city">Unknown</a></p>
        <p><button id="likebutton"><a>❤</a><a>Collect</a></button></p>
    </div>
    <div class="imgDetail">
    <a></a>

    </div>
</div>
<footer>
    <p>Copyright © 2020 Software School Web Fundamental. All Rights Reserved. Internet Content Provider：Fudan 18307130274</p>
</footer>

</body>
</html>