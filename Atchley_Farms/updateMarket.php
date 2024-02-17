<?php
/**
 * Author: Steven Casada
 * Date: 1/4/2024
 * File: updateMarket.php
 * Description:
 * @var Object $connection
 * @var String $tblMarket
 */

include('files/database.php');

//Do not proceed if there are no post data
if (!$_POST) {
    $error = "Direct access to this script is not allowed.";
    header("Location: error.php?m=$error");
    die();
}

//retrieve book id. Do not proceed if id was not found.
if (!is_array($_POST['name']) &&
    !is_array($_POST['open']) &&
    !is_array($_POST['close']) &&
    !is_array($_POST['address']) &&
    !is_array($_POST['visible'])
) {
    $error = "There was a problem getting market information.";
    header("Location: error.php?m=$error");
    die();
}
$nameArr = $_POST['name'];
$openArr = $_POST['open'];
$closeArr = $_POST['close'];
$addressArr = $_POST['address'];
$visibleArr = $_POST['visible'];

for ($id = 0; $id < sizeof($nameArr); $id++) {
    $name = $nameArr[$id];
    $name = $connection->real_escape_string(trim($name));
    $open = $openArr[$id];
    $open = $connection->real_escape_string(trim($open));
    $close = $closeArr[$id];
    $close = $connection->real_escape_string(trim($close));
    $address = $addressArr[$id];
    $address = $connection->real_escape_string(trim($address));
    if (isset($visibleArr[$id])) {
        $visible = 1;
    } else {
        $visible = 0;
    }

    $sql = "UPDATE $tblMarket SET name ='$name',open='$open',close='$close',address='$address', visible='$visible'
            WHERE id='$id'";

    //execute the query
    $query = @$connection->query($sql);

    if (!$query) {
        $error = "Update failed: $connection->error.";
        $connection->close();
        header("Location: error.php?m=$error");
        die();
    }
}


header("Location: main.php");
