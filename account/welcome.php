<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/main.css">
    <style>
        body {
            font: 14px sans-serif;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-devo">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link devo" href="index.php">Journal<span class="sr-only">(current)</span></a>
                    </li>
                </ul>
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle devo" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo htmlspecialchars($_SESSION["username"]);
                        ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item devo-dropdown" href="account/welcome.php">Account Settings</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item devo-dropdown-warn" href="account/logout.php">Logout</a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <div class="container">
        <h3 class="my-1 mb-5"> <?php echo htmlspecialchars($_SESSION["username"]); ?>'s account settings:</h3>
        <ul class="no-style devo-align-left">
            <div>
                <li class="p-1">
                    <a href="../index.php" class="btn btn-light col devo">Return to Journal</a>
                </li>
                <li class="p-1">
                    <a href="reset-password.php" class="btn btn-warning col devo">Reset Your Password</a>
                </li>
                <li class="p-1">
                    <a href="logout.php" class="btn btn-danger col devo-red">Sign Out of Your Account</a>
                </li>
            </div>
        </ul>

    </div>
</body>

</html>