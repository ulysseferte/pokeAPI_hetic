<?php 

// Creating the variable as a global because using it in my 'stats' class's function
global $result;

// If no name is selected, $name=null.
$name = !empty($_GET['name']) ? $_GET['name'] : null;

// Only works if a name is selected
if(!empty($_GET['name']))
{
// Display pokemon with the correct name
    // Instantiate curl
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, 'https://pokeapi.co/api/v2/pokemon/'.$name);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($curl);
    curl_close($curl);
    
    // Json decode
    $result = json_decode($result);

    // Binding values of API to variables //
    //Sprites
    $sprites = $result->sprites;
        $image_color_front = $sprites->front_default;
        $image_color_back = $sprites->back_default;
        $image_female_front = $sprites->front_female;
        $image_female_back = $sprites->back_female;
        $image_female_shiny_front = $sprites->front_shiny_female;
        $image_female_shiny_back = $sprites->back_shiny_female;
        $image_shiny_front = $sprites->front_shiny;
        $image_shiny_back = $sprites->back_shiny;
    
    // Miscellaneous
    $name = $result->name;
    $id = $result->id;
    $types = $result->types;
    $types_slots = count($types);
    $type = $result->types[0]->type->name;

    ////////////////
    // SET TYPE 1 //
    ////////////////
    if($type == 'normal')
    {
        $type = 'images/miniat_type_normal.png';
    }
    elseif($type == 'fire')
    {
        $type = 'images/miniat_type_feu.png';
    }
    elseif($type == 'fighting')
    {
        $type = 'images/miniat_type_combat.png';
    }
    elseif($type == 'water')
    {
        $type = 'images/miniat_type_eau.png';
    }
    elseif($type == 'flying')
    {
        $type = 'images/miniat_type_vol.png';
    }
    elseif($type == 'grass')
    {
        $type = 'images/miniat_type_plante.png';
    }
    elseif($type == 'poison')
    {
        $type = 'images/miniat_type_poison.png';
    }
    elseif($type == 'electric')
    {
        $type = 'images/miniat_type_electrik.png';
    }
    elseif($type == 'ground')
    {
        $type = 'images/miniat_type_sol.png';
    }
    elseif($type == 'psychic')
    {
        $type = 'images/miniat_type_psy.png';
    }
    elseif($type == 'rock')
    {
        $type = 'images/miniat_type_roche.png';
    }elseif($type == 'normal')
    {
        $type = 'images/miniat_type_normal.png';
    }
    elseif($type == 'ice')
    {
        $type = 'images/miniat_type_glace.png';
    }
    elseif($type == 'bug')
    {
        $type = 'images/miniat_type_insecte.png';
    }
    elseif($type == 'dragon')
    {
        $type = 'images/miniat_type_dragon.png';
    }
    elseif($type == 'ghost')
    {
        $type = 'images/miniat_type_spectre.png';
    }
    elseif($type == 'dark')
    {
        $type = 'images/miniat_type_tenebres.png';
    }
    elseif($type == 'steel')
    {
        $type = 'images/miniat_type_acier.png';
    }
    elseif($type == 'fairy')
    {
        $type = 'images/miniat_type_fee.png';
    }

    ////////////////
    // SET TYPE 2 //
    ////////////////
    if($types_slots == 2)
    {
        $type2 = $result->types[1]->type->name;
            if($type2 == 'normal')
        {
            $type2 = 'images/miniat_type_normal.png.png';
        }
        elseif($type2 == 'fire')
        {
            $type2 = 'images/miniat_type_feu.png';
        }
        elseif($type2 == 'fighting')
        {
            $type2 = 'images/miniat_type_combat.png';
        }
        elseif($type2 == 'water')
        {
            $type2 = 'images/miniat_type_eau.png';
        }
        elseif($type2 == 'flying')
        {
            $type2 = 'images/miniat_type_vol.png.png';
        }
        elseif($type2 == 'grass')
        {
            $type2 = 'images/miniat_type_plante.png';
        }
        elseif($type2 == 'poison')
        {
            $type2 = 'images/miniat_type_poison.png';
        }
        elseif($type2 == 'electric')
        {
            $type2 = 'images/miniat_type_electrik.png';
        }
        elseif($type2 == 'ground')
        {
            $type2 = 'images/miniat_type_sol.png';
        }
        elseif($type2 == 'psychic')
        {
            $type2 = 'images/miniat_type_psy.png';
        }
        elseif($type2 == 'rock')
        {
            $type2 = 'images/miniat_type_roche.png';
        }elseif($type2 == 'normal')
        {
            $type2 = 'images/miniat_type_normal.png';
        }
        elseif($type2 == 'ice')
        {
            $type2 = 'images/miniat_type_glace.png';
        }
        elseif($type2 == 'bug')
        {
            $type2 = 'images/miniat_type_insecte.png';
        }
        elseif($type2 == 'dragon')
        {
            $type2 = 'images/miniat_type_dragon.png';
        }
        elseif($type2 == 'ghost')
        {
            $type2 = 'images/miniat_type_spectre.png';
        }
        elseif($type2 == 'dark')
        {
            $type2 = 'images/miniat_type_tenebres.png';
        }
        elseif($type2 == 'steel')
        {
            $type2 = 'images/miniat_type_acier.png';
        }
        elseif($type2 == 'fairy')
        {
            $type2 = 'images/miniat_type_fee.png';
        }
    }
    else
    {
        $type2 = null;
    }
    // Length of game_indices (API's array)
    $array_games = count($result->game_indices);

    //////// STATS /////////
    //Creating a class for stats
    class stats
        {
            public $_speed;
            public $_defense_spe;
            public $_attack_spe;
            public $_defense;
            public $_attack;
            public $_health_points;
    
            // Fill a object with the '$result' pokémon stats.
            public function updateStats()
            {
                global $result;
                $this->_speed = $result->stats[0]->base_stat;
                $this->_defense_spe = $result->stats[1]->base_stat;
                $this->_attack_spe = $result->stats[2]->base_stat;
                $this->_defense = $result->stats[3]->base_stat;
                $this->_attack = $result->stats[4]->base_stat;
                $this->_health_points = $result->stats[5]->base_stat;
            }
        }
        // Introducing a new object with 'stats class'
        $stats = new stats;
        // Update stats of object 
        $stats->updateStats();   
}

// Including the main content in templates/content.php
include 'templates/content.php';
include 'templates/pokeCard.php'
?>

