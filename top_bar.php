<?php

if (!session_id()) {
        session_start();
}

if ( isset($_SESSION["user"]) ) {
        ?>
        <div class="div2">
                <form method="get">
                        Hello, <?php echo $_SESSION["user"]; ?><input formaction="sign_out.php" type="submit" value="Sign Out" class="button2">
                </form>
        </div>
        <?php
} else {
        ?>
        <div class="div2">
                <form method="get">
                        <input type="text" name="username" placeholder="Username" class="input1"><input type="password" name="password" placeholder="Password" class="input1"><input formaction="sign_in.php" type="submit" value="Sign In" class="button2"><input formaction="register.php" type="submit" value="Register" class="button2">
                </form>
        </div>
        <?php
}

?>