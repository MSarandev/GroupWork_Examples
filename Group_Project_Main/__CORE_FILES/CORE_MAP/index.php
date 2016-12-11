<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
                            id="walk_1_selector_btn"
                            name="north_kincardine_viewpoint"
                            onclick="loadWalk(this.name)">North Kincardine</button>
                    <button class="walk_sel_btn"
                            id="walk_2_selector_btn"
                            name="portlethen_moss"
                            onclick="loadWalk(this.name)">Portlethen Moss</button>
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
                <p id="update_me_par">-- No Info --</p>
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
                <p>Step 3: Right click the map to drop marker</p>
                <p>Step 4: Add a description</p>
                <input type="text"
                       class="marker_a_text_input"
                       id="new_marker_descr_txt"
                       placeholder="Short Description" />
                <button class="marker_a_btn"
                        id="new_marker_submit_btn"
                        onclick="storeThisMarker()">Submit</button>
            </div>
        </div>
    </div>
    <div class="MAIN_DIV" id="div_map_container">
        <div id="map" onload="initMap()">
        </div>
        <!-- Google Maps loading script -->
        <script>
            // grab all the markers from the db

            //define the vars, to avoid undefined errors
            var user_m_descr = [];
            var user_m_img = [];
            var user_m_coor = [];

            <?php
                // the script below echos an array of markers
                include("../CORE SCRIPTS/markersFromDB.php");
            ?>

            // declare var
            var map  = new google.maps.Map(document.getElementById('map'));
            var marker = new google.maps.Marker();
            var location_storage = "Define me";

            function initMap() {
                map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 13,
                    center: {lat:57.061681, lng:-2.1294679999999744} // Portlethen
                });

                // This event listener will call addMarker() when the map is clicked.
                map.addListener('rightclick', function(event) {
                    addMarker(event.latLng, "", "User submitted");
                    location_storage = event.latLng.toString();
                });

                // on map init, check if any user submitted markers are avail.
                if(user_m_descr.length != 0 &&
                    user_m_img.length != 0 &&
                    user_m_coor.length != 0){

                    // add the markers to the map
                    user_m_descr.forEach(function(element){
                        // get the index to use in the other array
                        var index1 = user_m_descr.indexOf(element);

                        addMarker(user_m_coor[index1], "", element);
                    });
                }
            }

            function addMarker(location, label_t, info_t) {
                var marker = new google.maps.Marker({
                    position: location,
                    map: map,
                    animation: google.maps.Animation.DROP,
                    label: label_t,
                    title: info_t
                });
            }

            function clearMarkers() {
                // reload the map
                initMap();

                /*
                for (var i = 0; i < markers.length; i++) {
                    markers[i].setMap(null);
                }
                */
            }

            function setInfoText(text){
                document.getElementById("update_me_par").innerHTML = text;
            }

            // walks function
            function loadWalk(walk_name){
                // prep
                var lat_txt = "";
                var lng_txt = "";
                var lat_lng = "";

                // check which walk should be loaded
                if(walk_name.includes("moss")){
                    // portlethen moss walk
                    // ---
                    // clear the old markers
                    clearMarkers();

                    setTimeout(function(){
                            // generate the start marker
                            lat_txt = 57.05431867895687;
                            lng_txt = -2.1475750207901;
                            lat_lng = {lat: lat_txt, lng: lng_txt}; // G Maps Format

                            // drop the start marker
                            addMarker(lat_lng, "A", "Start here");

                            // set the map center on start
                            map.setCenter(lat_lng);
                            map.setZoom(15);

                            // generate the end marker
                            lat_txt = 57.05709011021065;
                            lng_txt = -2.1485406160354614;
                            lat_lng = {lat: lat_txt, lng: lng_txt}; // G Maps Format

                            // drop the start marker
                            addMarker(lat_lng, "B", "Walk complete!");

                            // update the walk info container
                            var text = "1km or around ¾ mile. <hr>Portlethen Moss is a rare area of natural raised acidic bog which supports a wide variety of plant and animal species.<br>" +
                                "The moss formed after the last ice age. The glacial retreat left an undulating landscape with a hollow that filled with water creating a lake, which over time filled in with decomposing vegetation. It takes about 100 years to form a mere 5cm of peat, formed from decomposing plant residues that are compacted, which then build up slowly over time. In recent coring studies, certain areas of the living bog have been measured to more than 3 metres in depth! In recent years the moss has been subject to development and much of what was the Moss has been lost. Now in the care of the community and supported by volunteers, it will hopefully remain a vibrant natural area of North Kincardine.";

                            // update the text
                            setInfoText(text);
                        }, 1000);

                }else if(walk_name.includes("viewpoint")){
                    // clear the old markers
                    clearMarkers();

                    setTimeout(function(){
                            // generate the start marker
                            lat_txt = 57.00874129091307;
                            lng_txt = -2.228872776031494;
                            lat_lng = {lat: lat_txt, lng: lng_txt}; // G Maps Format

                            // drop the start marker
                            addMarker(lat_lng, "A", "Start here");

                            // set the map center on start
                            map.setCenter(lat_lng);
                            map.setZoom(13);

                            // generate the end marker
                            lat_txt = 57.014874853723825;
                            lng_txt = -2.2713804244995117;
                            lat_lng = {lat: lat_txt, lng: lng_txt}; // G Maps Format

                            // drop the start marker
                            addMarker(lat_lng, "B", "Walk complete!");

                            // update the walk info container
                            var text = "Roughly 5km or 3 miles <hr>The rocks of North Kincardine are predominately deep marine deposits metamorphosed during the Caledonian mountain building era. These metamorphic rocks are separated from the south by the Highland Boundary Fault. The fault was formed 460–420 Million years ago and stretches from Helensburgh in the West of Scotland to Craigeven Bay, south of Muchalls, in the East. The fault created a deep basin to the south-east which, over time, filled with debris from the northwest, producing the fertile rolling hills of the Midland Valley between Stonehaven and Perth.";

                            // update the text
                            setInfoText(text);
                        }, 1000);
                }
            }

            // storage AJAX
            function storeThisMarker(){
                // check with the user
                if(confirm("Submit the marker?")) {
                    // fetch all the values
                    var img_url = document.getElementById("new_marker_url_txt").value;
                    var des_txt = document.getElementById("new_marker_descr_txt").value;

                    $.ajax({
                        // what is the conn type
                        type: "POST",
                        // where do you send the request
                        url: "../CORE SCRIPTS/AJAXstoreThisMarker.php",
                        // what data you pass
                        data: {
                            action: 'store_a_marker',
                            img_u: img_url,
                            des_txt: des_txt,
                            coor: location_storage
                        },
                        // show the thing below on success
                        success: function (response) {
                            if (response.includes("ERROR")) {
                                // error
                                alert(response);
                            } else {
                                // pass
                                alert(response);
                            }
                        }
                    });
                }
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
    echo "Version: 4.3 <br>";
    include("../__CORE_DOM_Elements/footer.php");
    ?>
</div>
</body>
</html>