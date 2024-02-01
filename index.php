<?php require('header.php') ?>

<div class="container">

<div class="slider">
    <div>
        <img src="images/slide3.jpg">
        <h4>Lorem ipsum dolorem</h4>
        <p>Lorem ipsum dolorem, lorem ipsum dolorem lorem ipsum dolorem<p>
    </div>
    <div>
        <img src="images/slide1.jpg">
        <h4>Lorem ipsum dolorem</h4>
        <p>Lorem ipsum dolorem, lorem ipsum dolorem lorem ipsum dolorem<p>
    </div>
    <div>
        <img src="images/slide2.jpg">
        <h4>Lorem ipsum dolorem</h4>
        <p>Lorem ipsum dolorem, lorem ipsum dolorem lorem ipsum dolorem<p>
    </div>
</div>


<div id="rooms" class="homepage-rooms">
    <div class="row">

    <?php

        require('connection.php');

        $sql = "SELECT slika, ime, tip, osobe, povrsina, cijena FROM sobe";
        $result = $conn->query($sql);

        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) { ?>
                <div class="col-sm-3">
                    <div class="room-container">
                        <img src="<?php echo $row['slika'] ?>">
                        <h5><?php echo $row['ime'] ?></h5>
                        <h4><?php echo $row['tip'] ?></h4>
                        <ul>
                            <li>Broj osoba: <?php echo $row['osobe'] ?></li>
                            <li>Površina sobe: <?php echo $row['povrsina'] ?> m2</li>
                            <li>Cijena: <?php echo $row['cijena'] ?> €</li>
                        </ul>
                        <?php if(!isset($_SESSION['prijava'])): ?>
                            <button type="button" data-toggle="modal" data-target="#login-modal">Rezerviraj</button>
                        <?php else: ?>
                            <button type="button" data-toggle="modal" data-target="#reservation-modal" data-room="<?php echo $row['ime'] ?>">Rezerviraj</button>
                        <?php endif ?>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
    </div>
</div>

</div>


<div id="login-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Prijava/Registracija</h4>
            </div>
            <div class="modal-body">

                <form id="form-prijava" method="POST">
                    <div class="col-sm-12">
                        <label>Prijavite se</label>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" name="username" placeholder="E-mail" required>
                    </div>
                    <div class="col-sm-6">
                        <input type="password" name="password" placeholder="Lozinka" required>
                    </div>
                    <div class="col-sm-6">
                        <input type="submit" value="Prijavi se">
                    </div>
                </form>

                <p class="message-prijava"></p>

                <form id="form-registracija" method="POST">
                    <div class="col-sm-12">
                        <label>Niste registrirani?</label>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" name="username" placeholder="Ime Prezime" required>
                    </div>
                    <div class="col-sm-6">
                        <input type="email" name="email" placeholder="E-mail" required>
                    </div>
                    <div class="col-sm-6">
                        <input type="tel" name="tel" placeholder="Telefon" required>
                    </div>
                    <div class="col-sm-6">
                        <input type="password" name="password" placeholder="Lozinka" required>
                    </div>
                    <div class="col-sm-6">
                        <input type="submit" value="Registriraj se">
                    </div>
                </form>

                <p class="message-registracija"></p>

            </div>
        </div>
    </div>
</div>


<div id="reservation-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Rezervacija</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="col-sm-6">
                        <label>Period od</label>
                        <input type="text" id="check-in" name="check-in" placeholder="Period od" required>
                    </div>
                    <div class="col-sm-6">
                        <label>Period do</label>
                        <input type="text" id="check-out" name="check-out" placeholder="Period do" required>
                    </div>
                    <input type="hidden" name="room">
                    <div class="col-sm-6">
                        <input name="reservation" type="submit" value="Rezerviraj">
                    </div>
                </form>
                <p class="message"></p>
            </div>
        </div>
    </div>
</div>

</div>

<?php require('footer.php') ?>