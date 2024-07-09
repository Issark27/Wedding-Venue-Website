<!DOCTYPE html>

<?php
$servername = "sci-mysql";
$username = "coa123wuser";
$password = "grt64dkh!@2FD";
$dbname = "coa123wdb";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql_1 = "SELECT venue.venue_id as venue_id, venue.name as name, venue.capacity as capacity, venue.weekend_price as weekend_price, venue.weekday_price as weekday_price, MAX((catering.cost * venue.capacity) + venue.weekend_price) as weekend_subtotal, MAX((catering.cost * venue.capacity) + venue.weekday_price) as weekday_subtotal, venue.licensed as licensed, venue.latitude as latitude, venue.longitude as longitude, ROUND(SUM(venue_review_score.score) / COUNT(venue_review_score.score), 1) as score, MIN(catering.cost) as catering FROM venue LEFT JOIN catering ON venue.venue_id = catering.venue_id LEFT JOIN venue_review_score ON venue.venue_id = venue_review_score.venue_id GROUP BY venue.venue_id ORDER BY score DESC;";
$result_1 = mysqli_query($conn, $sql_1);
$venues_array = array();
while ($row = mysqli_fetch_array($result_1, MYSQLI_ASSOC)) {
    $venues_array[] = $row;
}

$venues_json = json_encode($venues_array);


$venues_json = json_encode($venues_array);

$sql_2 = "SELECT * FROM venue_booking";
$result_2 = mysqli_query($conn, $sql_2);
$booking_array = array();
while ($row = mysqli_fetch_array($result_2, MYSQLI_ASSOC)) {
    $booking_array[] = $row;
}

$booking_json = json_encode($booking_array);

$sql_3 = "SELECT venue_id, ROUND(SUM(score)/COUNT(score), 1) as 'score', COUNT(review_id) as 'count' FROM venue_review_score GROUP BY venue_id";
$result_3 = mysqli_query($conn, $sql_3);
$score_array = array();
while ($row = mysqli_fetch_array($result_3, MYSQLI_ASSOC)) {
    $score_array[] = $row;
}

$score_json = json_encode($score_array);

$sql_4 = "SELECT * FROM catering";
$result_4 = mysqli_query($conn, $sql_4);
$catering_array = array();
while ($row = mysqli_fetch_array($result_4, MYSQLI_ASSOC)) {
    $catering_array[] = $row;
}

$catering_json = json_encode($catering_array);

$sql_5 = "SELECT venue_id, score, COUNT(score) as score_count FROM venue_review_score WHERE score BETWEEN 1 AND 10 GROUP BY venue_id, score ORDER BY venue_id, score;";
$result_5 = mysqli_query($conn, $sql_5);
$graph_array = array();
while ($row = mysqli_fetch_array($result_5, MYSQLI_ASSOC)) {
    $graph_array[] = $row;
}

$graph_json = json_encode($graph_array);


?>


<html>

