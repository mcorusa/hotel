<?php
    session_start();

    require('connection.php');

    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $tel = $_SESSION['tel'];
    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];
    $room = $_POST['room'];

    $sql = "INSERT INTO reservations (name, email, tel, check_in, check_out, room) VALUES ('$name', '$email', '$tel', '$check_in', '$check_out', '$room')";

    if ($conn->query($sql) === TRUE) {
        print "Rezervacija uspješna!";
    } else {
        print "Rezervacija neuspješna, pokušajte kasnije!";
    }
    
    $conn->close();

?>