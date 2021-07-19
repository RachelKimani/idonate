<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0,
            minimum-scale=1.0 ">

    <link rel="icon" type="image/png" href="../images/3.png">
    <link rel="stylesheet" type="text/css" href="../Processes/Header.css">
    <link rel="stylesheet" type="text/css" href="../Processes/page.css">
    <link rel="stylesheet" type="text/css" href="../Processes/Home.css">
    <link rel="stylesheet" type="text/css" href="Login_Register.css">
    <title>idonate</title>
</head>

<body>
    <header>
        <div class="container">
            <nav>
                <div class="nav-brand">
                    <a href="../Index/idonate_home.php"> <img src="../images/6.png" alt="" style="outline: none"> </a>
                </div>

                <div class="menu-icons open">
                    <img src="../images/menu.png" alt="">
                </div>

                <ul class="nav-list">
                    <div class="menu-icons close">
                        <i><img src="../images/close.png" alt=""></i>
                    </div>

                    <li class="nav-item">
                        <a href="../Index/idonate_home.php" class="nav-link">Home</a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">About US</a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">Reach Us</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
    	<section class="all"></section>
    <!--            sign up form-->
            <div class="sign-up">
                <p>Sign Up</p>
                <span>Kindly fill in the details below to create your account.</span>
                <div class="sign-up-form>
                    <form action="login_register.php" method="POST">
                        <div class="fields">
                            <label for="fn">First Name</label>
                            <label for="ln">Last Name</label><br>
                            <input type="text" name="first_name" required minlength="2" maxlength="12" id="fn">
                            <input type="text" name="last_name" required minlength="2" maxlength="12" id="ln">
                        </div>
                        <div class="fields">
                            <label for="ph">Phone</label>
                            <label for="ad">Address</label><br>
                            <input type="number" name="phone" required minlength="2" maxlength="10" id="ph">
                            <input type="text" name="address" required minlength="2" maxlength="15" id="ad">
                        </div>
                        <div class="fields">
                            <label for="em">Email</label>
                            <label for="user">Username</label><br>
                            <input type="email" name="email" required id="em">
                            <input type="text" name="sign_username" required minlength="6" maxlength="10" id="user">
                        </div>
                        <div class="fields">
                            <label for="spa">Password</label>
                            <label for="cp">Confirm Password</label><br>
                            <input type="password" name="sign_password" required minlength="8" id="spa">
                            <input type="password" name="cp"  required minlength="8" id="cp">
                        </div>
                        <div class="cta">
                            <span>By creating an account you agree to our <i><a href="#">Terms & Privacy</a></i>.</span>
                            <input class="btn" type="submit" name="sign-up-button" value="Submit">
                            <a href="#" class="btn">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>

            <!--            login form-->
            <div class="login">
                <p>Login</p>
                <form action="Login_Register.php" method="POST">
                    <div class="login-form">
                        <label for="us">Username</label>
                        <input type="text" name="username" placeholder="Enter Username" required minlength="6" id="us">
                        <label for="pa">Password</label>
                        <input type="password" name="password" placeholder="Enter Password" required minlength="8" id="pa">
                    </div>
                    <div class="l-cta">
                        <input class="btn" type="submit" value="Login" name="login-button">
                        <a href="#" class="forgot"><i>Forgot Password?</i></a>
                    </div>
                </form>
            </div>

    </main>
    <script type="text/javascript" src="../Processes/Side_Navigation.js"></script>
</body>
</html>