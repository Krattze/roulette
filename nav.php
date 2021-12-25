<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $loggedin = true;
    $username = $_SESSION['username'];
    $userId = $_SESSION['userId'];
} else {
    $loggedin = false;
    $userId = 0;
}



if ($loggedin) {
    $sql = "SELECT `balance` FROM `users` WHERE `id`='$userId'";
    $result = mysqli_fetch_assoc(mysqli_query($conn, $sql));
    $balance = $result['balance'];
    if ($balance == NULL) {
        $balance = 0;
    }
    echo '
        <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand flex-grow-1" href="/">The best roulette</a>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link me-2" style="font-size: 20px;" href="#">Deposit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" style="font-size: 20px;" href="#" tabindex="-1" aria-disabled="true">Withdraw</a>
                    </li>
                    <li class="nav-item ">
                        <button class="btn btn-warning btn-free mx-3 my-1" >FreeCoins</button>
                    </li>
                    <li class="nav-item">
                        <div class="me-2 my-2" id="username" style="font-size:20px;color:white;">
                            Hello, ' . $username . '
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="me-2 my-2" id="balance" style="font-size:20px;color:white;">
                            Balance: <span id="balanceNumber">' . $balance . '</span>
                        </div>
                    </li>

                </ul>
                <a class="btn btn-success mx-2 btn-lg" href="/logout.php">LogOut</a>
            </div>
        </nav>
    </header>';
} else {
    echo '<header>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<div class="container-fluid">
				<a class="navbar-brand flex-grow-1" href="/">The best roulette</a>
				<button class="btn btn-success mx-2 btn-lg" data-bs-toggle="modal" data-bs-target="#logInModal">LogIn</button>
				<button class="btn btn-success mx-2 btn-lg" data-bs-toggle="modal" data-bs-target="#signUpModal">SignUp</button>
			</div>
		</nav>
	</header>';
}

if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true") {
    echo '<div class="container" ><div class="row" style="width: 90%;"><div id="my-alert" class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> You can now login.
          </div></div></div>';
  }
  if(isset($_GET['error']) && $_GET['signupsuccess']=="false") {
    echo '<div class="container"><div class="row" style="width: 90%;"><div id="my-alert" class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Warning!</strong> ' .$_GET['error']. '
          </div></div></div>';
  }
  if(isset($_GET['loginsuccess']) && $_GET['loginsuccess']=="true"){
    echo '<div class="container"><div class="row" style="width: 90%;"><div id="my-alert" class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> You are logged in
          </div></div></div>';
  }
  if(isset($_GET['loginsuccess']) && $_GET['loginsuccess']=="false"){
    echo '<div class="container" style="width: 90%;"><div class="row" style="width: 90%;"><div id="my-alert" class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Warning!</strong> Invalid Credentials
            </div></div></div>';
  }
