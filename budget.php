
<?php
include_once 'header.php';
require('includes/dbh.inc.php'); ?>


<button type="button" class="btn btn-light" onclick = "document.location = 'addExpense.php'">Add Expense</button>



<?php
// display my holds
echo "<h3>My Expenses</h3>";

//$usersID; // usersID
$query2 = "select * from Expenses where userID = $usersID";
$result2 = mysqli_query($conn, $query2);
// fetch data
$info2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);
// free result
mysqli_free_result($result2);

if (!empty($info2)) {
    foreach ($info2 as $userinfo) :
        ?>
        <div class="well">
            <h4><?php echo $userinfo['ExpenseName']; ?></h4>
            <h5> 
                <?php echo $userinfo['ExpenseAmount']; ?> </h5>

        </div>
        <?php
    endforeach;
} 
    else {
        echo "<p>You have not added any expenses yet! Click <a href='addExpense.php'>here</a> to add</p>";
    }
    

include_once 'footer.php';
