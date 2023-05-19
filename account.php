<?php

include_once 'header.php';
require 'includes/dbh.inc.php';
require 'includes/functions.inc.php';


$usersID = $_SESSION['UserID'];
$query = "select * from Users where UserID=$usersID;";
$result = mysqli_query($conn, $query);
$info = mysqli_fetch_all($result, MYSQLI_ASSOC);

foreach ($info as $userinfo) :
    echo $userinfo["UserFullName"]."<br>";
    echo $userinfo['UserUsername']."<br>";
    echo $userinfo['UserNumber']."<br>";
    echo $userinfo['UserEmail']."<br>";
    $getText = $userinfo['UserSendText'];
    if ($getText == 1) {
        echo "You are receiving messages";
    }
    else {
        echo "You are not signed up to receive messages";
    }
endforeach;

?>
<br>

<form action="account.php" method="POST">
<button type="submit" name="modifyOptions" value="modify" onclick="">
<?php
if ($getText == 1) 
{ 
    $changeGetText = 0;
    ?>
    Opt out<?php
}
else 
{ 
    $changeGetText = 1;
    ?> 
    Opt in<?php
}
?>
</button>
</form>

<?php
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['modifyOptions']))
    {
        modifyUserOptions($conn,$changeGetText); // send what they're changing to
        echo "Settings updating...";
        header("Refresh:2");
    }

    ?>

<?php
include 'footer.php';
