<?php
/**
 * Author: Steven Casada
 * Date: 1/3/2024
 * File: editMarket.php
 * Description:
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

    <div class="nested-element">
        <form action="updatemarket.php" method="post">
            <div class="table">
                <div class="row rowHeader">
                    <div class="cell">Name</div>
                    <div class="cell">Open Times</div>
                    <div class="cell">Close Times</div>
                    <div class="cell">Location</div>
                    <div class="cell">Visible</div>
                </div>
                <?php
                while ($row = $query->fetch_assoc()) {
                    ?>
                    <div class="row">
                        <div class="cell"><input class="cell" type="text" name="name[]" value="<?= $row['name'] ?>"></div>
                        <div class="cell"><input class="cell" type="text" name="open[]" value="<?= $row['open'] ?>"></div>
                        <div class="cell"><input class="cell" type="text" name="close[]" value="<?= $row['close'] ?>"></div>
                        <div class="cell"><input class="cell" type="text" name="address[]" value="<?= $row['address'] ?>"></div>
                        <div class="cell"><input class="cell" name="visible[]" type="checkbox" <?php if ($row['visible']) {
                                echo "checked";
                            } ?> value="checked"></div>
                    </div>
                    <?php
                }
                ?>
            </div>
            <input type="submit" value="Apply">
        </form>
    </div>
<?php
include("files/footer.php");