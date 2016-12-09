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
    <!-- WAVES FILES BELOW -->

    <link rel="stylesheet" type="text/css" href="../CORE%20WAVES/waves.min.css"/>
    <script type="text/javascript" src="../CORE%20WAVES/waves.min.js"></script>

    <!-- WAVES FILES END   -->
    <!-- JQUERY IMPORT -->
    <!-- VERY IMPORTANT -->
    <script src="../jquery.min.js"></script>
    <script src="script.js"></script>
    <!-- JQUERY IMPORT -->
    <!-- VERY IMPORTANT -->
</head>
<body onload="dispMyClubs()">
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
                        <!-- AJAX UPDATE BELOW -->
                        <button class="filter_buttons_btn"
                                id="filter_my_clubs_btn"
                                onclick="dispMyClubs()">My Clubs</button>

                        <button class="filter_buttons_btn"
                                id="filter_age_g_1_btn"
                                onclick="dispAG1()">Age Group 1 (00-12)</button>

                        <button class="filter_buttons_btn"
                                id="filter_age_g_2_btn"
                                onclick="dispAG2()">Age Group 2 (12-18)</button>

                        <button class="filter_buttons_btn"
                                id="filter_age_g_3_btn"
                                onclick="dispAG3()">Age Group 3 (18-99)</button>
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
                        <!-- AJAX UPDATE END -->
                  </div>
                </div>
                <!-- FILTER BUTTONS END -->
            </div>
            <!-- Clubs code below -->
            <div class="MAIN_DIV" id="div_main_slot_left_clubs">
                <!-- Added code from container file 28/11/2016 -->
                <!-- CLUBS CONTAINER START -->
                <div id="clubs_container_container_d"
                     class="clubs_container_container_d">
                    <ul class="clubs_container_ul">
                        <!-- CLUBS GO HERE -->
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
                <!-- AJAX UPDATE START -->
                <input type="text"
                       class="search_text_box"
                       name="search_club_txt"
                       id="search_club_txt"
                       placeholder="Search Clubs" />
                <button class="search_button_btn"
                        id="search_button_btn"
                        onclick="whatAreYouLookingFor()">Search</button>
                <!-- AJAX UPDATE END -->
                    <div class='search_res_inner'
                         id="search_res_inner">

                        <!-- SEARCH RESULTS GO HERE -->

                    </div>
                </div>
            </div>
            <!-- Events code below -->
            <div class="MAIN_DIV" id="div_main_slot_right_events">
                <!-- EVENTS CONTAINER START -->
                <div class="events_container_container_d">
                    <ul class="events_container_ul">
                       <!-- Include the PHP script to load events -->
                        <?php
                            include("../CORE SCRIPTS/load_events.php");
                        ?>
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
                <!-- generate the options here based on user acc. lvl -->
                <div id="div_right_bottom_btn_holder">
                    <a href="../CORE_CREATE_CLUB/index.php" class="admin_btn">Create Club</a>
                    <!-- Script to display the div -->
                    <script>
                        function displDiv(){
                            var foo = document.getElementById("create_event_div");

                            if(foo.style.visibility == "hidden"){
                                // show the div
                                foo.style.visibility = "visible";
                            }
                        }
                    </script>
                    <!-- Create event button below -->
                    <button id="create_event_master_btn"
                            onclick="displDiv()">Create Event</button>
                </div>
                <!-- On load hide the div, so it's not in the way -->
                <div id="create_event_div">
                    <!-- This is where the user will add the event -->
                    <form>
                        <input type="number"
                               placeholder="Club ID"
                               name="create_event_id_txt"
                               id="create_event_id_txt">
                        <input type="text"
                               placeholder="Event Text"
                               id="create_event_txt_txt"
                               name="create_event_txt_txt">
                        <input type="text"
                               placeholder="Day"
                               id="create_event_day_txt"
                               name="create_event_day_txt">
                        <input type="text"
                               placeholder="Time"
                               id="create_event_time_txt"
                               name="create_event_time_txt">
                        <br>
                        <input type="submit"
                               name="submit_new_event_btn"
                               id="submit_new_event_btn"
                               value="Submit">
                    </form>
                </div>
                <p id="admin_approval_top_p">Approval Section</p>
                <div id="admin_div_panel">
                    <?php
                    include("../CORE SCRIPTS/is_admin.php");
                    include("../CORE SCRIPTS/buttonClickMuch.php");
                    ?>
                </div>
            </div>
        </div>

    <div class="FOOTER_DIV" id="div_footer_slot">
        <!-- DYNAMIC FOOTER CODE HERE -->
        <?php
            echo "MASTER BUILD X2.5 <br>";
            echo "Build M3.13:F2.1:L3.4:E1.3 <br>";
            include("../__CORE_DOM_Elements/footer.php");
        ?>
    </div>
</body>
</html>