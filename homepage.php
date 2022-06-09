<?php
include "models/Room.php";
session_start();
$_SESSION['id']=1;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Grand Hotel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="main.css">
    <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
    <link rel="icon" href="images/logo.png" type="image/png">
</head>

<body>

    <!-- header -->
    <header class="header" id="header">
        <div class="head-top">
            <div class="site-name">
                <img src="images/logo.png" style="width:30erm; height:30erm">
            </div>
            <div class="site-nav">
                <span id="nav-btn">MENU <i class="fas fa-bars"></i></span>
            </div>
        </header>
        <!-- end of header -->

        <!-- side navbar -->

        
        <div class = "sidenav" id = "sidenav">
           
            
            <span class = "cancel-btn" id = "cancel-btn">
                <i class = "fas fa-times"></i>
            </span>
            <br>
            <br>
            
        <?php
            
            if (isset($_SESSION["id"]))
            {
                ?>
                <div class = "w-50 h-50 rounded" style="align-content: center;">
            <img  class="img-fluid" src="images/hotellogo.jpg" alt="profile" >
            </div>
                <?php
            }
         
           
            
?>
            <ul class = "navbar">
                <li><a href = "#header">Home</a></li>
                <li><a href = "#services">Services</a></li>
                <li><a href = "#rooms">Rooms</a></li>
                <li><a href = "#customers">Customers</a></li>
                <li><a href = "#customers">Reservation in progress</a></li>
                <li><a href = "#customers">Done reservation</a></li>
            </ul>
            
        <?php
            if (isset($_SESSION["id"]))

            {
                ?>
               <button class = "btn log-in">log out</button>
                <?php

            }
            else {
                ?>
                <button class = "btn log-in">log in</button>
                <button class = "btn log-in">signup</button>
                 <?php

            }
            
