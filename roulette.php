<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'db_connect.php';
    session_start();
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        $loggedin = true;
        $username = $_SESSION['username'];
        $userId = $_SESSION['userId'];
    } else {
        $loggedin = false;
    }

    $betAmount = $_POST["betAmount"];
    $color = $_POST["color"];


    if ($loggedin) {
        if ($betAmount > 0) {
            $sql = "SELECT `balance` FROM `users` WHERE `id`='$userId'";
            $result = mysqli_fetch_assoc(mysqli_query($conn, $sql));
            $balance = $result['balance'];
            if ($balance >= $betAmount) {
                $newBalance = $balance - $betAmount;
                $oldBalance = $newBalance;
                $rand = rand(0, 14);
                if ($rand == 0) {
                    $randColor = 'green';
                } else if ($rand <= 7) {
                    $randColor = 'red';
                } else {
                    $randColor = 'black';
                }
                $sql3 = "INSERT INTO `rolls` ( `roll`, `color`) VALUES ('$rand','$randColor')";
                mysqli_query($conn, $sql3);
                $win = 0;
                if (($color == $randColor) && ($color == "green")) {
                    $newBalance = $balance + $betAmount * 13;
                    $win = 1;
                } else if ($color == $randColor) {
                    $newBalance = $balance + $betAmount;
                    $win = 1;
                }
                $sql2 = "UPDATE `users` SET `balance` = '$newBalance' WHERE `id` = '$userId'";
                mysqli_query($conn, $sql2);
                echo json_encode(array('success' => 1, 'balance' => $newBalance, 'rand' => $rand, 'oldBalance' =>  $oldBalance, 'username' =>  $username, 'win' => $win));
            } else {
                echo json_encode(array('success' => 0, 'error' => 'You do not have enough balance to place this bet'));
            }
        } else {
            echo json_encode(array('success' => 0, 'error' => 'Your bet must be above 0'));
        }
    } else {
        echo json_encode(array('success' => 0, 'error' => 'LogIn to place bets'));
    }
}
