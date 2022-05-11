<?php

require "account/config.php";


function getEntries()
{
    $link = connect();
    $username = $_SESSION["username"];
    $query = "SELECT Today AS Date, Day, Reflection FROM `day` WHERE day.username = '$username' ORDER BY Date  DESC";
    $result = $link->query($query);

    while ($row = $result->fetch_array()) {
        $rows[] = $row;
    }

    $rowcount = 1;
    foreach ($rows as $row) {
        if (strcmp($row['Reflection'], "None") == 0 || $row['Reflection'] == null) {
            $reflect = "None";
        } else {
            $reflect = "Yes";
        }
        echo "<tr data-date =" . $row['Date'] . " onClick=location.href='day.php?day='+this.dataset.date><td>"
            . $row['Date'] . "</td><td>" . $row['Day'] . "</td><td>" . $reflect . "</td></tr>";
    }
}


function getDayOfWeek($day)
{
    $link = connect();
    /* create and send query */
    $query = "SELECT Day FROM day WHERE Today = '$day'";
    $result = $link->query($query);

    $row = $result->fetch_row();

    echo $row[0];

    /* free result set */
    $result->close();

    /* close connection */
    $link->close();
}

/*---------------------*/
/* GET ENTRY FUNCTIONS */
/*---------------------*/

function getMemVerse($day)
{
    $link = connect();
    $username = $_SESSION["username"];
    /* create and send query */
    $query = "SELECT MemoryVerse FROM day WHERE Today = '$day' AND day.username='$username'";
    $result = $link->query($query);

    $row = $result->fetch_row();

    /* free result set */
    $result->close();

    /* close connection */
    $link->close();

    //check if null and format accordingly
    if ($row[0] != null) {
        echo nl2br($row[0]);
    } else {
        echo " None ";
    }
}

function getGratitude($day)
{
    $link = connect();
    $username = $_SESSION["username"];

    /* create and send query */
    $query = "SELECT Gratitude FROM day WHERE Today = '$day' AND day.username = '$username'";
    $result = $link->query($query);

    $row = $result->fetch_row();

    /* free result set */
    $result->close();

    /* close connection */
    $link->close();

    if ($row[0] != null) {
        echo nl2br($row[0]);
    } else {
        echo " None ";
    }
}

function getPrayer($day)
{
    $link = connect();
    $username = $_SESSION["username"];
    /* create and send query */
    $query = "SELECT Prayer FROM day WHERE Today = '$day' AND day.username = '$username'";
    $result = $link->query($query);

    $row = $result->fetch_row();

    /* free result set */
    $result->close();

    /* close connection */
    $link->close();

    if ($row[0] != null) {
        echo nl2br($row[0]);
    } else {
        echo " None ";
    }
}

function getIntent($day)
{

    $link = connect();
    $username = $_SESSION["username"];
    /* create and send query */
    $query = "SELECT Intent FROM day WHERE Today = '$day' AND day.username = '$username'";
    $result = $link->query($query);

    $row = $result->fetch_row();

    /* free result set */
    $result->close();

    /* close connection */
    $link->close();

    if ($row[0] != null) {
        echo nl2br($row[0]);
    } else {
        echo " None ";
    }
}

function getKairos($day)
{
    $link = connect();
    $username = $_SESSION["username"];
    /* create and send query */
    $query = "SELECT Kairos FROM day WHERE Today = '$day' AND day.username = '$username'";
    $result = $link->query($query);

    $row = $result->fetch_row();

    /* free result set */
    $result->close();

    /* close connection */
    $link->close();

    if ($row[0] != null) {
        //$row[0] = str_replace(array("<br />", "<br/>"), "", $row[0]);
        echo nl2br($row[0]);
    } else {
        echo " None ";
    }
}



function getReflection($day)
{
    $link = connect();
    $username = $_SESSION["username"];
    /* create and send query */
    $query = "SELECT Reflection FROM day WHERE Today = '$day' AND day.username = '$username'";
    $result = $link->query($query);

    $row = $result->fetch_row();

    /* free result set */
    $result->close();

    /* close connection */
    $link->close();

    if ($row[0] != null) {
        echo $row[0];
    } else {
        echo " None ";
    }
}
/* LIST OF COLUMNS: Memory Verse, Gratitude, Prayer, Intent, Kairos, Reflection */



/*---------------------*/
/* NEW ENTRY FUNCTIONS */
/*---------------------*/



/*--------------------------*/
/* CREATE DATABASE & TABLES */
/*--------------------------*/

//check if database exists

//create database

//create tables