?>
            
        </div>

        <div class="head-bottom flex">
            <h2 style="font-family: Dosis;">NICE AND COMFORTABLE PLACE TO STAY</h2>
            <p>Grand Hotel is a quiet, comfortable hotel located in Hurghada. Hurghada GRND Hotel is one of the biggest Hotels in Hurghada. It has been operating in
                Hurghada since 1910. It has several restaurants and activities. All rooms have private bathrooms with hot water. </p>
            <button type="button" class="head-btn">GET STARTED</button>
        </div>
    </header>
    <!-- end of header -->

    <!-- side navbar -->
    <div class="sidenav" id="sidenav">
        <span class="cancel-btn" id="cancel-btn">
            <i class="fas fa-times"></i>
        </span>
        <br>
        <br>
        <div class="w-50 h-50" style="align-content: center;">
            <img class="img-fluid rounded" src="images/bestprofilepic.jpg" alt="profile">
        </div>
        <ul class="navbar">
            <li><a href="#header">Home</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#rooms">Rooms</a></li>
            <li><a href="#customers">Customers</a></li>
        </ul>

        <button class="btn log-in">Log-in</button>
        <button class="btn log-in">Sign-up</button>

    </div>
    <!-- end of side navbar -->

    <!-- fullscreen modal -->
    <div id="modal"></div>
    <!-- end of fullscreen modal -->

    <!-- body content  -->
    <section class="services sec-width" id="services">
        <div class="title">
            <h2>services</h2>
        </div>
        <div class="services-container">
            <!-- single service -->
            <article class="service">
                <div class="service-icon">
                    <span>
                        <i class="fas fa-utensils"></i>
                    </span>
                </div>
                <div class="service-content">
                    <h2>Food Service/ Food Runner</h2>
                    <p>Full-service restaurants : fine dining restaurants, family restaurants, ethnic restaurants, casual restaurants. Catering & banqueting : catering companies, conference centers, wedding venues, festival food coordinators. Drinking establishments : bars, pubs, nightclubs, cabarets.</p>
                    <button type="button" class="btn">Know More</button>
                </div>
            </article>
            <!-- end of single service -->
            <!-- single service -->
            <article class="service">
                <div class="service-icon">
                    <span>
                        <i class="fas fa-swimming-pool"></i>
                    </span>
                </div>
                <div class="service-content">
                    <h2>Refreshment</h2>
                    <p>From August the 1st, the Grand Hotel Baglioni becomes even more welcoming thanks to the supply of hot and fresh drinks included in all room categories.
                        In fact, our 192 rooms will be provided with a kettle and a selection of tea and coffee that our guests can prepare themselves whenever they wish, during the day or at night. But that's not all!</p>
                    <button type="button" class="btn">Know More</button>

                </div>
            </article>
            <!-- end of single service -->
            <!-- single service -->
            <article class="service">
                <div class="service-icon">
                    <span>
                        <i class="fas fa-broom"></i>
                    </span>
                </div>
                <div class="service-content">
                    <h2>Housekeeping</h2>
                    <p>The best hotel we have ever stayed at. All staff is very friendly and helpful. The housekeeper, Munjurul was very friendly and always made sure everything was good and that we had enough of everything. He was awesome. Will definitely stay here again</p>
                    <button type="button" class="btn">Know More</button>
                </div>
            </article>
            <!-- end of single service -->
            <!-- single service -->
            <article class="service">
                <div class="service-icon">
                    <span>
                        <i class="fas fa-door-closed"></i>
                    </span>
                </div>
                <div class="service-content">
                    <h2>Room Security</h2>
                    <p>For the new Davenport Grand Hotel, hotel management wanted to ensure the safety and security of its guests, employees, and visitors while helping to prevent theft and other loss. It was also important to be able to capture images of the vehicles that come and go from the public garage used by hotel guests. This would enable the hotel to better deal with potential vehicle damage claims, which is a common issue in the hospitality industry</p>
                    <button type="button" class="btn">Know More</button>
                </div>
            </article>
            <!-- end of single service -->
        </div>
    </section>

    <!-- <div class = "book">
            <form class = "book-form">
                <div class = "form-item">
                    <label for = "checkin-date">Check In Date: </label>
                    <input type = "date" id = "chekin-date">
                </div>
                <div class = "form-item">
                    <label for = "checkout-date">Check Out Date: </label>
                    <input type = "date" id = "chekout-date">
                </div>
                <div class = "form-item">
                    <label for = "adult">Adults: </label>
                    <input type = "number" min = "1" value = "1" id = "adult">
                </div>
                <div class = "form-item">
                    <label for = "children">Children: </label>
                    <input type = "number" min = "1" value = "1" id = "children">
                </div>
                <div class = "form-item">
                    <label for = "rooms">Rooms: </label>
                    <input type = "number" min = "1" value = "1" id = "rooms">
                </div>
                <div class = "form-item">
                    <input type = "submit" class = "btn" value = "Book Now">
                </div>
            </form>
        </div> -->

    <section class="rooms sec-width" id="rooms">
        <div class="title">
            <h2>rooms</h2>
        </div>


        <div class="rooms-container">
            <!-- single room -->
            <?php

            $rooms = Room::all();
            
            for ($counter=0;$counter<4;$counter++) {
            ?>
                <article class="room">
                    <div class="room-image">
                        <img src="images/rrom1.jpg" alt="room image">
                    </div>
                    <div class="room-text">
                        <h3><?= $rooms["name"]; ?></h3>
                        <ul>
                            <li>
                                <i class="fas fa-arrow-alt-circle-right"></i>
                                Lorem ipsum dolor sit amet.
                            </li>
                            <li>
                                <i class="fas fa-arrow-alt-circle-right"></i>
                                Lorem ipsum dolor sit amet.
                            </li>
                            <li>
                                <i class="fas fa-arrow-alt-circle-right"></i>
                                Lorem ipsum dolor sit amet.
                            </li>
                        </ul>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus exercitationem repellendus maxime ullam tempore architecto provident unde expedita quam beatae, dolore eligendi molestias sint tenetur incidunt voluptas. Unde corporis qui iusto vitae. Aut nesciunt id iste, cum esse commodi nemo?</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla corporis quasi officiis cumque, fugiat nostrum sunt, tempora animi dicta laborum beatae ratione doloremque. Delectus odio sit eius labore, atque quo?</p>
                        <p class="rate">
                            <span><?= $rooms["price"]; ?></span> Per Night
                        </p>
                    </div>
                </article>

            <?php
            }
           
            ?>
        </div>
    </section>


    <section class="customers" id="customers">
        <div class="sec-width">
            <div class="title">
                <h2>customers</h2>
            </div>
            <div class="customers-container">
                <!-- single customer -->
                <div class="customer">
                    <div class="rating">
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="far fa-star"></i></span>
                    </div>
                    <h3>We Loved it</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat beatae veritatis provident eveniet praesentium veniam cum iusto distinctio esse, vero est autem, eius optio cupiditate?</p>
                    <img src="img/cus1.jpg" alt="customer image">
                    <span>Customer Name, Country</span>
                </div>
                <!-- end of single customer -->
                <!-- single customer -->
                <div class="customer">
                    <div class="rating">
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                    </div>
                    <h3>Comfortable Living</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat beatae veritatis provident eveniet praesentium veniam cum iusto distinctio esse, vero est autem, eius optio cupiditate?</p>
                    <img src="img/cus2.jpg" alt="customer image">
                    <span>Customer Name, Country</span>
                </div>
                <!-- end of single customer -->
                <!-- single customer -->
                <div class="customer">
                    <div class="rating">
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="far fa-star"></i></span>
                    </div>
                    <h3>Nice Place</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat beatae veritatis provident eveniet praesentium veniam cum iusto distinctio esse, vero est autem, eius optio cupiditate?</p>
                    <img src="img/cus1.jpg" alt="customer image">
                    <span>Customer Name, Country</span>
                </div>
                <!-- end of single customer -->
            </div>
        </div>
    </section>
    <!-- end of body content -->

    <!-- footer -->
    <footer class="footer">
        <div class="footer-container">
            <div>
                <h2>About Us </h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque sapiente mollitia doloribus provident? Eos quisquam aliquid vel dolorum, impedit culpa.</p>
                <ul class="social-icons">
                    <li class="flex">
                        <i class="fa fa-twitter fa-2x"></i>
                    </li>
                    <li class="flex">
                        <i class="fa fa-facebook fa-2x"></i>
                    </li>
                    <li class="flex">
                        <i class="fa fa-instagram fa-2x"></i>
                    </li>
                </ul>
            </div>

            <div>
                <h2>Useful Links</h2>
                <a href="#">Blog</a>
                <a href="#">Rooms</a>
                <a href="#">Subscription</a>
                <a href="#">Gift Card</a>
            </div>

            <div>
                <h2>Privacy</h2>
                <a href="#">Career</a>
                <a href="#">About Us</a>
                <a href="#">Contact Us</a>
                <a href="#">Services</a>
            </div>

            <div>
                <h2>Have A Question</h2>
                <div class="contact-item">
                    <span>
                        <i class="fas fa-map-marker-alt"></i>
                    </span>
                    <span>
                        203 Fake St.Mountain View, San Francisco, California, USA
                    </span>
                </div>
                <div class="contact-item">
                    <span>
                        <i class="fas fa-phone-alt"></i>
                    </span>
                    <span>
                        <i class="fas fa-phone-alt">+84545 37534 48</i>
                    </span>
                </div>
                <div class="contact-item">
                    <span>
                        <i class="fas fa-envelope"></i>
                    </span>
                    <span>
                        info@domain.com
                    </span>
                </div>
            </div>
        </div>
    </footer>
    <!-- end of footer -->

    <script src="script.js"></script>

</body>

</html>