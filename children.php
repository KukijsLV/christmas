<?php

require "Database.php";
require "config.php";

$config = require("config.php");

$db = new Database($config["database"]);
$children = $db->query("SELECT * FROM children")->fetchAll(PDO::FETCH_ASSOC); 
$letters = $db->query("SELECT * FROM letters")->fetchAll(); 

?>

<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ziemassvētku Vēstules</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: url('https://example.com/christmas-background.jpg') no-repeat center center fixed;
            background-size: cover;
            color: white;
            text-align: center;
            padding: 20px;
            margin: 0;
        }
        h1 {
            color: #ff0000;
            text-shadow: 1px 1px 4px rgba(0,0,0,0.3);
            font-size: 28px;
            margin-bottom: 20px;
        }
        .card {
            background-color: rgba(255, 255, 255, 0.8);
            margin: 8px;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 0 8px rgba(0,0,0,0.2);
            max-width: 300px;
            margin-left: auto;
            margin-right: auto;
            border: 2px solid #ff6347;
            font-size: 14px;
        }
        .card p {
            line-height: 1.4;
            margin: 5px 0;
        }
        .card p strong {
            font-size: 16px;
            color: #ff6347;
        }
        .header {
            margin-bottom: 20px;
            font-size: 30px;
            font-weight: bold;
            color: #ff6347;
            text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.5);
        }
        .tree {
            font-size: 35px;
            color: green;
        }
        .snowflakes {
            font-size: 24px;
            color: white;
        }
        .letter {
            font-style: italic;
            color: #2e8b57;
            font-size: 14px;
        }
        .gift-icon {
            font-size: 20px;
            color: gold;
        }
        ul {
            padding: 0;
            list-style-type: none;
        }
    </style>
</head>
<body>

    <div class="header">Ziemassvētku Vēstules</div>

    <div class="snowflakes">❄️ ❄️ ❄️</div>
    <div class="tree">🎄</div>

    <ul>
        <?php foreach ($children as $child) { ?>
            <li class="card">
                <p><strong><?php echo $child["firstname"] . " " . $child["middlename"] . " " . $child["surname"]; ?></strong></p>
                <p>Vecums: <?php echo $child["age"]; ?> gadi</p>
                
                <p><strong>Vēstule: </strong>
                    <?php 
                    foreach ($letters as $letter) {
                        if ($letter["sender_id"] == $child["id"]) {
                            echo "<span class='letter'>" . $letter["letter_text"] . "</span>";
                            break; 
                        }
                    }
                    ?>
                </p>

                <p class="gift-icon">🎁</p>
            </li>
        <?php } ?>
    </ul>

    <div class="snowflakes">❄️ ❄️ ❄️</div>

</body>
</html>
