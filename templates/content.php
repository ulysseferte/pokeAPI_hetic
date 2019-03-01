<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pokeAPI</title>
    <link rel="stylesheet" href="styles/reset.css">
    <link rel="stylesheet" href="styles/main.css">
</head>
<body>
    <form action="" method="get">
        <input type="text" name="color" placeholder="Color" required value="<?= $color ?>">
        <input type="submit" value="submit">
    </form>
    <img src="<?php echo $image_color_front; $i++; ?>" alt="çamarchepô">
    <img src="<?= $image_color_back ?>" alt="çamarchepô">
    
    <div class="pokemon_infos">
        <div class="pokemon_name"><h5>name 1</h5><p><?php // if($i == 0){ echo$name;} ?></p></div>

        <div class="pokemon_type"><h5>type 1</h5><p><?= $type ?></p></div>
    </div>
    <div class="pokemon_infos">
        <div class="pokemon_name"><h5>name 2</h5><p><?= $name ?></p></div>

        <div class="pokemon_type"><h5>type 2</h5><p><?= $type ?></p></div>

        <div class="pokemon_games"><h5>games</h5><p></p></div>
    </div>


    <div class="card--container">
        <div class="card">
            <p class="card--pokename">pokemonName</p>
            <img class="card--pokeimage" src="<?= $image_color_front ?>" alt="">
        </div>
        <div class="card">
            <p class="card--pokename"></p>
            <img class="card--pokeimage" src="" alt="">
        </div>
        <div class="card">
            <p class="card--pokename"></p>
            <img class="card--pokeimage" src="" alt="">
        </div>
    </div>
    <div></div>
    <!-- VARIABLES PHP TO JS -->

        <input type="hidden" value="<?= $pokemon_list_color_length ?>" id="pokemon_list_color_length">

    <!-- FIN VARIABLES -->
    <script type="text/javascript" src="scripts/app.js"></script>
</body>
</html>