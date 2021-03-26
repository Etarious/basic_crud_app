<?php

session_start();

if (empty($_SESSION)) {
    # A user could be logged in already...
    header("Location: ./");
}else{
    if (!isset($_SESSION["username"])) {
        # A user is logged in...
        header("Location: ./");
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("./includes/head.includes.php") ?>
    <title>Reset Password</title>
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
                    require_once("./process/reset_password_process.php");
                    ?>
                </div>
                <h2 class="mb-2">Reset Password</h2>
                <div class="mb-3">
                    <label for="oldPassword" class="form-label">Old Password</label>
                    <input type="password" name="oldPassword" class="form-control" id="oldPasswordHelp" placeholder="Old Password: e.g. Password123">
                </div>
                <div class="mb-3">
                    <label for="newPassword" class="form-label">New Password</label>
                    <input type="password" name="newPassword" class="form-control" id="newPassword" aria-describedby="newPasswordHelp" placeholder="New Password: e.g. Password123">
                </div>
                <input type="submit" name="submit" value="Submit" class="btn btn-primary">
            </form>
        </div>



    </div>

    <?php include("./includes/footer.includes.php") ?>

    <?php include("./includes/scripts.includes.php") ?>
</body>

</html>