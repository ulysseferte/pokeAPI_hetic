<?php 
//creating the variable as a global because using it in my 'stats' class's function
global $result;

//if no color is selected, $color=null.
$color = !empty($_GET['color']) ? $_GET['color'] : null;

// only works if a color is selected
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

    // Create a variable listing all the pokemons of a specific color
    $pokemon_list_color = $result->pokemon_species;
    // Create a variable giving the number of pokemons in the $pokemon_list_color variable
    $pokemon_list_color_length = count($pokemon_list_color);
    echo $pokemon_list_color_length;

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

    for ($i=0; $i < 2; $i++)
    { 
        $pokemonName = $pokemon_list_color[$i]->name;

        // Instantiate curl
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://pokeapi.co/api/v2/pokemon/'.$pokemonName);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        curl_close($curl);
        
        // Json decode
        $result = json_decode($result);
    
        // Binding values of API to variables
        $sprites = $result->sprites;
        $image_color_front = $result->sprites->front_default;
        $image_color_back = $result->sprites->back_default;
        $name = $result->name;
        $id = $result->id;
        $type = $result->types[0]->type->name;

        
        echo $name;
        // Create a new object and filling it with $result stats
            // If it's the second time or more than the loop goes, doesn't create a new object.
      
            $stats = new stats;
            
            // Update stats of object 
            $stats->updateStats();   
        
        

        // for ($i=0; $i < count($result->game_indices); $i++) { 
        //    echo $result->game_indices[$i]->version->name.'</br>';
        // }     
    }
}


include 'templates/content.php';


