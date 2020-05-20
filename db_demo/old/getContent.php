<?php
$entry = '';
$pdo = new PDO('mysql:host=localhost;dbname=messageboard','root');
$statement = $pdo->prepare("SELECT name, entry FROM entries");
$statement->bindParam(1, $name);
$statement->bindParam(2,$entry);
$statement->execute();

while($row = $statement->fetch())
{
    echo '<li> <div class="entry"> <table><tr><td class="header">'. $row['name'].'</td></tr><tr><td>'.$row['entry'].'</td></tr></table></div></li></br>';
}
?>