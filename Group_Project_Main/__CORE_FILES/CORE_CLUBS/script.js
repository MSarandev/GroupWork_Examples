/**
 * Created by 1406519 on 21/11/2016.
 * Modified: SARANDEV 09/12 @ 3:43AM
 */

// My Clubs
function dispMyClubs() {
    $.ajax({
        // what is the conn type
        type: "POST",
        // where do you send the request
        url: "../CORE SCRIPTS/NEW_AJAX_SCRIPTS/filterBtnScript.php",
        // what data you pass
        data: {action: 'show_my_clubs'},
        // show the thing below on success
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
        // what is the conn type
        type: "POST",
        // where do you send the request
        url: "../CORE SCRIPTS/NEW_AJAX_SCRIPTS/filterBtnScript.php",
        // what data you pass
        // With the age groups, pass a number as an id
        // passing this will load the correct age group clubs
        data: {action: 'show_AG1', param1:'1'},
        // show the thing below on success
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
        // what is the conn type
        type: "POST",
        // where do you send the request
        url: "../CORE SCRIPTS/NEW_AJAX_SCRIPTS/filterBtnScript.php",
        // what data you pass
        // With the age groups, pass a number as an id
        // passing this will load the correct age group clubs
        data: {action: 'show_AG2', param1:'2'},
        // show the thing below on success
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
        // what is the conn type
        type: "POST",
        // where do you send the request
        url: "../CORE SCRIPTS/NEW_AJAX_SCRIPTS/filterBtnScript.php",
        // what data you pass
        // With the age groups, pass a number as an id
        // passing this will load the correct age group clubs
        data: {action: 'show_AG3', param1:'3'},
        // show the thing below on success
        success: function (response) {
            // get the element in question
            var el1 = document.getElementById("clubs_container_container_d");

            // update the innerHTML with the response
            el1.innerHTML = response;
        }
    });
}