<style>
    .venues:hover .drink {
        color: rgb(250, 178, 22);
        transition: color 0.4s ease-out;
    }

    .drink {
        color: initial;
        transition: color 0.4s ease-in;
    }

    .venues:hover .group {
        color: rgb(10, 250, 250);
        transition: color 0.4s ease-out;
    }

    .group {
        color: initial;
        transition: color 0.4s ease-in;
    }


    .cost-container {
        position: absolute;
        bottom: 5px;
        left: 10px;
    }

    .cost-container p {
        margin-bottom: 3px;
    }

    .venue-container {
        background-color: white;
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        align-items: center;
    }

    .venues {
        background-color: white;
        position: relative;
        width: 475px;
        height: 250px;
        border: 2px solid grey;
        margin: 10px;
        margin-bottom: 10px;
        border-radius: 5px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
    }

    .venue-title {
        margin: 0 auto;
        margin-top: 10px;
        margin-bottom: 5px;
        margin-left: 10px;
        font-size: 23px;
        animation: hoverAround 2s infinite alternate;
    }

    .available {
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
        text-align: center;
        margin: 15px;
    }

    .available header {
        width: 450px;
        background-color: rgb(223, 216, 210);
        border-radius: 15px;
    }


    #list {
        display: flex;

    }

    #list p {
        margin-left: 10px;
        font-size: 17px;
    }

    .container {
        display: flex;
    }

    .venue-score {
        font-family: 'Poiret One', sans-serif;
        position: absolute;
        bottom: 23px;
        right: 16px;
        text-align: center;
        justify-content: center;
        align-items: center;
        height: auto;
        width: 35px;
        border-radius: 12px;
        color: white;
        font-size: 17px;
    }

    .count {
        font-size: 12px;
        color: rgba(156, 155, 154, 0.85);
        position: absolute;
        bottom: 5px;
        right: 7px;

    }

    .capacity {
        font-size: 15px;
        top: 15px;
        right: 8px;
        position: absolute;
    }

    .drop {
        margin-top: 25px;
        margin-left: 10px;
    }

    .drop select {
        border-radius: 5px;
    }

    .line {
        width: 163px;
        height: 1.5px;
        background-color: grey;
    }

    .carousel-indicators button {
        transform: translateY(20px);
        height: 2px;
        background-color: yellow;
    }

    .carousel-indicators button.active {
        transform: translateY(20px);
        height: 2px;
        background-color: yellow;
    }

    .car {
        left: 182px;
        bottom: 70px;
        width: 255px
    }

    .carousel-item img {
        border-radius: 10px;
        width: 100%;
        height: auto;
    }

    .background {
        margin: 5px;
        display: relative;
        position: absolute;
        text-align: center;
        font-size: 50px;
        color: rgba(209, 207, 207, 0.6);
        z-index: -1;
        width: 100%;
        height: 1000%;
        overflow: hidden;
    }

    @media (max-width: 470px) {
        .car {
            left: 160px;
        }
    }

    @keyframes hoverAround {
        0% {
            transform: translateY(0px) rotate(0deg) translateX(1px) rotate(0deg);
        }

        50% {
            transform: translateY(-1px) rotate(180deg) translateX(1px) rotate(-180deg);
        }

        100% {
            transform: translateY(0px) rotate(360deg) translateX(1px) rotate(-360deg);
        }
    }

    .map-container {
        margin-top: 10px;
        margin-bottom: 15px;
        margin-right: 5px;
        margin-left: 5px;
        display: flex;
        align-items: center;
        justify-content: center;
    }


    #none {
        margin-top: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    #none p {
        margin: 20px;
        display: flex;
        font-size: 20px;
        align-items: center;
        justify-content: center;
        text-align: center;
        border-radius: 10px;
        width: 550px;
        height: 75px;
        background-color: rgb(223, 216, 210);
    }

    .chart-container {
        width: 300px;
        height: 300px;
        position: relative;
        justify-content: center;
        margin: 0 auto;
    }

    .chart {
        width: 100px;
        height: 100px;
    }

    .revs {
        position: absolute;
        width: 160px;
        font-size: 13px;
        border: 1px solid rgba(219, 217, 217, 0.4);
        border-radius: 30px;
        left: 200px;
        bottom: 3px;
        transition: color 0.42s ease;
        transition: background-color 0.3s ease;
        animation: widthChange 2s infinite alternate;
    }

    .revs:hover {
        color: white;
        background-color: rgba(173, 173, 173, 0.4);
        transition: color 0.2s ease;
    }

    @keyframes widthChange {
    0% {
        width: 160px;
    }
    50% {
        width: 180px;
    }
    100% {
        width: 160px;
    }
}

    #description {
        text-align: center;
        font-size: 20px;
        margin: 15px;
    }

    .cinzel-regular {
        font-family: "Cinzel", serif;
        font-optical-sizing: auto;
        font-weight: 400;
        font-style: normal;
    }

    .gfs-didot-regular {
        font-family: "GFS Didot", serif;
        font-weight: 400;
        font-style: normal;
    }


</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Your Venue</title>
    <script src="https://kit.fontawesome.com/dc74b5e8a7.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Poiret+One:400" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prata&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>


