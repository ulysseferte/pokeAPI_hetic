<?php 

// // Instantiate curl
// $curl = curl_init();
// curl_setopt($curl, CURLOPT_URL, 'https://pokeapi.co/api/v2/pokemon/ditto');
// curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
// $result = curl_exec($curl);
// curl_close($curl);

// // Json decode
// $result = json_decode($result);

// $image = $result->sprites->back_default;

$color = !empty($_GET['color']) ? $_GET['color'] : null;

if(!empty($_GET['color']))
{
//display pokemon with the correct color
    // Instantiate curl
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, 'https://pokeapi.co/api/v2/pokemon-color/'.$color);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($curl);
    curl_close($curl);
    
    // Json decode
    $result = json_decode($result);

    $image = $result->pokemon_species;

    $i = 0;
    $pokemonName = $image[$i]->name;

    echo $pokemonName;
    

    
    // Instantiate curl
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, 'https://pokeapi.co/api/v2/pokemon/'.$pokemonName);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($curl);
    curl_close($curl);
    
    // Json decode
    $result = json_decode($result);

    // echo '<pre>';
    // print_r($result);
    // echo '<pre>';

    $sprites = $result->sprites;
    $image_color_front = $result->sprites->front_default;
    $image_color_back = $result->sprites->back_default;
    $name = $result->name;
    $id = $result->id;
    $type = $result->types[0]->type->name;

}
?>
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
</body>
</html>
