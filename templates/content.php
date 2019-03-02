<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PokeAPI</title>
    <link rel="stylesheet" href="styles/reset.css">
    <link rel="stylesheet" href="styles/main.css">
</head>
<body>
    <!-- Search Bar -->
    <div class="searchBarContainer">
        
        <form action="" method="get" class="searchBarForm">
            <input type="text" name="name" placeholder="Looking for a Pokemon's stats ?" required value="<?= $name ?>" class="searchBar">
            <input type="image" src="pokeball.png" value="submit" class="searchBarSubmit">
        </form>
    </div>
    
    <div class="sprites">
        <img src="<?= $image_color_front; ?>" alt="<?= $name.' front sprite'?>">
        <img src="<?= $image_color_back ?>" alt="<?= $name ?>">
        <img src="<?php if($image_female_front == null){echo $image_color_front;} else{echo $image_female_front;} ?>" alt="<?= $name ?>">
        <img src="<?php if($image_female_back == null){echo $image_color_back;} else{echo $image_female_back;} ?>" alt="<?= $name ?>">
        <img src="<?= $image_shiny_back ?>" alt="<?= $name ?>">
        <img src="<?= $image_shiny_front ?>" alt="<?= $name ?>">
    </div>  

    <div class="pokemon_infos">
        <div class="pokemon_id"><h5>ID</h5><p><?= $id ?></p></div>
        <div class="pokemon_name"><h5>name</h5><p><?= $name ?></p></div>
        <div class="pokemon_type"><h5>type</h5><p><?= $type ?></p></div>
        <div class="pokemon_games">
            <h5>games</h5>
            <p>
            <?php
            for ($i=0; $i < $array_games; $i++)
            { 
                $games = $result->game_indices[$i]->version->name;
                echo $games.'</br>';
            }
            ?>
            </p>
        </div>
        <div class="pokemon_stats">
            <h5>Stats</h5>
            <p>HP : <?= $stats->_health_points; ?></p>
            <p>Speed : <?= $stats->_speed; ?></p>
            <p>Attack : <?= $stats->_attack; ?></p>
            <p>Attack Spe. : <?= $stats->_attack_spe; ?></p>
            <p>Defense : <?= $stats->_defense_spe; ?></p>
            <p>Defense Spe. : <?= $stats->_defense; ?></p>
        </div>
    </div>
    

    <!-- Script in scripts/app.js -->
    <script type="text/javascript" src="scripts/app.js"></script>
</body>
</html>