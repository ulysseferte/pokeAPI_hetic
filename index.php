<?php 
//creating the variable as a global because using it in my 'stats' class's function
global $result;
// Another used to get every games where a pokemon figures

//if no color is selected, $color=null.
$color = !empty($_GET['color']) ? $_GET['color'] : null;

// only works if a color is selected
if(!empty($_GET['color']))
{
//display pokemon with the correct color
    // Instantiate curl
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, 'https://pokeapi.co/api/v2/pokemon/'.$color);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($curl);
    curl_close($curl);
    
    // Json decode
    $result = json_decode($result);

    // Binding values of API to variables

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
        
    $name = $result->name;
    $id = $result->id;
    $array_games = count($result->game_indices);
    $type = $result->types[0]->type->name;
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
        $stats = new stats;
        // Update stats of object 
        $stats->updateStats();   
}


include 'templates/content.php';
?>

