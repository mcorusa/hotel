<?php require('header.php') ?>

<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <label>Dodaj novu sobu</label>
            <form method="post" enctype="multipart/form-data">
                <div class="col-sm-3">Slika:</div>
                <div class="col-sm-9"><input type="file" name="slika"><br/></div>
                <div class="col-sm-3">Ime:</div>
                <div class="col-sm-9"><input type="text" name="ime"><br/></div>
                <div class="col-sm-3">Tip:</div>
                <div class="col-sm-9"><input type="text" name="tip"><br/></div>
                <div class="col-sm-3">Broj osoba:</div>
                <div class="col-sm-9"><input type="number" name="osobe"><br/></div>
                <div class="col-sm-3">Površina m2:</div>
                <div class="col-sm-9"><input type="number" name="povrsina"><br/></div>
                <div class="col-sm-3">Cijena €:</div>
                <div class="col-sm-9"><input type="number" name="cijena"><br/></div>

                <input type="hidden" name="dodaj_sobu" />

                <div class="col-sm-3"><input type="submit" value="Spremi" name="submit"></div>
            </form>

            <?php
                // Konekcija na bazu
                require('connection.php');

                if(isset($_POST['dodaj_sobu'])) {

                    $target_dir = "images/";
                    $target_file = $target_dir . basename($_FILES["slika"]["name"]);
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                    move_uploaded_file($_FILES["slika"]["tmp_name"], $target_file);

                    $slika = $target_file;
                    $ime = $_POST['ime'];
                    $tip = $_POST['tip'];
                    $osobe = $_POST['osobe'];
                    $povrsina = $_POST['povrsina'];
                    $cijena = $_POST['cijena'];

                    $sql = "INSERT INTO sobe (slika, ime, tip, osobe, povrsina, cijena) VALUES ('$slika', '$ime', '$tip', '$osobe', '$povrsina', '$cijena')";
                    $result = $conn->query($sql);

                    echo 'Uspješno spremanje!';
                }

            ?>

        </div>

        <div class="col-sm-6">
            <label>Izbriši postojeću sobu</label>
            <form method="post" enctype="multipart/form-data">
                <div class="col-sm-3">Izaberi sobu:</div> 
                <div class="col-sm-9">
                    <select name="id_sobe">
                        <?php
                            $sql = "SELECT id, ime FROM sobe";
                            $result = $conn->query($sql);

                            if($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo '<option value="'.$row['id'].'">'.$row['ime'].'</option>';
                                }
                            }
                        ?>
                    </select>
                </div>

                <input type="hidden" name="izbrisi_sobu" />

                <div class="col-sm-12"><input type="submit" value="Izbriši" name="submit"></div>
            </form>

            <?php
                if(isset($_POST['izbrisi_sobu'])) {
                    $id = $_POST['id_sobe'];
                    $sql = "DELETE FROM sobe WHERE id=$id";
                    $result = $conn->query($sql);
                    echo 'Uspješno brisanje!';
                }
            ?>

        </div>
    </div>

    </br></br>

    <div class="row">
        <div class="col-sm-6">
            <label>Izmjeni sobu</label>
            <form method="post" enctype="multipart/form-data">
                <div class="col-sm-3">Izaberi sobu:</div> 
                <div class="col-sm-9">
                    <select name="id_sobe">
                        <?php
                            $sql = "SELECT id, ime FROM sobe";
                            $result = $conn->query($sql);

                            if($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo '<option value="'.$row['id'].'">'.$row['ime'].'</option>';
                                }
                            }
                        ?>
                    </select>
                </div>
                <div class="col-sm-3">Slika:</div>
                <div class="col-sm-9"><input type="file" name="slika"><br/></div>
                <div class="col-sm-3">Ime:</div>
                <div class="col-sm-9"><input type="text" name="ime"><br/></div>
                <div class="col-sm-3">Tip:</div>
                <div class="col-sm-9"><input type="text" name="tip"><br/></div>
                <div class="col-sm-3">Broj osoba:</div>
                <div class="col-sm-9"><input type="number" name="osobe"><br/></div>
                <div class="col-sm-3">Površina m2:</div>
                <div class="col-sm-9"><input type="number" name="povrsina"><br/></div>
                <div class="col-sm-3">Cijena €:</div>
                <div class="col-sm-9"><input type="number" name="cijena"><br/></div>

                <input type="hidden" name="izmjeni_sobu" />

                <div class="col-sm-3"><input type="submit" value="Spremi" name="submit"></div>
            </form>

            <?php

                if(isset($_POST['izmjeni_sobu'])) {

                    $target_dir = "images/";
                    $target_file = $target_dir . basename($_FILES["slika"]["name"]);
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                    move_uploaded_file($_FILES["slika"]["tmp_name"], $target_file);

                    $id = $_POST['id_sobe'];
                    $slika = $target_file;
                    $ime = $_POST['ime'];
                    $tip = $_POST['tip'];
                    $osobe = $_POST['osobe'];
                    $povrsina = $_POST['povrsina'];
                    $cijena = $_POST['cijena'];

                    $sql = "UPDATE sobe SET ";
                    $sql .= ($slika != $target_dir . basename('')) ? "slika='$slika'," : '';
                    $sql .= ($ime != '') ? "ime='$ime'," : '';
                    $sql .= ($tip != '') ? "tip='$tip'," : '';
                    $sql .= ($osobe != '') ? "osobe='$osobe'," : '';
                    $sql .= ($povrsina != '') ? "povrsina='$povrsina'," : '';
                    $sql .= ($cijena != '') ? "cijena='$cijena'," : '';

                    $sql = rtrim($sql, ',');

                    $sql .= " WHERE id=$id";
                    $result = $conn->query($sql);

                    echo 'Uspješna izmjena!';
                }

            ?>

        </div>
    </div>

</div>

<?php require('footer.php') ?>