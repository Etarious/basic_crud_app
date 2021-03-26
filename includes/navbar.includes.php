<div class="collapse" id="navbarToggleExternalContent">
    <div class="bg-dark p-4">
        <h5 class="text-white h4">CRUD APP</h5>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="./">Basic CRUD App</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link <?php if ($_SERVER["REQUEST_URI"] == "/basic_crud_app/") echo "active"; ?>" aria-current="page" href="./">Home</a>
                        <?php
                        if (empty($_SESSION)) {
                            # No user is logged in...
                        ?>
                            <a class="nav-link <?php if ($_SERVER["REQUEST_URI"] == "/basic_crud_app/login.php") echo "active"; ?>" href="./login.php">Login</a>
                            <a class="nav-link <?php if ($_SERVER["REQUEST_URI"] == "/basic_crud_app/register.php") echo "active"; ?>" href="./register.php">Register</a>
                            <?php
                        } else {
                            # A user could be logged in...
                            if (isset($_SESSION["username"])) {
                                # A user is logged in...
                            ?>
                                <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                                    <ul class="navbar-nav">
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <?php echo $_SESSION["username"] ?>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                                                <li><a class="dropdown-item  <?php if ($_SERVER["REQUEST_URI"] == "/basic_crud_app/profile.php") echo "active"; ?>" href="./profile.php">Profile</a></li>
                                                <li><a class="dropdown-item  <?php if ($_SERVER["REQUEST_URI"] == "/basic_crud_app/reset_password.php") echo "active"; ?>" href="./reset_password.php">Reset Password</a></li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li><a class="dropdown-item text-danger" href="./logout.php">Logout</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                        <?php
                            }
                        }
                        ?>

                        <!-- <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a> -->

                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>
<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>