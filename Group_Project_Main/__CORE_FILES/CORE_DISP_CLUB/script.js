/**
 * Created by Max on 09-Dec-16.
 */

function subToClub() {
    $.ajax({
        type: "POST",
        url: "../CORE SCRIPTS/subscribeToClub.php",
        data:{action:'sub_me_now'},
        success:function(html) {
            alert(html);
        }
    });
}
