<?php
session_start();
// !!!!!!!!!!
// DO NOT ADD ANY CODE ABOVE. THE SESSION MUST START
// !!!!!!!!!!
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Clubs</title>
    <!-- External CSS + JS -->
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="script.js"></script>

    <!-- WAVES FILES BELOW -->

    <link rel="stylesheet" type="text/css" href="waves.min.css"/>
    <script type="text/javascript" src="waves.min.js"></script>

    <!-- WAVES FILES END   -->
    <!-- JQUERY IMPORT -->
    <!-- VERY IMPORTANT -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- JQUERY IMPORT -->
    <!-- VERY IMPORTANT -->
</head>
<body>
    <div class="HEADER_DIV" id="div_header_slot">
        <!-- DYNAMIC HEADER CODE HERE -->
        <?php echo "<p>Welcome, ".$_SESSION["user_fname"]."</p>";?>
    </div>

    <div class="MAIN_DIV" id="div_main_slot">
        <div class="MAIN_DIV" id="div_main_slot_left">
            <div class="MAIN_DIV" id="div_main_slot_left_filter">
                <!-- FILTER BUTTONS START -->
                <div class="filter_buttons_main_container">
                    <div class="filter_buttons_row">
                        <a href="" class="filter_buttons_btn">Filter 1</a>
                        <a href="" class="filter_buttons_btn">Filter 2</a>
                        <a href="" class="filter_buttons_btn">Filter 3</a>
                        <a href="" class="filter_buttons_btn">Filter 4</a>
                        <!-- Attach Waves to these btns -->
                        <script>
                            //Attach waves
                            Waves.attach('.filter_buttons_btn');
                            //Ripple on hover
                            $('.filter_buttons_btn').mouseenter(function() {
                                Waves.ripple(this, {wait: null});
                            }).mouseleave(function() {
                                Waves.calm(this);
                            });
                            //Init
                            Waves.init();
                        </script>
                  </div>
                </div>
                <!-- FILTER BUTTONS END -->
            </div>
            <!-- Clubs code below -->
            <div class="MAIN_DIV" id="div_main_slot_left_clubs">
                <!-- Added code from container file 28/11/2016 -->
                <!-- CLUBS CONTAINER START -->
                <div class="clubs_container_container_d">
                    <ul class="clubs_container_ul">
                        <li class="clubs_container_li">
                            <!-- DO NOT CHANGE THE STRUCTURE BELOW -->
                            <!-- /\/\/\/\/\/\/\/\/\/\ -->
                            <!-- Description section -->
                            <div class="clubs_container_li_main_d">
                                <div class="clubs_container_int_heading_top">
                                    <p class="clubs_container_int_heading_par">CLUB NAME</p>
                                </div>
                                <div class="clubs_container_int_d_top">
                                    <p class="clubs_container_int_d_par">
                                        This is a clubs description. 100 words limit.
                                    </p>
                                </div>
                            </div>
                            <!-- Image section -->
                            <div class="clubs_container_li_left_d">
                                <img class="clubs_container_img_lg" src="https://iprodev.com/wp-content/uploads/nodejs.png"/>
                            </div>
                            <!-- Button Section -->
                            <div class="clubs_container_int_d_btn">
                                <a href="" class="clubs_container_btn">Join Club</a>
                            </div>
                            <!-- /\/\/\/\/\/\/\/\/\/\ -->
                            <!-- DO NOT CHANGE THE STRUCTURE ABOVE -->
                        </li>
                        <li class="clubs_container_li">
                            <!-- DO NOT CHANGE THE STRUCTURE BELOW -->
                            <!-- /\/\/\/\/\/\/\/\/\/\ -->
                            <!-- Description section -->
                            <div class="clubs_container_li_main_d">
                                <div class="clubs_container_int_heading_top">
                                    <p class="clubs_container_int_heading_par">CLUB NAME</p>
                                </div>
                                <div class="clubs_container_int_d_top">
                                    <p class="clubs_container_int_d_par">
                                        This is a clubs description. 100 words limit.
                                    </p>
                                </div>
                            </div>
                            <!-- Image section -->
                            <div class="clubs_container_li_left_d">
                                <img class="clubs_container_img_lg" src="https://iprodev.com/wp-content/uploads/nodejs.png"/>
                            </div>
                            <!-- Button Section -->
                            <div class="clubs_container_int_d_btn">
                                <a href="" class="clubs_container_btn">Join Club</a>
                            </div>
                            <!-- /\/\/\/\/\/\/\/\/\/\ -->
                            <!-- DO NOT CHANGE THE STRUCTURE ABOVE -->
                        </li>
                        <li class="clubs_container_li">
                            <!-- DO NOT CHANGE THE STRUCTURE BELOW -->
                            <!-- /\/\/\/\/\/\/\/\/\/\ -->
                            <!-- Description section -->
                            <div class="clubs_container_li_main_d">
                                <div class="clubs_container_int_heading_top">
                                    <p class="clubs_container_int_heading_par">CLUB NAME</p>
                                </div>
                                <div class="clubs_container_int_d_top">
                                    <p class="clubs_container_int_d_par">
                                        This is a clubs description. 100 words limit.
                                    </p>
                                </div>
                            </div>
                            <!-- Image section -->
                            <div class="clubs_container_li_left_d">
                                <img class="clubs_container_img_lg" src="https://iprodev.com/wp-content/uploads/nodejs.png"/>
                            </div>
                            <!-- Button Section -->
                            <div class="clubs_container_int_d_btn">
                                <a href="" class="clubs_container_btn">Join Club</a>
                            </div>
                            <!-- /\/\/\/\/\/\/\/\/\/\ -->
                            <!-- DO NOT CHANGE THE STRUCTURE ABOVE -->
                        </li>
                        <li class="clubs_container_li">
                            <!-- DO NOT CHANGE THE STRUCTURE BELOW -->
                            <!-- /\/\/\/\/\/\/\/\/\/\ -->
                            <!-- Description section -->
                            <div class="clubs_container_li_main_d">
                                <div class="clubs_container_int_heading_top">
                                    <p class="clubs_container_int_heading_par">CLUB NAME</p>
                                </div>
                                <div class="clubs_container_int_d_top">
                                    <p class="clubs_container_int_d_par">
                                        This is a clubs description. 100 words limit.
                                    </p>
                                </div>
                            </div>
                            <!-- Image section -->
                            <div class="clubs_container_li_left_d">
                                <img class="clubs_container_img_lg" src="https://iprodev.com/wp-content/uploads/nodejs.png"/>
                            </div>
                            <!-- Button Section -->
                            <div class="clubs_container_int_d_btn">
                                <a href="" class="clubs_container_btn">Join Club</a>
                            </div>
                            <!-- /\/\/\/\/\/\/\/\/\/\ -->
                            <!-- DO NOT CHANGE THE STRUCTURE ABOVE -->
                        </li>
                        <li class="clubs_container_li">
                            <!-- DO NOT CHANGE THE STRUCTURE BELOW -->
                            <!-- /\/\/\/\/\/\/\/\/\/\ -->
                            <!-- Description section -->
                            <div class="clubs_container_li_main_d">
                                <div class="clubs_container_int_heading_top">
                                    <p class="clubs_container_int_heading_par">CLUB NAME</p>
                                </div>
                                <div class="clubs_container_int_d_top">
                                    <p class="clubs_container_int_d_par">
                                        This is a clubs description. 100 words limit.
                                    </p>
                                </div>
                            </div>
                            <!-- Image section -->
                            <div class="clubs_container_li_left_d">
                                <img class="clubs_container_img_lg" src="https://iprodev.com/wp-content/uploads/nodejs.png"/>
                            </div>
                            <!-- Button Section -->
                            <div class="clubs_container_int_d_btn">
                                <a href="" class="clubs_container_btn">Join Club</a>
                            </div>
                            <!-- /\/\/\/\/\/\/\/\/\/\ -->
                            <!-- DO NOT CHANGE THE STRUCTURE ABOVE -->
                        </li>
                        <li class="clubs_container_li">
                            <!-- DO NOT CHANGE THE STRUCTURE BELOW -->
                            <!-- /\/\/\/\/\/\/\/\/\/\ -->
                            <!-- Description section -->
                            <div class="clubs_container_li_main_d">
                                <div class="clubs_container_int_heading_top">
                                    <p class="clubs_container_int_heading_par">CLUB NAME</p>
                                </div>
                                <div class="clubs_container_int_d_top">
                                    <p class="clubs_container_int_d_par">
                                        This is a clubs description. 100 words limit.
                                    </p>
                                </div>
                            </div>
                            <!-- Image section -->
                            <div class="clubs_container_li_left_d">
                                <img class="clubs_container_img_lg" src="https://iprodev.com/wp-content/uploads/nodejs.png"/>
                            </div>
                            <!-- Button Section -->
                            <div class="clubs_container_int_d_btn">
                                <a href="" class="clubs_container_btn">Join Club</a>
                            </div>
                            <!-- /\/\/\/\/\/\/\/\/\/\ -->
                            <!-- DO NOT CHANGE THE STRUCTURE ABOVE -->
                        </li>
                    </ul>
                </div>
                <!-- Attach Waves to these btns -->
                <script>
                    //Attach waves
                    Waves.attach('.clubs_container_btn');
                    //Ripple on hover
                    $('.clubs_container_btn').mouseenter(function() {
                        Waves.ripple(this, {wait: null});
                    }).mouseleave(function() {
                        Waves.calm(this);
                    });
                    //Init
                    Waves.init();
                </script>
                <!-- CLUBS CONTAINER END -->
            </div>
        </div>
        <!--
            LEFT SECTION ABOVE
            \/\/\/\/\/\/\/\/\/
             :: :: :: :: :: ::
            /\/\/\/\/\/\/\/\/\
            RIGHT SECTION BELOW
        -->
        <div class="MAIN_DIV" id="div_main_slot_right">
            <!-- Search code below -->
            <div class="MAIN_DIV" id="div_main_slot_right_search">
                <input type="text"
                       class="search_text_box"
                       placeholder="Search Clubs" />
                <a href="" class="search_button_btn">Search</a>
                <!-- Attach Waves to these btns -->
                <script>
                    //Attach waves
                    Waves.attach('.search_button_btn');
                    //Ripple on hover
                    $('.search_button_btn').mouseenter(function() {
                        Waves.ripple(this, {wait: null});
                    }).mouseleave(function() {
                        Waves.calm(this);
                    });
                    //Init
                    Waves.init();
                </script>
            </div>
            <!-- Events code below -->
            <div class="MAIN_DIV" id="div_main_slot_right_events">
                <!-- EVENTS CONTAINER START -->
                <div class="events_container_container_d">
                    <ul class="events_container_ul">
                        <li class="events_container_li">
                            <!-- DO NOT CHANGE THE STRUCTURE BELOW -->
                            <!-- /\/\/\/\/\/\/\/\/\/\ -->
                            <!-- Description section -->
                            <div class="events_container_li_main_d">
                                <div class="events_container_int_heading_top">
                                    <p class="events_container_int_heading_par">CLUB NAME</p>
                                </div>
                                <div class="events_container_int_d_top">
                                    <p class="events_container_int_d_par">
                                        Event @ 00:00 on 00/00/00
                                    </p>
                                </div>
                            </div>
                            <!-- Button Section -->
                            <div class="events_container_int_d_btn">
                                <a href="" class="events_container_btn">Hide</a>
                            </div>
                            <!-- /\/\/\/\/\/\/\/\/\/\ -->
                            <!-- DO NOT CHANGE THE STRUCTURE ABOVE -->
                        </li>
                    </ul>
                </div>
                <!-- Attach Waves to these btns -->
                <script>
                    //Attach waves
                    Waves.attach('.events_container_btn');
                    //Ripple on hover
                    $('.events_container_btn').mouseenter(function() {
                        Waves.ripple(this, {wait: null});
                    }).mouseleave(function() {
                        Waves.calm(this);
                    });
                    //Init
                    Waves.init();
                </script>
                <!-- EVENTS CONTAINER END -->
            </div>
            <!-- Bottom right container code below -->
            <div class="MAIN_DIV" id="div_main_slot_right_bottom">
                <p>Box</p>
                <?php

                    // checking user params

                    echo $_SESSION["user_ac_lvl"];
                    echo $_SESSION["user_fname"];
                    echo $_SESSION["user_lname"];
                ?>
            </div>
        </div>
    </div>

    <div class="FOOTER_DIV" id="div_footer_slot">
        <!-- DYNAMIC FOOTER CODE HERE -->
        <p>DYNAMIC FOOTER!!</p>
    </div>
</body>
</html>