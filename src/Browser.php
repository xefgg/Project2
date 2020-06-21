<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Browser</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/Browser.css">
    <link rel="stylesheet" type="text/css" href="../font%20awesome/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/pagination.css">
    <script src="https://cdn.bootcss.com/jquery/3.4.1/jquery.js"></script>
    <script src="JS/jquery.pagination.js"></script>
    <script type="text/javascript" src="JS/Browser.js"></script>
</head>
<body>
<nav>
    <div class="nav">
        <ul>
            <li><i class="fa fa-ravelry fa-3x" aria-hidden="true"></i></i></li>
            <li><a href="../index.php">Home</a></li>
            <li><a class="navBrowser" href="Browser.php">Browse</a></li>
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
<div class="leftside">
    <form>
    <div class="searchbyTitle">
        <p>Search by Title</p>
        <input name="searchtitle" type="text" class="titlesearch">
        <button type="button" onclick="search()" class="search"><i class="fa fa-search" aria-hidden="true"></i></button>
    </div>
    </form>
    <div class="quickBrowse">
        <table>
            <tr>
                <th class="countrytitle">Hot Content</th>
            </tr>
            <tr>
                <th class="countryname" onclick="contentfilter(this)">Scenery</th>
            </tr>
            <tr>
                <th class="countryname" onclick="contentfilter(this)">People</th>
            </tr>
            <tr>
                <th class="countryname" onclick="contentfilter(this)">Building</th>
            </tr>
            <tr>
                <th class="countryname" onclick="contentfilter(this)">Animal</th>
            </tr>
            <tr>
                <th class="countryname" onclick="contentfilter(this)">City</th>
            </tr>
            <tr>
                <th class="countryname" onclick="contentfilter(this)">Wonder</th>
            </tr>
        </table>
        <table>
            <tr>
                <th class="countrytitle">Hot Country</th>
            </tr>
            <tr>
                <th class="countryname" onclick="countryfilter(this)">Italy</th>
            </tr>
            <tr>
                <th class="countryname" onclick="countryfilter(this)">Canada</th>
            </tr>
            <tr>
                <th class="countryname" onclick="countryfilter(this)">United Kingdom</th>
            </tr>
            <tr>
                <th class="countryname" onclick="countryfilter(this)">Germany</th>
            </tr>
            <tr>
                <th class="countryname" onclick="countryfilter(this)">Greece</th>
            </tr>

        </table>
        <table>
            <tr>
                <th class="countrytitle">Hot City</th>
            </tr>
            <tr>
                <th class="countryname" onclick="cityfilter(this)">Firenze</th>
            </tr>

            <tr>
                <th class="countryname" onclick="cityfilter(this)">London</th>
            </tr>
            <tr>
                <th class="countryname" onclick="cityfilter(this)">Verona</th>
            </tr>
            <tr>
                <th class="countryname" onclick="cityfilter(this)">Athens</th>
            </tr>
            <tr>
                <th class="countryname" onclick="cityfilter(this)">Berlin</th>
            </tr>
        </table>
    </div>
</div>
<div class="main">
    <div class="filter">
        <p>Filter</p>
        <select id="selectContent">
            <option hidden>Filter by Content</option>
            <option value="scenery">Scenery</option>
            <option value="people">People</option>
            <option value="building">Building</option>
            <option value="animal">Animal</option>
            <option value="city">City</option>
            <option value="wonder">Wonder</option>
        </select>
        <?php
        echo '<select id="selectCountry" onchange="selectcity()">';
        echo '<option hidden>Filter by Country</option>';
        echo '</select>';
        ?>
        <select id="selectCity">
            <option hidden>Filter by City</option>
        </select>
        <button type="button" onclick="filter()">Filter</button>
    </div>
    <div class="result">
            <?php
            echo '<table>';
            for($i=0;$i<5;$i++){
                echo '<tr>';
                for($j=0;$j<4;$j++){
                    echo '<th>';
                    echo '<div class="img-container">';
                    echo '<a class="imageid">';
                    echo '<img class="src">';
                    echo '</a>';
                    echo '</div>';
                    echo '</th>';
                }
                echo '</tr>';

            }
            ?>
        </table>
    </div>
<!--    <div class="pignitation">
        <p>< <span>1</span> 2 3 4 5 6 ... 9 ></p>

    </div>-->
    <div class="M-box"></div>
</div>
<footer>
    <p>Copyright © 2020 Software School Web Fundamental. All Rights Reserved. Internet Content Provider：Fudan 18307130274</p>
</footer>
</body>
</html>