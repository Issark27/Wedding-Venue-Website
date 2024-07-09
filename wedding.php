<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/dc74b5e8a7.js" crossorigin="anonymous"></script>
    <title>Wedding</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prata&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>

<style>
    .btn-custom {
        background-color: rgb(212, 192, 176);
        margin-top: 10px;
        transition: color 0.2s ease;
    }

    .btn-custom:hover {
        color: white;
        transition: color 0.2s ease;
    }

    .star {
        font-size: 20px;
    }

    #review:hover .star {
        color: yellow;
    }

    .lora-regular {
        font-family: "Lora", serif;
        font-optical-sizing: auto;
        font-weight: 400;
        font-style: normal;
    }

    .rectangle {
        width: 100%;
        height: 75px;
        background: linear-gradient(to bottom, rgba(223, 216, 210, 0.5), rgba(212, 193, 178, 0.5));
        background-size: 100% 800%;
        animation: wavyAnimation 15s ease infinite alternate;
        position: absolute;
        z-index: 0;
    }

    .rectangle::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: radial-gradient(circle at 50% 50%, transparent 20%, rgba(255, 255, 255, 0.2) 21%);
        background-size: 30px 30px;
        animation: wavyAnimation 40s linear infinite alternate-reverse;
    }

    @keyframes wavyAnimation {
        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }
    }
</style>

