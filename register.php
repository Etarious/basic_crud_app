<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("./includes/head.includes.php") ?>
    <title>Register</title>
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
                    require_once("./process/register_process.php");
                    ?>
                </div>
                <h2 class="mb-2">Register Form</h2>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="name" name="username" class="form-control" id="username" placeholder="Username: e.g. John123" value="<?php if (isset($_POST["username"])) echo $_POST["username"] ?>">
                </div>
                <div class=" mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email: e.g. john@email.com" value="<?php if (isset($_POST["email"])) echo $_POST["email"] ?>">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" aria-describedby="passwordHelp" placeholder="Password: e.g. Password123">
                    <div id=" passwordHelp" class="form-text">Password must be 8 characters or more, and must include upper case, lower case and other characters
                </div>
        </div>
        <div class="mb-3">
            <label for="confirm" class="form-label">Confirm Password</label>
            <input type="password" name="confirm" class="form-control" id="confirm" aria-describedby="confirmHelp" placeholder="Same as Password">
            <div id="confirmHelp" class="form-text">Must be same as Password</div>
        </div>
        <input type="submit" name="submit" value="Submit" class="btn btn-primary">
        </form>

    </div>
    </div>

    <?php include("./includes/footer.includes.php") ?>

    <?php include("./includes/scripts.includes.php") ?>
</body>

</html>