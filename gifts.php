<?php


require "Database.php";
require "config.php";

$config = require("config.php");

$db = new Database($config["database"]);
$gifts = $db->query("SELECT * FROM gifts")->fetchAll(PDO::FETCH_ASSOC); 


echo"<ol>";
foreach ($gifts as $gift) {
echo "<li> $gift[name]</li> ";
echo "<li> $gift[count_available]</li> ";

}
echo"</ol>";


?>