<body>

    <div class="menu-icon no-outline" id="menu-icon">
        <span class="material-symbols-outlined" onclick="toggleMenu()">menu</span>
    </div>

    <div class="prata-regular collapsed-menu" id="collapsed">
        <div id="items">
            <ul>
                <li><a href="wedding.php">Home</a></li>
                <li><a href="#ab">About</li>
                <li><a href="#ve">Venues</a></li>
                <li><a href="find.php">Find Your Venue</a></li>
            </ul>
        </div>
    </div>


    <nav class="prata-regular nav">
        <ul>
            <li><a href="wedding.php">Home</a></li>
            <li><a href="#ab">About</a></li>
            <li><a href="#ve">Venues</a></li>
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


    <div class="video-container">
        <video autoplay loop muted>
            <source src="video1.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>


    <div class="container-1">
        <div class="prata-regular" id="review">
            <header id="header">
                <p>"The Greatest Experience Of</p>
                <p>Our Lives"</p>
                <p class="lora-regular smaller-text">- John & Ellie</p>
                <i class="fa-solid fa-star fa-beat star"></i>
                <i class="fa-solid fa-star fa-beat star"></i>
                <i class="fa-solid fa-star fa-beat star"></i>
                <i class="fa-solid fa-star fa-beat star"></i>
                <i class="fa-solid fa-star fa-beat star"></i>
            </header>
        </div>

        <div class="prata-regular" id="review-text-1">
            <p style='font-size: 14.5px;'>At Unity Wedding Planners, we guarantee that our clients and their guests
                enjoy an unparalleled
                experience,
                meticulously crafted by our world-class staff . Our unwavering attention to detail enures the creation
                of
                the perfect atmosphere.</p>
        </div>
    </div>

    <div class="videos-container">
        <div class="rectangle"></div>

        <div class='lora-regular' style="position: relative; text-align: center;">
            <video autoplay loop muted class="video-size">
                <source src="video2.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <header style='position: absolute; top: -57px; left: 50%; transform: translateX(-50%); font-size: 80px; color: black; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);'>J&E</header>
        </div>
        <div class='lora-regular' style="position: relative; text-align: center;">
            <video autoplay loop muted class="video-size">
                <source src="video3.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <header style='position: absolute; bottom: -53px; left: 50%; transform: translateX(-50%); font-size: 80px; color: white; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);'>H&S</header>
        </div>
        <div class='lora-regular' style="position: relative; text-align: center;">
            <video autoplay loop muted class="video-size">
                <source src="video4.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <header style='position: absolute; top: -57px; left: 50%; transform: translateX(-50%); font-size: 80px; color: black; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);'>P&T</header>
        </div>
    </div>


    <div class="container-2" style='margin-bottom: 0px;'>
        <div class="prata-regular" id="review-text-2">
            <p style='font-size: 14.5px;'>Our teams works with the best suppliers in order to provide high quality
                events that
                give
                a well crafted experience. Our clients needs are our top priority, ensuring they are fully satisfied
                with
                the our service. Our reviews have given us a reputation for perfection.
            </p>
        </div>

        <div class="prata-regular" id="review">
            <header id="header">
                <p>"An Outstanding Service</p>
                <p>For Our Special Day"</p>
                <p class="lora-regular smaller-text">- Sarah & Rob</p>
                <i class="fa-solid fa-star fa-beat star"></i>
                <i class="fa-solid fa-star fa-beat star"></i>
                <i class="fa-solid fa-star fa-beat star"></i>
                <i class="fa-solid fa-star fa-beat star"></i>
                <i class="fa-solid fa-star-half-stroke fa-beat star"></i>
            </header>
        </div>
    </div>

    <style>
        .l-r {
            align-items: center;
            justify-content: center;
            margin: 15px;
        }

        #left {
            font-size: 12px;
            width: 45%;
        }

        #left p {
            margin: 15px;
        }

        #right {
            font-size: 12px;
            width: 45%;
        }

        #right p {
            margin: 15px;
        }


        @media only screen and (max-width: 600px) {
            .l-r {
                flex-direction: column;
            }

            #left,
            #right {
                width: 100%;
            }

        }
    </style>

    <img src='photo3.jpg' style='position: relative; width: 100%; margin-top: 0px;'>


    <div style='background-color: rgb(223, 216, 210); display: block; justify-content: center; margin-top: 25px; align-items: center; text-align: center; height: 50px;'>
        <header id='ab' class='prata-regular' style='font-size: 30px; line-height: 50px;'>About Us</header>
    </div>

    <div class='prata-regular l-r' style='display: flex;'>

        <div id='left'>
            <p>Unity Weddings is a premier wedding design and event coordination firm based in the UK. Collaborating
                with a diverse network of seasoned professionals, we specialize in curating bespoke and unforgettable
                celebrations and gatherings.</p>
            <p>Driven by the splendor of nature and the liberty it embodies, we understand the significance of
                exceptional cuisine, entertainment, and guest experiences. To this end, we offer a diverse selection of
                venues and catering services tailored to your preferences.</p>
            <p>We are inspired by the beauty of nature and the freedom it provides. We recognise how important
                incredible food, entertainment and your guests are to you which is why we provide a variety of venues
                and caterers.</p>
            <p>Backed by extensive expertise in the hospitality and entertainment sectors, our team instills confidence
                in our clients by seamlessly orchestrating every aspect of their event. We take pride in connecting our
                clients with our industry-leading partners.</p>
            <p>Recognizing the paramount importance of aesthetics in such significant affairs, our team meticulously
                crafts designs that reflect your unique essence. With a commitment to refined and sophisticated
                aesthetics, we ensure your event is a true reflection of your style and personality.</p>
        </div>

        <div id='right'>
            <p>Building on our foundation of excellence, Unity Weddings continues to set the standard for exceptional
                event coordination and design. Our reputation for delivering unparalleled service and unforgettable
                experiences has made us the premier choice for discerning clients throughout the UK.</p>
            <p>As a testament to our unwavering commitment to quality, we take pride in our ability to stay abreast of
                the latest trends and innovations in the industry. From cutting-edge decor concepts to innovative
                entertainment options, we infuse each event with creativity and flair, ensuring that it stands out as a
                true reflection of our client's vision and style.</p>
            <p>With a wealth of industry knowledge and a passion for exceeding expectations, our team goes above and
                beyond to ensure that every aspect of your event is executed flawlessly. From the moment you entrust us
                with your vision, we work tirelessly to bring it to life, leaving no detail overlooked and no stone
                unturned in our quest to create magical moments that will be cherished for a lifetime.</p>
            <p>At Unity Weddings, we understand that your event is more than just a celebration – it's a reflection of
                your love story, your values, and your dreams for the future. That's why we approach each project with
                the utmost care and dedication, treating it as if it were our own and ensuring that every element has
                meaning.</p>
        </div>
    </div>

    <style>
        #container-3-container {
            background-color: rgba(223, 216, 210, 0.85);
            border-radius: 5px;
            padding-top: 2px;
            padding-bottom: 2px;
            margin-left: 5px;
            margin-right: 5px;
        }

        #container-3 {
            border-radius: 10px;
            display: flex;
            margin-top: 10px;
            align-items: center;
            justify-content: center;
        }

        .img-wrapper {
            display: flex;
            width: 100%;
        }

        #rayyan-container {
            width: 50%;
            text-align: center;
            align-items: center;
            justify-content: center;
        }

        #rayyan-container img {
            width: 90%;
            height: auto;
            border: 1px solid rgba(255, 255, 255, 0.5);
            border-radius: 5px;
            margin: 10px;
            box-shadow: 4px 4px 8px rgba(0, 0, 0, 0.5);
        }

        #text-container {
            align-items: center;
            justify-content: center;
            flex: 1;
        }

        #rayyan-text {
            margin-top: 12%;
            width: 50%;
            text-align: center;
            align-items: center;
            justify-content: center;
            flex: 1;
        }

        #rayyan-text p {
            font-size: 30px;
            margin: 10px;
        }

        #rayyan-text hr {
            margin-right: 10px;
        }

        @media only screen and (max-width: 800px) {
            #rayyan-container img {
                width: 95%;
                max-width: 300px;
                height: auto;
                border-radius: 5px;
                margin: 3px;
            }

            #rayyan-text p {
                font-size: 20px;
            }
        }

        #rayyan-information {
            width: calm(100% - 30px);
            margin: 15px;
        }

        #rayyan-information p {
            font-size: 12px;
        }
    </style>

    <div id='container-3-container' class='prata-regular'>

        <div id='container-3'>
            <div class='img-wrapper'>
                <div id='rayyan-container'>
                    <img src='rayyan.png' alt='rayyan'>
                </div>

                <div id='rayyan-text' style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);">
                    <p>Our Founder</p>
                    <hr>
                    <p>Rayyan Rizwan</p>
                </div>
            </div>

        </div>

        <div class="text-center">
            <button class="btn btn-custom text-center" type="button" data-bs-toggle="collapse" data-bs-target="#rayyan-information" aria-expanded="false" aria-controls="rayyan-information">
                <header>Click For More Information</header>
            </button>
            <div id='rayyan-information' class='collapse'>
                <div class="card card-body">
                    <p>My passion for wedding design began when I was 18 on one of my shifts in a catering tent. It was quite
                        difficult however the atmosphere was unmatched and I was pulled in right then and there. It became an
                        addiction almost. The process of building an entire venue from nothing completely thrilled me.</p>
                    <p>Growing up in Qatar, the wedding business was very big with large events taking place almost every other
                        week. The diversity in every wedding helped spark my interets in giving each event its own personality.
                        It then lead me to travel the world to experience a variety of weddings from different cultures and
                        religions.</p>
                    <p>Planning weddings and events are my life, the joy I get from taking charge of such an important aspect of
                        a couples life is the reason for my continous success. The sense of enjoyment and fulfillment from
                        creating something so special from scratch has continued to inspire my ideas. I am excited to get to
                        meet you and your partner and I hope we can create new memories together.</p>
                </div>
            </div>
        </div>

    </div>


    <img src='photo2.jpg' style='position: relative; width: 100%; margin-top: 10px;'>


    <div id='ve' style='background-color: rgb(223, 216, 210); display: block; justify-content: center; margin-top: 25px; margin-bottom: 25px; align-items: center; text-align: center; height: 50px;'>
        <header class='prata-regular' style='font-size: 30px; line-height: 50px;'>Our Venues</header>
    </div>


    <div style='display: flex; justify-content: center; opacity: 0.6;'>

        <?php
        $venues = array('Hilltop' => 'Hilltop Mansion', 'Ashby' => 'Ashby Castle', 'Central' => 'Central Plaza');

        foreach ($venues as $v => $name) {
            echo "<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js' integrity='sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz' crossorigin='anonymous'></script>";

            echo "<div id='venues-carousel-$v' class='carousel slide carousel-fade' data-bs-interval='2500' data-bs-ride='carousel' style='width: 300px; height: 425px; margin: 0;'>";

            echo "<div class='prata-regular overlay' style='font-size: 30px; z-index: 5; position: absolute; top: 40%; left: 50%; transform: translateX(-50%); color:rgb(209, 209, 207); text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);'>";
            echo "<header style='text-align: center'>$name</header>";
            echo "</div>";

            echo "<div class='carousel-indicators' style='display: none;'>";
            echo "<button type='button' data-bs-target='#venues-carousel-$v' data-bs-slide-to='0' class='active'></button>";
            echo "<button type='button' data-bs-target='#venues-carousel-$v' data-bs-slide-to='1'></button>";
            echo "</div>";

            echo "<div class='carousel-inner'>";

            echo "<div class='carousel-item active' style='position: relative; width: 300px; height: 425px;'>";
            echo "<img src='$v-1.jpg' class='d-block w-100' style='width: 300px; height: 425px; border-radius: 5px;'>";

            echo "</div>";

            echo "<div class='carousel-item' style='width: 300px; height: 425px'>";
            echo "<img src='$v-2.jpg' class='d-block w-100' style='width: 300px; height: 425px; border-radius: 5px;'>";
            echo "</div>";

            echo "</div>";

            echo "</div>";
        }
        ?>

    </div>

    <div style='display: flex; justify-content: center;'>
        <div id='venues-carousel-1' class='carousel slide carousel-fade' data-bs-ride='carousel' data-bs-interval='2500' style='width: 300px; height: 425px; margin: 0; opacity: 0.6'>
            <div class='prata-regular overlay' style='font-size: 30px; z-index: 5; position: absolute; top: 35%; left: 50%; transform: translateX(-50%); right: 0; color:rgb(209, 209, 207); text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);'>
                <header style='text-align: center'>Sky Center Complex</header>
            </div>
            <div class='carousel-indicators' style='display: none;'>
                <button type='button' data-bs-target='#venues-carousel-1' data-bs-slide-to='0' class='active' style='background-color: rgb(237, 250, 62); border-radius: 15px; border: none;'></button>
                <button type='button' data-bs-target='#venues-carousel-1' data-bs-slide-to='1' style='background-color: rgb(245, 61, 211); border-radius: 15px; border: none;'></button>
            </div>
            <div class='carousel-inner'>
                <div class='carousel-item active' style='position: relative; width: 300px; height: 425px;'>
                    <img src='Sky-1.jpg' class='d-block w-100' style='width: 300px; height: 425px; border-radius: 5px;'>
                </div>";
                <div class='carousel-item' style='width: 300px; height: 425px'>
                    <img src='Sky-2.jpg' class='d-block w-100' style='width: 300px; height: 425px; border-radius: 5px;'>
                </div>
            </div>
        </div>

        <style>
            #click-div img {
                transition: opacity 0.7s ease;
            }

            #click-div:hover img {
                opacity: 0.3;
                transition: opacity 0.7s ease;
            }

            #click {
                font-size: 28px;
            }
        </style>

        <div id='click-div' class='prata-regular' style='position: relative; width: 300px; min-width: 300px; height: 425px; display: flex; margin: 0; align-items: center; justify-content: center; text-align: center;'>
            <img src='bw.jpg' style='width: 95%; height: 96.5%;'>
            <header id='click' style='position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);'>
                <a href=find.php style='text-decoration: none; color: white; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);'>Click To Discover All That We Offer</a>
            </header>
        </div>

        <div id='venues-carousel-2' class='carousel slide carousel-fade' data-bs-interval="2500" data-bs-ride='carousel' style='width: 300px; height: 425px; margin: 0; opacity: 0.6'>
            <div class='prata-regular overlay' style='font-size: 30px; z-index: 5; position: absolute; top: 40%; left: 50%; transform: translateX(-50%); color:rgb(209, 209, 207); text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);'>
                <header style='text-align: center'>Pacific Towers Hotel</header>
            </div>
            <div class='carousel-indicators' style='display: none;'>
                <button type='button' data-bs-target='#venues-carousel-2' data-bs-slide-to='0' class='active' style='background-color: rgb(237, 250, 62); border-radius: 15px; border: none;'></button>
                <button type='button' data-bs-target='#venues-carousel-2' data-bs-slide-to='1' style='background-color: rgb(245, 61, 211); border-radius: 15px; border: none;'></button>
            </div>
            <div class='carousel-inner'>
                <div class='carousel-item active' style='position: relative; width: 300px; height: 425px;'>
                    <img src='Pacific-1.jpg' class='d-block w-100' style='width: 300px; height: 425px; border-radius: 5px;'>
                </div>";
                <div class='carousel-item' style='width: 300px; height: 425px'>
                    <img src='Pacific-2.jpg' class='d-block w-100' style='width: 300px; height: 425px; border-radius: 5px;'>
                </div>
            </div>
        </div>

    </div>

    <div style='display: flex; justify-content: center; opacity: 0.6'>

        <?php
        $venues = array('Fawlty' => 'Fawlty Towers', 'Haslegrave' => 'Haslegrave Hotel', 'Southwestern' => 'Southwestern Estate');

        foreach ($venues as $v => $name) {
            echo "<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js' integrity='sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz' crossorigin='anonymous'></script>";

            echo "<div id='venues-carousel-$v' class='carousel slide carousel-fade' data-bs-interval='2500' data-bs-ride='carousel' style='width: 300px; height: 425px; margin: 0; margin-bottom: 15px;'>";

            echo "<div class='prata-regular overlay' style='font-size: 30px; z-index: 5; position: absolute; top: 40%; left: 50%; transform: translateX(-50%); color:rgb(209, 209, 207); text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);'>";
            echo "<header style='text-align: center'>$name</header>";
            echo "</div>";

            echo "<div class='carousel-indicators' style='display: none'>";
            echo "<button type='button' data-bs-target='#venues-carousel-$v' data-bs-slide-to='0' class='active' style='background-color: rgb(237, 250, 62); border-radius: 15px; border: none;'></button>";
            echo "<button type='button' data-bs-target='#venues-carousel-$v' data-bs-slide-to='1' style='background-color: rgb(245, 61, 211); border-radius: 15px; border: none;'></button>";
            echo "</div>";

            echo "<div class='carousel-inner'>";

            echo "<div class='carousel-item active' style='position: relative; width: 300px; height: 425px;'>";
            echo "<img src='$v-1.jpg' class='d-block w-100' style='width: 300px; height: 425px; border-radius: 5px;'>";

            echo "</div>";

            echo "<div class='carousel-item' style='width: 300px; height: 425px'>";
            echo "<img src='$v-2.jpg' class='d-block w-100' style='width: 300px; height: 425px; border-radius: 5px;'>";
            echo "</div>";

            echo "</div>";

            echo "</div>";
        }
        ?>

    </div>

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

    <div class='prata-regular' style='width: 100%; height: 250px; background-color: rgb(223, 216, 210); margin-bottom: 15px;'>
        <div id="LOGO-footer" style='z-index:1;'>
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



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuLinks = document.querySelectorAll('.collapsed-menu a');

            menuLinks.forEach(function(link) {
                link.addEventListener('click', function(event) {
                    if (link.getAttribute('href') !== 'find.php') {
                        event.preventDefault();

                        const targetId = link.getAttribute('href').substring(1);

                        const offset = 75;

                        const targetElement = document.getElementById(targetId);
                        const targetPosition = targetElement.offsetTop;

                        window.scroll({
                            top: targetPosition - offset,
                            behavior: 'smooth'
                        });
                    }
                });
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const menuLinks = document.querySelectorAll('.nav a');

            menuLinks.forEach(function(link) {
                link.addEventListener('click', function(event) {
                    if (link.getAttribute('href') !== 'find.php') {
                        event.preventDefault();

                        const targetId = link.getAttribute('href').substring(1);

                        const offset = 75;

                        const targetElement = document.getElementById(targetId);
                        const targetPosition = targetElement.offsetTop;

                        window.scroll({
                            top: targetPosition - offset,
                            behavior: 'smooth'
                        });
                    }
                });
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const menuLinks = document.querySelectorAll('.collapsed-menu a');

            menuLinks.forEach(function(link) {
                link.addEventListener('click', function(event) {
                    if (link.getAttribute('href') !== 'find.php') {
                        event.preventDefault();

                        const targetId = link.getAttribute('href').substring(2);

                        const offset = 75;

                        const targetElement = document.getElementById(targetId);
                        const targetPosition = targetElement.offsetTop;

                        window.scroll({
                            top: targetPosition - offset,
                            behavior: 'smooth'
                        });
                    }
                });
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const menuLinks = document.querySelectorAll('.nav a');

            menuLinks.forEach(function(link) {
                link.addEventListener('click', function(event) {
                    if (link.getAttribute('href') !== 'find.php') {
                        event.preventDefault();

                        const targetId = link.getAttribute('href').substring(2);

                        const offset = 75;

                        const targetElement = document.getElementById(targetId);
                        const targetPosition = targetElement.offsetTop;

                        window.scroll({
                            top: targetPosition - offset,
                            behavior: 'smooth'
                        });
                    }
                });
            });
        });


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