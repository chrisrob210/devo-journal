<?php
require "db.func.php";

session_start();

// Check if the user is already logged in, if no then redirect him to login page
if (!(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)) {
    header("location: account/login.php");
    exit;
}

$date = htmlspecialchars($_GET['date']);
$day = htmlspecialchars($_GET['day']);
$memverse = nl2br(htmlentities($_GET['memoryverse']));
$gratitude = nl2br(htmlentities($_GET['gratitude']));
$prayer = nl2br(htmlentities($_GET['prayer']));
$intent = nl2br(htmlentities($_GET['intent']));
$kairos = nl2br(htmlentities($_GET['kairos']));
$reflection = nl2br(htmlentities($_GET['reflection']));

// echo "Week Of: " . $weekOf . "<br>";
// echo "Date: " . $date . "<br>";
// echo "Day: " . $day . "<br>";
// echo "Verse: " . $memverse . "<br>";
// echo "Gratitude: " . $gratitude . "<br>";
// echo "Prayer: " . $prayer . "<br>";
// echo "Intent: " . $intent . "<br>";
// echo "Kairos: " . $kairos . "<br>";
// echo "Reflection: " . $reflection . "<br>";

// $mysqli = connect();
// $username = $_SESSION["username"];
// $query = "SELECT WeekDate FROM week WHERE WeekDate = '$weekOf'";
//$result = $mysqli->query($query);


// if ($result->num_rows == null) {
//     echo "<script>console.log('Entry Does Not Exist!')</script>";
//     $query = "INSERT INTO `week` (`username`,`WeekDate`) VALUES ('$username','$weekOf')";
//     $result = $mysqli->query($query);
//     /* free result set */
//     // $result->close();


// }
// /* close connection */
// $mysqli->close();
$username = $_SESSION["username"];
$mysqli = connect();
//$query = "INSERT INTO `day` (`username`, `Today`, `Day`, `MemoryVerse`, `Gratitude`, `Prayer`, `Intent`, `Kairos`, `Reflection`) VALUES ('$username', '$date', '$day', '$memverse', '$gratitude', '$prayer', '$intent', '$kairos', '$reflection')";
$stmt = $mysqli->prepare("INSERT INTO `day` (`username`, `Today`, `Day`, `MemoryVerse`, `Gratitude`, `Prayer`, `Intent`, `Kairos`, `Reflection`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssssss", $username, $date, $day, $memverse, $gratitude, $prayer, $intent, $kairos, $reflection);
$stmt->execute();

// if (!$mysqli->query($query)) {
//     echo ("Error description: " . $mysqli->error);
// }

/* free result set */
//$result->close();

/* close connection */
$mysqli->close();
//$day = date("Y-m-d");
header("location: index.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "$day Entry"; ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    <script src="js/date.js" defer></script>
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
                        <a class="nav-link devo" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link devo" href="entry.php">New Entry</a>
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
        <h1>Devotional Journal</h1>
        <h3>Entry Added</h3>
        <section class="history">
            <div class="entry">
                <div class="entry-banner">


                    <div class="entry-col" data-day="" id="currentday"></div>
                    <div class="entry-col" data-date="" id="currentdate"></div>

                </div>
                <div class="entry-row">
                    <div class='entry-col'>
                        <article class='daily'>
                            <h5>Memory Verse</h5>
                            <div class='txt-lft'>
                                <?php getMemVerse($date); ?>
                            </div>
                        </article>
                        <article class='daily'>
                            <h5>Gratitude</h5>
                            <div class='txt-lft'>
                                <?php getGratitude($date); ?>
                            </div>
                        </article>
                        <article class='daily'>
                            <h5>Prayer</h5>
                            <div class='txt-lft'>
                                <?php getPrayer($date); ?>
                            </div>
                        </article>
                        <article class='daily'>
                            <h5>Intent</h5>
                            <div class='txt-lft'>
                                <?php getIntent($date); ?>
                            </div>
                        </article>
                    </div>
                    <div class='entry-col'>
                        <article class='daily'>
                            <h5>Kairos</h5>
                            <div class='txt-lft'>
                                <?php getKairos($date); ?>
                            </div>
                        </article>
                        <article class='daily'>
                            <h5>Reflection</h5>
                            <div class='txt-lft'>
                                <?php getReflection($date); ?>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="entry-banner">
                </div>
                <div class="spacer"></div>
            </div>
        </section>
    </div>

</body>

</html>