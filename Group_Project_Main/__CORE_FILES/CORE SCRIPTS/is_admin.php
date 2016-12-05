<?php
/**
 * Created by PhpStorm.
 * User: Max
 * Date: 03-Dec-16
 * Time: 9:56 PM
 */

// fetch the access level from the session
$user_a_lvl = $_SESSION["user_ac_lvl"];

if($user_a_lvl == 10){
    // user is admin - show all
    echo '
    <!-- Display the admin menu, if admin -->
    <?php include("../CORE SCRIPTS/buttonClickMuch.php"); ?>
    <form action="" method="post">
        <input type="button" name="create_club_btn" class="admin_btn" value="Create a club" />
    </form>
    <form action="" method="post">
        <input type="button" name="create_club_btn" class="admin_btn" value="Approve clubs" />
    </form>
    <form action="" method="post">
        <input type="button" name="create_club_btn" class="admin_btn" value="Approve markers" />
    </form>
        <!-- Attach Waves to these btns -->
        <script>
    //Attach waves
    Waves.attach(\'.admin_btn\');
            //Ripple on hover
            $(\'.admin_btn\').mouseenter(function() {
                Waves.ripple(this, {wait: null});
            }).mouseleave(function() {
                Waves.calm(this);
            });
            //Init
            Waves.init();
        </script>
    ';
}else{
    // user is not admin - show create only
    echo '
        <!-- Display the admin menu, if admin -->
        <?php include("../CORE SCRIPTS/buttonClickMuch.php"); ?>
        <form action="" method="post">
            <input type="button" name="create_club_btn" class="admin_btn" value="Create a club" />
        </form>
        <!-- Attach Waves to these btns -->
        <script>
            //Attach waves
            Waves.attach(\'.admin_btn\');
            //Ripple on hover
            $(\'.admin_btn\').mouseenter(function() {
                Waves.ripple(this, {wait: null});
            }).mouseleave(function() {
                Waves.calm(this);
            });
            //Init
            Waves.init();
        </script>
';
}
