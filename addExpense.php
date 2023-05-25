<?php

include_once 'header.php';
require 'includes/dbh.inc.php';

?>


<form action="includes/addExpense.inc.php" method="post">
  
    <input type="text" name="name" placeholder="Name">
    
    <input type="number" min="0" step="any" id="amount" name="amount" placeholder="Amount"> 
    
    <input type ="hidden" name ="category" value ="true"/>
    <label>Category
        <?php
        // table called category 
        // take the values 
        // create query
        $query = 'SELECT * FROM Categories';
        // get result
        $result = mysqli_query($conn, $query);
        // fetch data
        $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
        // free result
        mysqli_free_result($result);
        // close connection
        mysqli_close($conn);
        ?>

        <select name ="category">
            <?php foreach ($categories as $cat) : ?>
                <div class="well">
                    <option><?php echo $cat['CategoryName']; ?></option>
                </div>
            <?php endforeach; ?>

        </select>
    </label>
    
        <button type="submit" name="addexp" value = "submit">Submit!</button>
    </form>
<br><br><br><br>


<?php

if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyinput") {
        echo "<p>Fill in all fields!</p>";
    } else if ($_GET["error"] == "none") {
        echo "<p>Expense added!</p>";
        header("Refresh:2; url=budget.php");       
    }
}
?>


<?php
        include_once 'footer.php';