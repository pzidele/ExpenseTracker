
<?php
include_once 'header.php';
require_once 'includes/functions.inc.php';
require('includes/dbh.inc.php'); ?>

<center>
<button type="button" class="btn btn-light" onclick = "document.location = 'addExpense.php'">Add Expense</button>

<button type="submit" id="filterCategory" class="btn btn-light" onclick="document.location='budget.php?sortCategory=true'">Sort by Category</button>
<button type="submit" id="filterDate" class="btn btn-light" onclick="document.location='budget.php?sortDate=true'">Sort by Recently Added</button>

</center>


<?php
$sum = getSumExpenses();

echo "<center><h4>You spent <b>$$sum</b> this month </h4></center>";

// display my expenses
echo "<h3>My Expenses</h3>";

//$usersID; // usersID
if (isset($_GET["sortDate"])) {
        $query2 = "select * from Expenses where UserID = $usersID order by ExpenseDate desc";
}
else {
        $query2 = "select * from Expenses where UserID = $usersID order by CategoryID";
}
$result2 = mysqli_query($conn, $query2);
// fetch data
$info2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);
// free result
mysqli_free_result($result2);

        
if (!empty($info2)) {
    
    foreach ($info2 as $userinfo) :
        ?>
        <div class="well">
            <h5>Category: 
                <?php 
                $catID = $userinfo['CategoryID'];
                $catQry = "select CategoryName from Categories where CategoryID = $catID";
                $result3 = mysqli_query($conn, $catQry);
                $info3 = mysqli_fetch_all($result3, MYSQLI_ASSOC);
                mysqli_free_result($result3);
                foreach ($info3 as $catName) :
                    echo $catName['CategoryName'];
                endforeach; 
            ?>
            
            </h5>
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