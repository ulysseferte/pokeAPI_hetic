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
    $type = $result->types[0]->type->name;
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
?>

