<?php
$showAlert = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'db_connect.php';
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];

    $sql = "SELECT * FROM `users` WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    $numExistRows = mysqli_num_rows($result);
    if ($numExistRows > 0) {
        $showError = "Username Already Exists";
        header("Location: /index.php?signupsuccess=false&error=$showError");
    } else {
        if (($password == $cpassword)) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql2 = "INSERT INTO `users` ( `username`, `email`, `password`) VALUES ('$username','$email', '$hash')";
            $result = mysqli_query($conn, $sql2);
            if ($result) {
                $showAlert = true;
                header("Location: /index.php?signupsuccess=true");
            }
        } else {
            $showError = "Passwords do not match";
            header("Location: /index.php?signupsuccess=false&error=$showError");
        }
    }
}
