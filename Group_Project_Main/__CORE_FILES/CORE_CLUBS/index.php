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

    <link rel="stylesheet" type="text/css" href="../CORE%20WAVES/waves.min.css"/>
    <script type="text/javascript" src="../CORE%20WAVES/waves.min.js"></script>

    <!-- WAVES FILES END   -->
    <!-- JQUERY IMPORT -->
    <!-- VERY IMPORTANT -->
    <script src="../jquery.min.js"></script>
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
                        <form action="" method="post">
                            <input type="submit"
                                   name="my_clubs_call_btn"
                                   value="My Clubs"
                                   class="filter_buttons_btn" />

                            <input type="submit"
                                   name="age_group_1_call_btn"
                                   value="Age Group 1 (00-12)"
                                   class="filter_buttons_btn" />

                            <input type="submit"
                                   name="age_group_2_call_btn"
                                   value="Age Group 2 (12-16)"
                                   class="filter_buttons_btn" />

                            <input type="submit"
                                   name="age_group_3_call_btn"
                                   value="Age Group 3 (18-99)"
                                   class="filter_buttons_btn" />
                        </form>
                        <!-- Attach Waves to these btns -->
                        <!--

                        STYLING ERROR -- FIX THIS

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
                        -->
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
                        <!-- Include the php script to load the clubs -->
                        <?php
                            include("../CORE SCRIPTS/load_clubs.php");
                        ?>
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
                <form action="" method="post">
                    <input type="text"
                           class="search_text_box"
                           name="search_club_txt"
                           placeholder="Search Clubs" />
                    <input type="submit"
                           class="search_button_btn"
                           name="search_club_btn"
                           value="Search" />
                </form>
                <div id="search_res_holder">
                    <!-- Include the script to handle searches -->
                    <?php
                        include("../CORE SCRIPTS/searchClubs.php");
                    ?>
                </div>
                <!-- Attach Waves to these btns -->
                <!--

                STYLING ERROR -- FIX THIS

                <script>
                    //Attach waves
                    Waves.attach('.search_button_btn');
                    Waves.attach('.search_res_btn_link');
                    //Ripple on hover
                    $('.search_button_btn').mouseenter(function() {
                        Waves.ripple(this, {wait: null});
                    }).mouseleave(function() {
                        Waves.calm(this);
                    });
                    //Ripple on hover
                    $('.search_res_btn_link').mouseenter(function() {
                        Waves.ripple(this, {wait: null});
                    }).mouseleave(function() {
                        Waves.calm(this);
                    });
                    //Init
                    Waves.init();
                </script>
                -->
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
                <a href="../CORE_CREATE_CLUB/index.php" class="admin_btn">Create Club</a>
                <p id="admin_approval_top_p">Approval Section</p>
                <div id="admin_div_panel">
                    <?php
                    include("../CORE SCRIPTS/is_admin.php");
                    include("../CORE SCRIPTS/buttonClickMuch.php");
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="FOOTER_DIV" id="div_footer_slot">
        <!-- DYNAMIC FOOTER CODE HERE -->
        <?php
            echo "Version 3.10:F2.1  ";
            include("../__CORE_DOM_Elements/footer.php");
        ?>
    </div>
</body>
</html>