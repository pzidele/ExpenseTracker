<?php
include_once 'header.php';
?>

<section>
    <h2>Sign Up</h2>
    <div>
        <form method='post' action='includes/signup.inc.php'>
            <input type="text" name="name" placeholder="Name">
            <input type="text" name="email" placeholder="Email">
            <input type="tel" name="phone" placeholder="Phone Number">
            <input type="text" name="uid" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <input type="password" name="passwordrepeat" placeholder="Repeat password">
            <button type="submit" name="submit">Sign up!</button>
        </form>
    </div>
    <?php
    if (isset($_GET["error"])) {
        // check what error message could be
        if ($_GET["error"] == "emptyinput") {
            // return some message here
            echo "<p>Fill in all fields</p>";
        } else if ($_GET["error"] == "invalidusername") {
            echo "<p>Choose a proper username!</p>";
        } else if ($_GET["error"] == "invalidemail") {
            echo "<p>Choose a proper email!</p>";
        } else if ($_GET["error"] == "invalidphone") {
            echo "<p>Choose a proper phone number!</p>";
        } else if ($_GET["error"] == "passwordsdontmatch") {
            echo "<p>Passwords don't match!</p>";
        } else if ($_GET["error"] == "stmtfailed") {
            echo "<p>Something went wrong!</p>";
        } else if ($_GET["error"] == "usernametaken") {
            echo "<p>Username already taken!</p>";
        } else if ($_GET["error"] == "none") {
            echo "<p>You have signed up!</p>";
        }
    }
    ?>
</section>



    <?php
    include_once 'footer.php';
    