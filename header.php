<?php session_start(); ?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Mostar</title>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css"/>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/media.css">

    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.min.js"></script>
    <script src="js/script.js"></script>

</head>
<body>

<div class="header-info container-fluid">
    <div class="header-info-content container">
        <div class="header-info-content-phone col-sm-2">
            <span class="glyphicon glyphicon-earphone"></span>
            <span>+387 32 880 880</span>
        </div>
        <div class="header-info-content-address col-sm-4">
            <span class="glyphicon glyphicon-map-marker"></span>
            <span>Ulica kardinala Stepinca, 88000 Mostar, BiH</span>
        </div>
        <div class="header-info-content-login col-sm-6">
        <?php if(isset($_SESSION['prijava'])): ?>
            <form method="POST" action="autorizacija.php">
                <span class="glyphicon glyphicon-log-in"></span>
                <input type="hidden" name="odjava" value="true" />
                <input type="submit" value="Odjava">
            </form>
        <?php else: ?>
            <button type="button" data-toggle="modal" data-target="#login-modal">
                <span class="glyphicon glyphicon-log-in"></span>
                <span class="login-button">Prijava/Registracija</span>
            </button>
        <?php endif ?>
        </div>
    </div>
</div>

<div class="container">

    <div class="header-title">
        <h1>Hotel Mostar</h1>
        <h2>Dobro došli!</h2>
    </div>


    <div class="navigation">
        <ul>
            <li><a href="index.php">Početna</li></a>
            <li><a href="index.php#rooms">Sobe</li></a>
            <li><a href="kontakt.php">Kontakt</li></a>
            <li><a href="vizija.php">Vizija</li></a>

            <?php if(isset($_SESSION['admin'])): ?>
                <li><a href="admin-rezervacije.php">Administracija rezervacija</li></a>
                <li><a href="admin-sobe.php">Administracija soba</li></a>
            <?php endif ?>

        </ul>
    </div>

</div>