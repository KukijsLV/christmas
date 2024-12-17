<?php


require "Database.php";
require "config.php";

$config = require("config.php");

$db = new Database($config["database"]);
$children = $db->query("SELECT * FROM children")->fetchAll(PDO::FETCH_ASSOC); 


echo"<ul>";
foreach ($children as $children) {
echo "<li> $children[firstname]</li> ";
echo  "<ul>$children[middlename] </ul>";
echo  "<ul><ul>$children[surname]</ul> </ul>";
echo  "<ul><ul> <ul>$children[age]</ul> </ul> </ul>";
}
echo"</ul>";


?>