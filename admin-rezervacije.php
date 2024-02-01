<?php 

    require('connection.php');

    if(isset($_POST['obrisi_rezervaciju'])) {
        $id = $_POST['obrisi_rezervaciju'];
        $sql = "DELETE FROM reservations WHERE id=$id";
        $result = $conn->query($sql);
        header('Location: admin-rezervacije.php');

    }

    $reservations = [];

    require('header.php');

    if($_SESSION['admin'] == true) {

        

        $sql = "SELECT id, name, email, tel, check_in, check_out, room FROM reservations";
        $result = $conn->query($sql);

        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                array_push($reservations, [$row['id'], $row['name'], $row['email'], $row['tel'], $row['check_in'], $row['check_out'], $row['room']]);
            }
        }
    }

?>

<div class="reservations-container container">
    <table class="table table-striped">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Ime Prezime</th>
        <th scope="col">E-mail</th>
        <th scope="col">Telefon</th>
        <th scope="col">Period od</th>
        <th scope="col">Period do</th>
        <th scope="col">Soba</th>
        </tr>
    </thead>
    <tbody>
    <?php 
    foreach($reservations as $item) {
        print '<tr>'
            . '<th scope="row">'.$item[0].'</th>'
            . '<td>'.$item[1].'</td>'
            . '<td>'.$item[2].'</td>'
            . '<td>'.$item[3].'</td>'
            . '<td>'.$item[4].'</td>'
            . '<td>'.$item[5].'</td>'
            . '<td>'.$item[6].'</td>'
            . '<td>'
            . '<form method="POST">'
            . '<input type="hidden" name="obrisi_rezervaciju" value="'.$item[0].'">'
            . '<input type="submit" value="Obriši">'
            . '</form>'
            . '</td>'
            . '</tr>';
    } 
    ?>
    </tbody>
    </table>
</div>



<?php require('footer.php'); ?>