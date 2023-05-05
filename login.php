<?php
include_once 'header.php';
?>

<section>
    <h2>Log In</h2>
    <div>

        <form method='post' action='includes/login.inc.php'>
            <input type="text" name="uid" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <button type="submit" name="submit">Log in!</button>
        </form>
    </div>
    <?php
    if (isset($_GET["error"])) {
        // check what error message could be
        if ($_GET["error"] == "emptyinput") {
            echo "<p>Fill in all fields</p>";
        } else if ($_GET["error"] == "wronglogin") {
            echo "<p>Incorrect login information!</p>";
        }
    }
    ?>
</section>

<?php
include_once 'footer.php';