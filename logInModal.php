<div class="modal fade" id="logInModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-dark text-white ">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">LogIn</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/logIn.php" method="post">
                    <div class="text-left my-2 ">
                        <label for="username">Username</label>
                        <input class="form-control" id="loginusername" name="loginusername" placeholder="Enter Your Username" type="text" required>
                    </div>
                    <div class="text-left my-2">
                        <label for="password">Password</label>
                        <input class="form-control" id="loginpassword" name="loginpassword" placeholder="Enter Your Password" type="password" required data-toggle="password">
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
                <p class="mb-0 mt-1">Don't have an account? <a href="#" data-dismiss="modal" data-bs-toggle="modal" data-bs-target="#signUpModal">Sign up now</a>.</p>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="signUpModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-dark text-white">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">SignUp</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/signUp.php" method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input class="form-control" id="username" name="username" placeholder="Your Username" type="text" required minlength="3" maxlength="11">
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email" required>
                        </div>
                        <div class="text-left my-2">
                            <label for="password">Password:</label>
                            <input class="form-control" id="password" name="password" placeholder="Enter Password" type="password" required data-toggle="password" minlength="4" maxlength="21">
                        </div>
                        <div class="text-left my-2">
                            <label for="password1">Renter Password:</label>
                            <input class="form-control" id="cpassword" name="cpassword" placeholder="Renter Password" type="password" required data-toggle="password" minlength="4" maxlength="21">
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                </form>
                <p class="mb-0 mt-1">Already have an account? <a href="#" data-dismiss="modal" data-bs-toggle="modal" data-bs-target="#logInModal">Login here</a>.</p>
            </div>
        </div>
    </div>
</div>