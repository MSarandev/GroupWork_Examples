/**
 * Created by 1406519 on 21/11/2016.
 */


// My Clubs
function dispMyClubs() {
    $.ajax({
        type: "POST",
        url: "../CORE SCRIPTS/NEW_AJAX_SCRIPTS/filterBtnScript.php",
        data: {action: 'show_my_clubs'},
        success: function (response) {
            // get the element in question
            var el1 = document.getElementById("clubs_container_container_d");

            // colour the btn
            var btn = document.getElementById("filter_my_clubs_btn");
            btn.style.backgroundColor = "#66ccff";
            // update the innerHTML with the response
            el1.innerHTML = response;
        }
    });
}

// Age Group 1
function dispAG1() {
    $.ajax({
        type: "POST",
        url: "../CORE SCRIPTS/NEW_AJAX_SCRIPTS/filterBtnScript.php",
        data: {action: 'show_AG1'},
        success: function (response) {
            alert(response);
        }
    });
}
// Age Group 2
function dispAG2() {
    $.ajax({
        type: "POST",
        url: "../CORE SCRIPTS/NEW_AJAX_SCRIPTS/filterBtnScript.php",
        data: {action: 'show_AG2'},
        success: function (response) {
            alert(response);
        }
    });
}
// Age Group 3
function dispAG3() {
    $.ajax({
        type: "POST",
        url: "../CORE SCRIPTS/NEW_AJAX_SCRIPTS/filterBtnScript.php",
        data: {action: 'show_AG3'},
        success: function (response) {
            alert(response);
        }
    });
}
