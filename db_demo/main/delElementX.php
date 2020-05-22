<?php
$link = mysqli_connect("127.0.0.1", "root");
if (!$link) {
    exit("No connections was established");
} else {
    if (!$link->query("CREATE DATABASE IF NOT EXISTS messageboard") ||
        !$link->query("USE messageboard") ||
        !$link->query("CREATE TABLE IF NOT EXISTS entries(name varchar(30), entry varchar(255), entryNumber int NOT NULL PRIMARY KEY AUTO_INCREMENT)")) {
        exit("Table was not created");
    } else {
        $link->query("DELETE FROM entries WHERE entryNumber = ".$_GET['index']);
    }
}

?>
