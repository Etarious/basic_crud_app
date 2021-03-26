<?php

session_start();

if (!empty($_SESSION)) {
    # A user could be logged in already...
    if (isset($_SESSION["username"])) {
        # A user is logged in...
        header("Location: ./");
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("./includes/head.includes.php") ?>
    <title>Login</title>
</head>

<body>

    <div class="wrapper">
        <?php
        include("./includes/navbar.includes.php");
        ?>

        <div class="content">
            <form method="POST">
                <div>
                    <?php
                    require_once("./process/login_process.php");
                    ?>
                </div>
                <h2 class="mb-2">Login Form</h2>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="name" name="username" class="form-control" id="username" placeholder="Username: e.g. John123" value="<?php if (isset($_POST["username"])) echo $_POST["username"] ?>">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" aria-describedby="passwordHelp" placeholder="Password: e.g. Password123">
                </div>
                <input type="submit" name="submit" value="Submit" class="btn btn-primary"> <span>Not yet registered? <a href="./register.php">Register</a></span>
                <div><a href="./forgot_password.php">Forgot password?</a></div>
            </form>
        </div>

        

    </div>

    <?php include("./includes/footer.includes.php") ?>

    <?php include("./includes/scripts.includes.php") ?>
</body>

</html>