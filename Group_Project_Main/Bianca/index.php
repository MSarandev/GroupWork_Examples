<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Go Portlethen</title>
    <link rel="stylesheet" href="stylesheets/style.css">

</head>
<body>
	<?php 
	    require("components/navbar.html");
	    require("components/header.html");
	?>

	<div class="paragraph">
		<div class="buttons-container">
            <div class="button">
                <a href="#">Age group 1</a>
            </div>
            <div class="button">
                <a href="#">Age group 2</a>
            </div>
            <div class="button">
                <a href="#">Age group 3</a>
            </div>
            <div class="button">
                <a href="#">New clubs</a>
            </div>
        </div>
		
        <section class="block">
	       <?php require("components/club.php") ?>     
        </section>
    </div>

    <?php
	    require("components/footer.html");
	?>