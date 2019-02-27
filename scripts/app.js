// // To go further later 
// let request = new XMLHttpRequest();
// request.onload = function name()
// {
//     let pokemon_list_color = this.responseText;
//     console.log(pokemon_list_color);
// }
// request.open('get', 'index.php', true);
// request.send();
// console.log(request);
const content_body = document.querySelector('body');

pokemon_list_color_length = document.querySelector('#pokemon_list_color_length').value
console.log(pokemon_list_color_length);

function createCardsLine()
{
    // Crée un élément div et le met dans une variable
    let div = document.createElement("div");
    //Lui ajoute un élément enfant 
    document.body.appendChild(div);
    
    let card__container = document.createElement("div")
    card__container.classList.add('card--container')
    
    card__container.append(div)

    console.log(card__container)
}
createCardsLine()
//Each  
for (let i = 0; i < 5; i++)
{
    if (i == 0 || i % 3 == 0)
    {
        
    }
    
}