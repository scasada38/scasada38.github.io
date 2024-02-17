<?php
/**
 * Author: Steven Casada
 * Date: 12/28/2023
 * File: header.php
 * Description: Template file
 * @var String $pageTitle
 * @var String $activePage
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $pageTitle ?></title>
    <link rel="stylesheet" href="files/mainStyle.css">
    <link rel="icon" href="images/aflogo.ico">
</head>

<!-- nav section -->
<div class="header">
    <a href="#default" class="logo">Atchley Farms</a>
    <div class="header-right">
        <a <?php
        if ($activePage == "main") {
            ?> class="active" <?php
        }
        ?>
                href="#home">Home</a>
        <a <?php
        if ($activePage == "contact") {
            ?> class="active" <?php
        }
        ?>
                href="#contact">Contact</a>
        <a <?php
        if ($activePage == "about") {
            ?> class="active" <?php
        }
        ?>
                href="#about">About</a>
    </div>
</div>
<body>
<div class="wrapper">
     <div class="content">

<!-- Page continues on caller... -->