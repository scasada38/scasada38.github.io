<?php
/**
 * Author: Steven Casada
 * Date: 12/30/2023
 * File: main.php
 * Description:
 * @var String $tblMarket
 * @var Object $connection
 */

    include("files/database.php");

    //SELECT statement to retrieve market data from farm table.
    $sql = "SELECT *
    FROM $tblMarket";

    //execute the query
    $query = $connection->query($sql);

    //Handle errors
    if (!$query) {
        $error = "Selection failed: " . $connection->error;
        $connection->close();
        header("Location: error.php?m=$error");
        die();
    }

    // load header element
    $activePage = "main";
    $pageTitle = "Home";
    include("files/header.php");
?>

    <div class="parent">
        <div class="child">
            <h1>This Site is currently under construction</h1>
            <p>Please check back later for updates in the future.<br>Thank you.</p>
        </div>
        <img class="child" src="images/under_construction.png" alt="Under Construction" style="scale: 50%"/>
    </div>

    <div class="nested-element">
    <div class="table">
        <input type="button" value="Edit" onclick="window.location.href ='editMarket.php'">
        <div class="row rowHeader">
            <div class="cell">Name</div>
            <div class="cell">Times</div>
            <div class="cell">Location</div>
        </div>
<?php
    while ($row = $query->fetch_assoc()) {
        if ($row['visible']) {
    ?>
    <div class="row">
        <div class="cell"><?= $row['name'] ?></div>
        <div class="cell"><?= $row['open'] ?> - <?= $row['close'] ?></div>
        <div class="cell"><?= $row['address'] ?></div>
    </div>
<?php
        }
    }
?>
    </div>
    </div>
<?php
    include("files/footer.php");