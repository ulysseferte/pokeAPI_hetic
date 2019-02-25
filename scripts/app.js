console.log('Hello World !');

window
    .fetch('http://api.openweathermap.org/data/2.5/weather?q=Paris&APPID=9ee23753365e2bc44b4260c6760e94be')
    .then((_response) =>
    {
        return _response.json()
    })
    .then((_result) =>
    {
        console.log(_result);
    })
