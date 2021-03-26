<?php

session_start();

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("./includes/head.includes.php") ?>
    <title>Basic CRUD App</title>
</head>

<body>

    <div class="wrapper">
        <?php
        include("./includes/navbar.includes.php");
        ?>

        <div class="content">
            <?php
            if (!empty($_SESSION)) {
                # A user could be logged in...
                if (isset($_SESSION["username"])) {
                    # A user is logged in...
            ?>
                    <h1 class="h1 animate__animated animate animate__bounce animate__infinite	infinite">Welcome, <?php echo $_SESSION["username"] ?>!!!</h1>
                    <small><em>Just a dummy app...</em></small>
                    <div class="h3">Check out your profile</div>
                <?php
                }
            } else {
                # No user is logged in...
                ?>
                <h1 class="animate__animated animate animate__bounce animate__infinite	infinite">BASIC CRUD APPLICATION!</h1>
                <div><a href="./login.php" class="btn btn-success">Log in</a> to test run the app!</div>
                <div><strong>Please Note:</strong> Do not input your real data to this app, this is not a live app!</div>
            <?php
            }
            ?>
        </div>
    </div>

    <?php include("./includes/footer.includes.php") ?>


    <?php include("./includes/scripts.includes.php") ?>
</body>

</html>