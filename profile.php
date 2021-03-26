<?php

session_start();

if (empty($_SESSION)) {
    # A user could be logged in already...
    header("Location: ./");
} else {
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
    <title>Profile</title>
</head>

<body>

    <div class="wrapper">
        <?php
        include("./includes/navbar.includes.php");
        ?>

        <div class="content">
            <h1>WORKING!!!</h1>
            <a href="./reset_password.php" class="btn btn-success">Reset Password</a>
        </div>
    </div>

    <?php include("./includes/footer.includes.php") ?>


    <?php include("./includes/scripts.includes.php") ?>
</body>

</html>