<body>
    <div class="menu-icon no-outline" id="menu-icon">
        <span class="material-symbols-outlined" onclick="toggleMenu()">menu</span>
    </div>

    <div class="prata-regular collapsed-menu" id="collapsed">
        <div id="items">
            <ul>
                <li><a href="wedding.php">Home</a></li>
                <li><a href="wedding.php">About</a></li>
                <li><a href="wedding.php">Venues</a></li>
                <li><a href="find.php">Find Your Venue</a></li>
            </ul>
        </div>
    </div>

    <nav class="prata-regular nav">
        <ul>
            <li><a href="wedding.php">Home</a></li>
            <li><a href="wedding.php">About</a></li>
            <li><a href="wedding.php">Venues</a></li>
        </ul>
    </nav>

    <div class="logo-container">
        <div id="LOGO" class="prata-regular">
            <h1 id="logo-text-1" style="font-size: 12px;">EST 2010</h1>
            <h2 id="logo-text-2" style="font-size: 45px;">UNITY</h2>
            <h3 id="logo-text-3" style="font-size: 32px;">WEDDING PLANNERS</h3>
        </div>
    </div>

    <div class="prata-regular" id="Find">
        <a href="find.php">Find Your Venue</a>
    </div>


    <div class="navbar-square fixed-top"></div>

    <img id="photo1" src="photo1.jpg" alt="Venue Image">

    <div class="prata-regular title">
        <header>Find Your Venue</header>
    </div>


    <div class="prata-regular" id='description'>
        <header>Use Our System Below To Find your Perfect Venue</header>
    </div>

    <style>
        .input-container {
            position: relative;
            width: 150px;
        }

        .pound {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            pointer-events: none;
        }

        input[type='number']::-webkit-inner-spin-button,
        input[type='number']::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .form {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
        }

        .option {
            display: flex;
            justify-content: space-between;
        }

        #myForm {
            margin: 10px;
        }

        .form .option i {
            transition: color 0.5s ease;
        }

        .form .option:hover i {
            color: white;
            transition: color 0.5s ease;
        }

        @media only screen and (max-width: 630px) {
            #myForm {
                margin: 1px;
            }
        }

    </style>

    <div class="prata-regular form" action="find.php" method="get" style='background-color: rgb(223, 216, 210); padding: 3px; display: flex; align-items: center; justify-content: center; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);'>
        <form class="form" id='myForm' style='background-color: rgb(223, 216, 210); width: 600px;'>
            <div class="option">
                <i class="fa-solid fa-people-group" style='margin-right: 10px; font-size: 25px;'></i>
                <span>How many people will be Attending</span>
                <input type="number" name="venue-capacity" min="1" max="1000" placeholder="Enter Capacity" required style='width: 150px; text-align: center; border-radius: 5px;'>
            </div>

            <div class="option">
                <i class="fa-solid fa-calendar-days" style='margin-right: 10px; font-size: 20px;'></i>
                <span>Date of Wedding</span>
                <input type="date" name="wedding-date" min="2024-01-01" max="2024-12-31" required>
            </div>

            <div class="option">
            <i class="fa-solid fa-utensils" style='margin-right: 10px; font-size: 20px;'></i>
                <span>What Catering Grade Is Required</span>
                <select name="cater-grade">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>

            <div class="option">
                <i class="fa-solid fa-hand-holding-dollar" style='margin-right: 10px; font-size: 20px;'></i>
                <span>What is Your Budget</span>
                <div class="input-container">
                    <span class="pound">£</span>
                    <input type="number" name="venue-price" min="1" placeholder="Budget" required required style='width: 100%; text-align: center; border-radius: 5px;'>
                </div>
            </div>

            <div class="option">
                <i class="fa-solid fa-champagne-glasses" style='margin-right: 10px; font-size: 20px;'></i>
                <span>Is Alcohol Needed</span>
                <select name="yn">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>

            <div class="option">
                <i class="fa-solid fa-sort" style='margin-right: 10px; font-size: 20px;'></i>
                <span>Sort By</span>
                <select name="sort">
                    <option value='rating'>Rating</option>
                    <option value='capacity'>Capacity</option>
                    <option value='weekend_price'>Price</option>
                </select>
            </div>

            <input type="submit" value="Submit" style='margin-left: 45%; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); transition: color 0.25s ease;'>
        </form>

    </div>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $form_data = [
            "capacity" => $_GET["venue-capacity"],
            "date" => $_GET["wedding-date"],
            "price" => $_GET["venue-price"],
            "licensed" => $_GET["yn"],
            "grading" => $_GET["cater-grade"],
            'sort' => $_GET['sort'],
            $inputDate = $_GET["wedding-date"],
            $dayOfWeek = date('l', strtotime($inputDate))
        ];
    }

    if ($form_data['sort'] === 'capacity') {
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql_1 = "SELECT venue.venue_id as venue_id, venue.name as name, venue.capacity as capacity, venue.weekend_price as weekend_price, venue.weekday_price as weekday_price, MAX((catering.cost * venue.capacity) + venue.weekend_price) as weekend_subtotal, MAX((catering.cost * venue.capacity) + venue.weekday_price) as weekday_subtotal, venue.licensed as licensed, venue.latitude as latitude, venue.longitude as longitude, ROUND(SUM(venue_review_score.score) / COUNT(venue_review_score.score), 1) as score, MIN(catering.cost) as catering FROM venue LEFT JOIN catering ON venue.venue_id = catering.venue_id LEFT JOIN venue_review_score ON venue.venue_id = venue_review_score.venue_id GROUP BY venue.venue_id ORDER BY capacity DESC;";
        $result_1 = mysqli_query($conn, $sql_1);
        $venues_array = array();
        while ($row = mysqli_fetch_array($result_1, MYSQLI_ASSOC)) {
            $venues_array[] = $row;
        }
        $venues_json = json_encode($venues_array);
    } elseif ($form_data['sort'] === 'weekend_price') {
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql_1 = "SELECT venue.venue_id as venue_id, venue.name as name, venue.capacity as capacity, venue.weekend_price as weekend_price, venue.weekday_price as weekday_price, MAX((catering.cost * venue.capacity) + venue.weekend_price) as weekend_subtotal, MAX((catering.cost * venue.capacity) + venue.weekday_price) as weekday_subtotal, venue.licensed as licensed, venue.latitude as latitude, venue.longitude as longitude, ROUND(SUM(venue_review_score.score) / COUNT(venue_review_score.score), 1) as score, MIN(catering.cost) as catering FROM venue LEFT JOIN catering ON venue.venue_id = catering.venue_id LEFT JOIN venue_review_score ON venue.venue_id = venue_review_score.venue_id GROUP BY venue.venue_id ORDER BY weekday_subtotal DESC;";
        $result_1 = mysqli_query($conn, $sql_1);
        $venues_array = array();
        while ($row = mysqli_fetch_array($result_1, MYSQLI_ASSOC)) {
            $venues_array[] = $row;
        }
        $venues_json = json_encode($venues_array);
    } elseif ($form_data === 'rating') {
    }


    $venues_decoded = json_decode($venues_json, true);
    $booking_decoded = json_decode($booking_json, true);
    $score_decoded = json_decode($score_json, true);
    $catering_decoded = json_decode($catering_json, true);
    $graph_decoded = json_decode($graph_json, true);

    $matched_venues = [];


    $weekdays = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
    $weekends = ['Saturday', 'Sunday'];

    $venue_grades = array();
    foreach ($catering_decoded as $catering) {
        $id = $catering['venue_id'];
        $grade = $catering['grade'];

        if (array_key_exists($id, $venue_grades)) {
            $venue_grades[$id][] = intval($grade);
        } else {
            $venue_grades[$id] = array(intval($grade));
        }
    }

    for ($i = 0; $i < count($venues_decoded); $i++) {
        $venue_dates = [];
        if (
            intval($venues_decoded[$i]['capacity']) >= intval($form_data['capacity']) &&
            in_array($dayOfWeek, $weekdays) &&
            (intval($venues_decoded[$i]['weekday_price']) + intval($venues_decoded[$i]['catering']) * intval($form_data['capacity'])) <= intval($form_data['price']) &&
            intval($venues_decoded[$i]['licensed']) == intval($form_data['licensed']) &&
            in_array($form_data['grading'], $venue_grades[$venues_decoded[$i]['venue_id']])
        ) {
            foreach ($booking_decoded as $booking) {
                if ($booking['venue_id'] == $venues_decoded[$i]['venue_id']) {
                    array_push($venue_dates, $booking['booking_date']);
                }
            }
            if (!(in_array($form_data['date'], $venue_dates))) {
                array_push($matched_venues, $venues_decoded[$i]['venue_id']);
            }
        } elseif (
            intval($venues_decoded[$i]['capacity']) >= intval($form_data['capacity']) &&
            in_array($dayOfWeek, $weekends) &&
            (intval($venues_decoded[$i]['weekend_price']) + intval($venues_decoded[$i]['catering']) * intval($form_data['capacity'])) <= intval($form_data['price']) &&
            intval($venues_decoded[$i]['licensed']) == intval($form_data['licensed']) &&
            in_array($form_data['grading'], $venue_grades[$venues_decoded[$i]['venue_id']])
        ) {
            foreach ($booking_decoded as $booking) {
                if ($booking['venue_id'] == $venues_decoded[$i]['venue_id']) {
                    array_push($venue_dates, $booking['booking_date']);
                }
            }
            if (!(in_array($form_data['date'], $venue_dates))) {
                array_push($matched_venues, $venues_decoded[$i]['venue_id']);
            }
        }
    }

    if (count($matched_venues) > 0) {
        echo "<div class='prata-regular available'><header>These Are The Available Venues<header></div>";
    }

    for ($i = 0; $i < count($matched_venues); $i++) {
        foreach ($venues_decoded as $venue) {
            if ($venue['venue_id'] == $matched_venues[$i]) {
                $venue_id = $venue['venue_id'];
                $venue_name = $venue['name'];
                if (in_array($dayOfWeek, $weekdays)) {
                    $venue_price = $venue['weekday_price'];
                    $venue_day = "Weekday";
                } elseif (in_array($dayOfWeek, $weekends)) {
                    $venue_price = $venue['weekend_price'];
                    $venue_day = "Weekend";
                }


                $venue_longitude[$venue_name] = $venue['longitude'];
                $venue_latitude[$venue_name] = $venue['latitude'];
                $venue_capacity = $venue['capacity'];
                if ($venue['licensed'] == "1") {
                    $venue_licensed = "<span class='material-symbols-outlined'>local_bar</span>";
                } else {
                    $venue_licensed = "<span class='material-symbols-outlined'>no_drinks</span>";
                }

                for ($j = 0; $j < count($score_decoded); $j++) {
                    if ($score_decoded[$j]['venue_id'] == $matched_venues[$i]) {
                        $venue_score = $score_decoded[$j]['score'];
                        $venue_count = $score_decoded[$j]['count'];
                    }
                }
            }
        }

        $options_array = [];
        foreach ($catering_decoded as $catering) {
            if ($catering['venue_id'] == $matched_venues[$i]) {
                $options_array[$catering['grade']] = $catering['cost'];
            }
        }

        if ($venue_score < 5) {
            $score_color = "rgb(209, 11, 4)";
            $score_comment = "Review";
        } elseif ($venue_score < 7 && $venue_score >= 5) {
            $score_color = "rgb(250, 138, 10)";
            $score_comment = "Review";
        } elseif ($venue_score < 8 && $venue_score >= 7) {
            $score_color = "rgb(5, 255, 76)";
            $score_comment = "Good";
        } elseif ($venue_score <= 9 && $venue_score >= 8) {
            $score_color = "rgb(5, 212, 252)";
            $score_comment = "Very Good";
        } elseif ($venue_score <= 10 && $venue_score > 9) {
            $score_color = "rgb(158, 5, 247)";
            $score_comment = "Excellent";
        };

        echo "<div class='venue-container'>";

        echo "<div class='venues'>";

        echo "<div class='prata-regular venue-title'>$venue_name <span class='drink'>$venue_licensed</span></div>";
        echo "<div id='list' class='capacity'>";
        echo "<span class='material-symbols-outlined group'>group</span>";
        echo "<p class='cinzel-regular'>$venue_capacity</p>";
        echo "</div>";

        echo "<div class='drop gfs-didot-regular'>";
        echo "<form id='catering-form'>";
        echo "<label><b>Catering Grade</b></label><br>";
        echo "<select name='drop' id='catering-grade-$i'>";
        echo "<option value=''>Select Grade</option>";
        foreach ($options_array as $grade => $cost) {
            echo "<option value='$cost'>Grade: $grade</option>";
        }
        echo "</select>";
        echo "</form>";
        echo "</div>";

        $user_capacity = $form_data['capacity'];

        echo "<div class='cinzel-regular cost-container'>";
        echo "<p><b>$venue_day Cost </b>£$venue_price</p>";
        echo "<p><b>Catering Cost </b><span id='catering-cost-$i'>£</span> * $user_capacity</p>";
        echo "<div class='line'></div>";
        echo "<p><b>Total </b><span id='subtotal-$i'>£$subTotal</span></p>";
        echo "</div>";


        echo "<button class='cinzel-regular revs' id='revs_$i' >Click For Reviews</button>";

        echo "<script>";
        echo "document.getElementById('revs_$i').addEventListener('click', function() {";
        echo "var chartContainer = document.getElementById('chart-container-$i');";
        echo "if (chartContainer.style.opacity === '0') {";
        echo "chartContainer.style.display = 'block';";
        echo "setTimeout(function() { chartContainer.style.opacity = '1';}, 50);";
        echo "} else {";
        echo "chartContainer.style.opacity = '0';";
        echo "setTimeout(function() { chartContainer.style.display = 'none';}, 300);";
        echo "}";
        echo "});";
        echo "</script>";


        foreach ($matched_venues as $v) {
            if ($v == $venue_id) {
                echo "<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js'
                integrity='sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz'
                crossorigin='anonymous'></script>";
                echo "<div id='carousel-$v' class='carousel slide car' data-bs-ride='carousel'>";
                echo "<div class='carousel-indicators'>";
                echo "<button type='button' data-bs-target='#carousel-$v' data-bs-slide-to='0' class='active'></button>";
                echo "<button type='button' data-bs-target='#carousel-$v' data-bs-slide-to='1'></button>";
                echo "</div>";
                echo "<div class='carousel-inner'>";
                echo "<div class='carousel-item active'>";
                echo "<img src='carousel-$v-1.jpg' alt='first-photo' class='d-block w-100'>";
                echo "</div>";
                echo "<div class='carousel-item'>";
                echo "<img src='carousel-$v-2.jpg' alt='second-photo' class='d-block w-100'>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
        }

        echo "<div class='cinzel-regular count'>$venue_count Reviews</div>";

        echo "<div class='roboto-medium venue-score' style='background-color: $score_color;'>";
        echo "<header>$venue_score</header>";
        echo "</div>";
        echo "</div>";

        echo "</div>";

        echo "<script>";
        echo "document.getElementById('catering-grade-$i').addEventListener('change', function() {";
        echo "var selectedOption = this.value;";
        echo "if (selectedOption === '') return;";
        echo "var cateringGrade = parseFloat(this.value);";
        echo "var venuePrice = parseFloat($venue_price);";
        echo "var venueCapacity = parseFloat($user_capacity);";
        echo "var subtotal = venuePrice + (cateringGrade*venueCapacity);";
        echo "var cateringCostElement = document.getElementById('catering-cost-$i');";
        echo "var subtotalElement = document.getElementById('subtotal-$i');";
        echo "cateringCostElement.style.opacity = 0;";
        echo "subtotalElement.style.opacity = 0;";

        echo "var duration = 600;";
        echo "var steps = 35;";
        echo "var stepDuration = duration / steps;";
        echo "var opacityStep = 1 / steps;";
        echo "var currentOpacity = 0;";

        echo "var opacityInterval = setInterval(function() {";
        echo "if (currentOpacity >= 1) {";
        echo "clearInterval(opacityInterval);";
        echo "} else {";
        echo "cateringCostElement.textContent = '£' + cateringGrade.toFixed(0);";
        echo "subtotalElement.textContent = '£' + subtotal.toFixed(0);";
        echo "cateringCostElement.style.opacity = currentOpacity;";
        echo "subtotalElement.style.opacity = currentOpacity;";
        echo "currentOpacity += opacityStep;";
        echo "}";
        echo "}, stepDuration);";

        echo "});";
        echo "</script>";

        $venue_data = array_filter($graph_decoded, function ($entry) use ($venue) {
            return $entry[0] = $venue;
        });

        echo "<script
        src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js'>
        </script>";


        $graph_array = array();
        foreach ($matched_venues as $m) {
            foreach ($graph_decoded as $g) {
                if ($matched_venues[$i] == $g['venue_id']) {
                    $graph_array[$g['score']] = $g['score_count'];
                }
            }
        }

        $graph_x = array();
        $graph_y = array();

        foreach ($graph_array as $a => $val) {
            $graph_x[] = $a;
            $graph_y[] = $val;
        }

        $indexes = array();

        for ($w = 1; $w <= 10; $w++) {
            if (!in_array($w, $graph_x)) {
                $indexes[] = $w;
            }
        }

        foreach ($indexes as $t) {
            array_splice($graph_x, $t - 1, 0, $t);
            array_splice($graph_y, $t - 1, 0, 0);
        }



        $graph_x_json = json_encode($graph_x);
        $graph_y_json = json_encode($graph_y);

        echo "<div class='chart-container' id='chart-container-$i' style='display: none; opacity: 0; transition: opacity 0.5s ease;'>";
        echo "<canvas id='myChart_$i' class='chart' style='width: 100px; height: 100px;'></canvas>";
        echo "</div>";


        echo "<script>";
        echo "var x_var_$i = JSON.parse('" . $graph_x_json . "');";
        echo "var y_var_$i = JSON.parse('" . $graph_y_json . "');";

        echo "function generateColors(values) {";
        echo "var colors = [];";
        echo "for (var i = 0; i < values.length; i++) {";
        echo "var color;";
        echo "if (values[i] < 5) {";
        echo "color = 'rgba(209, 11, 4, 1)';";
        echo "} else if (values[i] >= 5 && values[i] < 7) {";
        echo "color = 'rgba(250, 138, 10, 1)';";
        echo "} else if (values[i] >= 7 && values[i] < 8) {";
        echo "color = 'rgba(5, 255, 76, 1)';";
        echo "} else if (values[i] >= 8 && values[i] <= 9) {";
        echo "color = 'rgba(5, 212, 252, 1)';";
        echo "} else if (values[i] > 9 && values[i] <= 10) {";
        echo "color = 'rgba(158, 5, 247, 1)';";
        echo "}";
        echo "colors.push(color);";
        echo "}";
        echo "return colors;";
        echo "}";

        echo "var ctx_$i = document.getElementById('myChart_$i').getContext('2d');";
        echo "var myChart_$i = new Chart(ctx_$i, {";
        echo "type: 'bar',";
        echo "data: {";
        echo "labels: x_var_$i,";
        echo "datasets: [{";
        echo "label: 'Number of Reviews',";
        echo "data: y_var_$i,";
        echo "backgroundColor: generateColors(x_var_$i).map(color => color.replace(', 1)', ', 0.3)')),";
        echo "borderColor: generateColors(x_var_$i),";
        echo "borderWidth: 1,";
        echo "hoverBackgroundColor: generateColors(x_var_$i).map(color => color.replace(', 1)', ', 0.6)'))";
        echo "}]";
        echo "},";
        echo "options: {";
        echo "scales: {";
        echo "yAxes: [{";
        echo "ticks: {";
        echo "beginAtZero: true,";
        echo "stepSize: 1";
        echo "}";
        echo "}],";
        echo "xAxes: [{";
        echo "scaleLabel: {";
        echo "display: true,";
        echo "labelString: 'Rating'";
        echo "}";
        echo "}]";
        echo "}";
        echo "}";
        echo "});";
        echo "</script>";
    }

    if (count($matched_venues) > 0) {

        echo "<div class='prata-regular map-title' style='text-align: center; align-items: center; justify-content: center;'>";
        echo "<header style='font-size: 25px; background-color: rgb(223, 216, 210); width: 350px; margin: 0 auto; margin-top: 15px; margin-bottom: 5px; border-radius: 10px;'>These are The Locations</header>";
        echo "<p style='font-size: 20px; margin-top: 10px;'>Please Click On The Locations</p>";
        echo "</div>";


        echo "<div class='map-container'>";
        echo "<div id='googleMap' style='width:600px; height:400px; border-radius: 10px; border: 1px solid grey; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);'></div>";

        echo "</div>";


        echo "<script>";


        echo "function myMap() {";
        echo "var initialCenter = new google.maps.LatLng(54.702354, -3.276575);";
        echo "var mapProp = {center: initialCenter, zoom: 5.1, draggable: false, zoomControl: false, scrollwheel: false, disableDoubleClickZoom: true, disableDefaultUI: true, keyboardShortcuts: false,};";
        echo "var map = new google.maps.Map(document.getElementById('googleMap'), mapProp);";


        foreach ($venue_longitude as $venue => $value) {
            $latitude = $venue_latitude[$venue];

            echo "var icon = {";
            echo "  url: 'data:image/svg+xml,%3Csvg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 640 512\"%3E%3C!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--%3E%3Cpath d=\"M344 24c0-13.3-10.7-24-24-24s-24 10.7-24 24V48H264c-13.3 0-24 10.7-24 24s10.7 24 24 24h32v46.4L183.3 210c-14.5 8.7-23.3 24.3-23.3 41.2V512h96V416c0-35.3 28.7-64 64-64s64 28.7 64 64v96h96V251.2c0-16.9-8.8-32.5-23.3-41.2L344 142.4V96h32c13.3 0 24-10.7 24-24s-10.7-24-24-24H344V24zM24.9 330.3C9.5 338.8 0 354.9 0 372.4V464c0 26.5 21.5 48 48 48h80V273.6L24.9 330.3zM592 512c26.5 0 48-21.5 48-48V372.4c0-17.5-9.5-33.6-24.9-42.1L512 273.6V512h80z\"/%3E%3C/svg%3E',";
            echo "  scaledSize: new google.maps.Size(26, 26),";
            echo "};";

            echo "var marker = new google.maps.Marker({";
            echo "  position: {lat: $latitude, lng: $value},";
            echo "  icon: icon,";
            echo "  animation: google.maps.Animation.BOUNCE,";
            echo "  map: map,";
            echo "  title: '$venue'";
            echo "});";

            echo "google.maps.event.addListener(marker, 'click', function() {";
            echo "map.setZoom(18);";
            echo "map.setCenter(new google.maps.LatLng($latitude, $value));";
            echo "window.setTimeout(function() {map.setZoom(6); map.setCenter(initialCenter), myMap()}, 1800);";
            echo "window.setTimeout(function() {window.open('https://www.google.com/maps?q=$latitude,$value', '_blank');}, 1790);";
            echo "});";
        }


        echo "}";
        echo "</script>";

    } else {
        if ($_SERVER['REQUEST_URI'] != "/f321932wedding/find.php" && count($matched_venues) == 0) {
            echo "<div class='prata-regular' id='none'><p>Sorry There Are No Available Venues That Fit Your Criteria</p></div>";
        }
    }

    ?>

    <style>
        #LOGO-footer {
            top: 15px;
            position: relative;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            z-index: 100;
            text-align: center;
            margin: 0 auto;
        }

        #LOGO-footer h1,
        #LOGO-footer h2,
        #LOGO-footer h3 {
            margin: 0;
            letter-spacing: 2px;
            display: block;
        }

        #email {
            text-decoration: none;
            color: black;
            transition: color 0.3s ease;
        }

        #email:hover {
            color: white;
        }

        #socials li {
            transition: color 0.5s ease;
        }

        #socials li:hover {
            color: white;
        }
    </style>

    <div class='prata-regular' style='width: 100%; height: 250px; background-color: rgb(223, 216, 210); margin-bottom: 15px; margin-top: 15px; '>
        <div id="LOGO-footer" style='z-index: 1;'>
            <h1 id="logo-text-1" style="font-size: 12px;">EST 2010</h1>
            <h2 id="logo-text-2" style="font-size: 28.5px;">UNITY</h2>
            <h3 id="logo-text-3" style="font-size: 22px;">WEDDING PLANNERS</h3>
        </div>

        <header style='text-align: center; font-size: 11px; margin-top: 35px;'>Let Us Take This Journey With You</header>

        <header style='text-align: center; font-size: 15px; margin-top: 20px;'>
            <a id='email' href='mailto:uw@unityweddings.co.uk'>uw@unityweddings.co.uk</a>
        </header>

        <ul id='socials' style="list-style-type: none; display: flex; justify-content: center; margin: 20px; font-size: 20px; color: rgb(212, 192, 176);">
            <li style='margin-right: 10px;'><a href='mailto:uw@unityweddings.co.uk' style='color: inherit;'><i class="fa-solid fa-envelope fa-bounce"></i></a></li>
            <li style='margin-right: 10px;'><a href='https://www.facebook.com' target="_blank" style='color: inherit; --fa-animation-direction:reverse'><i class="fa-brands fa-facebook-f fa-bounce"></i></a></li>
            <li style='margin-right: 10px;'><a href='https://www.instagram.com' target="_blank" style='color: inherit;'><i class="fa-brands fa-instagram fa-bounce"></i></a></li>
            <li style='margin-right: 10px;'><a href='https://www.twitter.com' target="_blank" style='color: inherit; --fa-animation-direction:reverse'><i class="fa-brands fa-twitter fa-bounce"></i></a></li>
            <li style='margin-right: 10px;'><a href='https://www.linkedin.com' target="_blank" style='color: inherit;'><i class="fa-brands fa-linkedin-in fa-bounce"></i></a></li>
        </ul>
    </div>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js'>
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyD9-3-U6uew2Q3chzFzR-KgihNuKOCzEcQ&callback=myMap'>
    </script>


    <script>
        function toggleMenu() {
            var menuIcon = document.querySelector('.menu-icon');
            var menuSymbol = document.querySelector('.material-symbols-outlined');
            var collapsedMenu = document.querySelector('.collapsed-menu');


            if (menuSymbol.textContent === 'menu') {
                menuSymbol.textContent = 'close';
                menuIcon.classList.add('rotate');
                collapsedMenu.style.display = 'block';
                setTimeout(function() {
                    collapsedMenu.classList.add('show');
                }, 40);
            } else {
                menuSymbol.textContent = 'menu';
                menuIcon.classList.remove('rotate');
                collapsedMenu.classList.remove('show');
                setTimeout(function() {
                    collapsedMenu.style.display = 'none';
                }, 200);
            }
        }

        window.addEventListener('scroll', function() {
            var navbar = document.getElementById('LOGO');
            var logoText1 = document.getElementById('logo-text-1');
            var logoText2 = document.getElementById('logo-text-2');
            var logoText3 = document.getElementById('logo-text-3');
            if (window.scrollY > 100) {
                navbar.classList.add('show-navbar');
                logoText1.style.fontSize = '8px';
                logoText2.style.fontSize = '30px';
                logoText3.style.fontSize = '20px';
                logoText1.style.marginTop = '-15px';
            } else {
                navbar.classList.remove('show-navbar');
                logoText1.style.fontSize = '12px';
                logoText2.style.fontSize = '45px';
                logoText3.style.fontSize = '32px';
                logoText1.style.marginTop = '0px';
            }
        });

        window.addEventListener('scroll', function() {
            var navbarSquare = document.querySelector('.navbar-square');
            if (window.scrollY > 100) {
                navbarSquare.style.display = 'block';
            } else {
                navbarSquare.style.display = 'none';
            }
        });


        const navbarSquare = document.querySelector('.navbar-square');

        window.addEventListener('scroll', function() {
            const scrollPosition = window.scrollY;

            if (scrollPosition > 100) {
                navbarSquare.style.height = '80px';
                navbarSquare.style.transition = 'height 0.7s ease';
            } else {
                navbarSquare.style.height = '130px';
                navbarSquare.style.transition = 'height 0.7s ease';
            }
        });

        window.addEventListener('scroll', function() {
            const navLinks = document.querySelectorAll('.nav ul li a');
            const Find = document.getElementById('Find');
            const scrollPosition = window.scrollY;

            if (scrollPosition > 100) {
                navLinks.forEach(link => link.style.opacity = 1);
                Find.style.opacity = 1;
            } else {
                navLinks.forEach(link => link.style.opacity = 0);
                Find.style.opacity = 0;
            }
        });
    </script>

</body>

</html>