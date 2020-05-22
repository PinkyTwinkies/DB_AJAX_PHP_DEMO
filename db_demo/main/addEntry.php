<?php
$link = mysqli_connect("127.0.0.1","root");
if(!$link)
{
    exit("Database was not created");
}
else
{
    if(!$link->query("CREATE DATABASE IF NOT EXISTS messageboard") ||
        !$link->query("USE messageboard") ||
        !$link->query("CREATE TABLE IF NOT EXISTS entries(name varchar(30), entry varchar(255), entryNumber int NOT NULL PRIMARY KEY AUTO_INCREMENT)") )
        {
            exit("Table was not created");
        }
}
if (!($statement = $link->prepare("INSERT INTO entries(name, entry) VALUES (?,?)"))) {
    echo "Prepare failed: (" . $link->errno . ") " . $link->error;
}
if (!$statement->bind_param("ss", $_GET['name'], $_GET['entry'])) {
    echo "Binding parameters failed: (" . $statement->errno . ") " . $statement->error;
}
if (!$statement->execute()) {
    echo "Execute failed: (" . $statement->errno . ") " . $statement->error;
}
include 'getContent.php';
?>