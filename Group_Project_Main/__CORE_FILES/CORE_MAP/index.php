<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate"/>
    <meta http-equiv="Pragma" content="no-cache"/>
    <meta http-equiv="Expires" content="0"/>
    <title>Explore Portlethen</title>
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
    <?php
    include("../__CORE_DOM_Elements/header.php");
    ?>
</div>

<div class="MAIN_DIV" id="div_main_slot">
    <div class="MAIN_DIV" id="div_main_left_panel">
        <!-- Top info bar START -->
        <div id="div_info_img_holder">
            <!-- Display the outdoor-access website logo -->
            <a href="http://www.outdooraccess-scotland.com/"
               target="_blank">
                <img id="sc_out_acc_img"
                     src="http://outdooraccess-scotland.com/sites/default/files//snh_logo_green_0.gif"/>
            </a>
        </div>
        <!-- Top info bar END -->
        <div class="MAIN_DIV" id="div_main_left_top">
            <div id="par_holder_main_left">
                <h3>Where do you want to go today?</h3>
            </div>
            <div id="walks_top_container">
                <div id="walks_div_col1">
                    <button class="walk_sel_btn"
                            id="walk_1_selector_btn">Walk 1</button>
                    <button class="walk_sel_btn"
                            id="walk_2_selector_btn">Walk 2</button>
                    <button class="walk_sel_btn"
                            id="walk_3_selector_btn">Walk 3</button>
                </div>
                <div id="walks_div_col2">
                    <button class="walk_sel_btn"
                            id="walk_4_selector_btn">Walk 4</button>
                    <button class="walk_sel_btn"
                            id="walk_5_selector_btn">Walk 5</button>
                </div>
            </div>
            <p id="walk_info_par">Select a walk and you'll see the info below.</p>
            <div id="walk_info_div_container">
                <p>-- No Info --</p>
            </div>
            <!-- Attach Waves to these btns -->
            <script>
                //Attach waves
                Waves.attach('.walk_sel_btn');
                //Ripple on hover
                $('.walk_sel_btn').mouseenter(function() {
                    Waves.ripple(this, {wait: null});
                }).mouseleave(function() {
                    Waves.calm(this);
                });
                //Init
                Waves.init();
            </script>
            <!-- WAVES END -->
        </div>
        <div class="MAIN_DIV" id="div_main_left_btm">
            <div id="marker_a_top_container">
                <div id="par_holder_sub_left">
                    <h3>Want to share a place?</h3>
                </div>
                <p>Step 1: Upload your image</p>
                <div id="marker_upload_links_container">
                    <a href="https://postimage.org/"
                       target="_blank">
                        <img src="https://postimage.org/favicon.ico"
                             class="upload_image_logo"/>
                    </a>
                    <a href="https://imgsafe.org/"
                       target="_blank">
                        <img src="http://cdn.imgsafe.org/favicon.ico"
                             class="upload_image_logo"/>
                    </a>
                    <a href="http://imgur.com/"
                       target="_blank">
                        <img src="http://s.imgur.com/images/favicon-152.png"
                             class="upload_image_logo"/>
                    </a>
                </div>
                <p>Step 2: Paste the URL</p>
                <input type="url"
                       class="marker_a_text_input"
                       id="new_marker_url_txt"
                       placeholder="URL to your image" />
                <p>Step 3: Click the button and select the place</p>
                <button class="marker_a_btn">Map Click</button>
                <p>Step 4: Add a description</p>
                <input type="text"
                       class="marker_a_text_input"
                       id="new_marker_descr_txt"
                       placeholder="Short Description" />
                <button class="marker_a_btn"
                        id="new_marker_submit_btn">Submit</button>
            </div>
        </div>
    </div>
    <div class="MAIN_DIV" id="div_map_container">
        <div id="map">

        </div>
        <!-- Google Maps loading script -->
        <script>
            function initMap() {
                var uluru = {lat: 57.061681, lng: -2.1294679999999744};
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 12,
                    center: uluru
                });
            }
        </script>
        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCmS3TIPC5DwmYxSnlFwOx1ScFqMEH-zUs&callback=initMap">
        </script>
    </div>
</div>

<div class="FOOTER_DIV" id="div_footer_slot">
    <!-- DYNAMIC FOOTER CODE HERE -->
    <?php
    echo "Version: 2.5 <br>";
    include("../__CORE_DOM_Elements/footer.php");
    ?>
</div>
</body>
</html>