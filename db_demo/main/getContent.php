<?php
$entry = '';
$pdo = new PDO('mysql:host=localhost;dbname=messageboard', 'root');
$statement = $pdo->prepare("SELECT name, entry, entryNumber FROM entries");
$statement->bindParam(1, $name);
$statement->bindParam(2, $entry);
$statement->bindParam(3, $entryNumber);
$statement->execute();

while ($row = $statement->fetch()) {
    echo '<li id="listelement_' . $row['entryNumber'] . '"><div class="entry"> <table style=" display: block;"><tr style="width: 50%;"><td class="header">' . $row['name'] . '</td><td></td></tr><tr><td>' . $row['entry'] . '</td><td class="alignright"><button class="deletebutton" name="delElement" onclick="removeElement(' . $row['entryNumber'] . ')">  <img class="filterColor" src="cancel.svg" alt="cancelimage" height="20" width="20"> </button></td> </tr></table></div> </li> </br>';
}
?>


