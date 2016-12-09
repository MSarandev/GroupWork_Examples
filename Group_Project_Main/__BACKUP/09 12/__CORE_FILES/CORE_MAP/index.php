<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <!-- External CSS + JS -->
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="script.js"></script>
    <!-- JQUERY IMPORT -->
    <!-- VERY IMPORTANT -->
    <script src="../jquery.min.js"></script>
    <!-- JQUERY IMPORT -->
    <!-- VERY IMPORTANT -->
</head>
<body>
    <div class="HEADER_DIV" id="div_header_slot">
        <!-- DYNAMIC HEADER CODE HERE -->
        <p>DYNAMIC HEADER!!</p>
    </div>

    <div class="MAIN_DIV" id="div_main_slot">
        <div class="MAIN_DIV" id="div_main_left_panel">
            <div class="MAIN_DIV" id="div_main_left_top">
                <p>Map top section</p>
            </div>
            <div class="MAIN_DIV" id="div_main_left_btm">
                <p>Marker addition panel</p>
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
        <p>DYNAMIC FOOTER!!</p>
    </div>
</body>
</html>