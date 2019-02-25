# pokeAPI_hetic
Project with HETIC which aim to learn how to use an API.


GET a Pokemon id with informations (link) : /api/v2/pokemon/{id or name}/

		Result == get the id of the Pokemon, his name, the xp he need to lvl up from the first lvl, his height, si il est un Pokémon de base ou évolué, son poids.

De base il possède une attaque ( dépend sûrement du Pokémon choses l’exemple ici est butterfree).
is_hidden : true; signifie qu’il reste des slots d’attaques à utiliser. —> se situe dans la classe abilities.0
slot: x  renvoie le nombre d’attaque restantes.

Une attaque comporte  2 propriétés, name et url.

sprites renvoie une liste des images existantes pour le pojkémon en .png 



/api/v2/pokemon-color/{id or name}/
    //permet de renvoyer un pokémon d'une couleur en particulier, si il y a un nom à la place d'un id, il vaut mieux être
    certain de la couleur deu pokémon étant donné que il y a aura une erruere si ce pokémon n'a pas la couleur 
    excompté, tout en sachant que la couleur orange n'éxiste pas, les pokémons majoritairement orange sont soit listés dans "red" soit dans "brown".
    