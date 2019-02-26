<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pokeAPI</title>
</head>
<body>
    <form action="" method="get">
        <input type="text" name="color" placeholder="Color" required value="<?= $color ?>">
        <input type="submit" value="submit">
    </form>
    <img src="<?php echo $image_color_front; $i++; ?>" alt="çamarchepô">
    <img src="<?= $image_color_back ?>" alt="çamarchepô">
    
    <div class="pokemon_infos">
        <div class="pokemon_name"><h5>name</h5><p><?= $name ?></p></div>

        <div class="pokemon_type"><h5>type</h5><p><?= $type ?></p></div>
    </div>

    <img src="<?= $image_color_front ?>" alt="">

    <!-- VARIABLES PHP TO JS -->

        <input type="hidden" value="<?= $pokemon_list_color_length ?>" id="pokemon_list_color_length">

    <!-- FIN VARIABLES -->
    <script type="text/javascript" src="scripts/app.js"></script>
</body>
</html>