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

    if ($loggedin) {
        $sql = "SELECT `balance` FROM `users` WHERE `id`='$userId'";
        $result = mysqli_fetch_assoc(mysqli_query($conn, $sql));
        $balance = $result['balance'];
        if ($balance == 0) {
            $balance = 1000;
            $sql2 = "UPDATE `users` SET `balance` = '$balance' WHERE `id` = '$userId'";
            mysqli_query($conn, $sql2);
            echo json_encode(array('success' => 1, 'freeBalance' => $balance));
        } else {
            echo json_encode(array('success' => 0));
        }
    }
}
