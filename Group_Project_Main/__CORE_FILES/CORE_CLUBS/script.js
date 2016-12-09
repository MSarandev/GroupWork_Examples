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
        data: {action: 'show_AG1', param1:'1'},
        success: function (response) {
            // get the element in question
            var el1 = document.getElementById("clubs_container_container_d");

            // update the innerHTML with the response
            el1.innerHTML = response;
        }
    });
}
// Age Group 2
function dispAG2() {
    $.ajax({
        type: "POST",
        url: "../CORE SCRIPTS/NEW_AJAX_SCRIPTS/filterBtnScript.php",
        data: {action: 'show_AG2', param1:'2'},
        success: function (response) {
            // get the element in question
            var el1 = document.getElementById("clubs_container_container_d");

            // update the innerHTML with the response
            el1.innerHTML = response;
        }
    });
}
// Age Group 3
function dispAG3() {
    $.ajax({
        type: "POST",
        url: "../CORE SCRIPTS/NEW_AJAX_SCRIPTS/filterBtnScript.php",
        data: {action: 'show_AG3', param1:'3'},
        success: function (response) {
            // get the element in question
            var el1 = document.getElementById("clubs_container_container_d");

            // update the innerHTML with the response
            el1.innerHTML = response;
        }
    });
}
