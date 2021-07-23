<?php session_start();?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Peer Tutor</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <link rel="stylesheet" type="text/css" href="custom.css">
        <script src="custom.js"></script>
    </head>
    <body>
        <div class="container">
            <a href="home.php?col=class">
                <h2>Plainsboro Peer Tutoring</h2>
            </a>
            <div class="row">
                <div class="col-sm-3">
                    <?php include 'leftNav.php';?>
                </div>
                <div class="col-sm-9">
                    <?php include $_GET["col"].".php";?>
                </div>
            </div>
        </div>
    </body>
</html>
