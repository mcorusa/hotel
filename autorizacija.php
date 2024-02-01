<?php

    session_start();

    if(!isset($_POST['odjava'])) {

        $response = 'false';

        require('connection.php');

        if(!isset($_POST['email'])) {

            $sql = "SELECT name, email, tel, username, password, role FROM users";
            $result = $conn->query($sql);
        
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    if($row["username"] == $_POST['username'] && $row["password"] == $_POST['password']) {

                        $_SESSION['prijava'] = true;

                        if($row["role"] == 'administrator') {
                            $_SESSION['admin'] = true;
                        }
                        if($row["role"] == 'user') {
                            $_SESSION['user'] = true;
                        }

                        $_SESSION['name'] = $row["name"];
                        $_SESSION['email'] = $row["email"];
                        $_SESSION['tel'] = $row["tel"];
                        
                        $response = 'true';
                    }
                }
            } 
        }
        else {

            $name = $_POST['username'];
            $email = $_POST['email'];
            $tel = $_POST['tel'];
            $username = $email;
            $password = $_POST['password'];

            $sql = "SELECT username, password, role FROM users";
            $result = $conn->query($sql);

            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    if($row["username"] == $_POST['email']) {
                        $response = 'email';
                    }
                }
            }

            if($response != 'email') {

                $sql = "INSERT INTO users (name, email, tel, username, password, role) VALUES ('$name', '$email', '$tel', '$username', '$password', 'user')";
                $result = $conn->query($sql);

                $_SESSION['prijava'] = true;
                $_SESSION['user'] = true;

                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                $_SESSION['tel'] = $tel;

                $response = 'true';
            }

        }

        print $response;
    }
    else {
        session_unset(); 
        session_destroy();
        header('Location: index.php');
    }

?>