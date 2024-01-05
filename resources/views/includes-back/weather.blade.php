
<div id="weather-widget" class="card weather-card">
    <div class="card-header">
        Weather Forecast
    </div>
    <div class="card-body">
        <!-- Weather information will be displayed here -->
    </div>
</div>
<script>
    // Replace 'YOUR_API_KEY' with the actual API key you obtained from OpenWeatherMap
    const apiKey = '7dd5176a7483355c4e35ba8e80512fb4';
    // Function to get the user's current location
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showWeather, handleError);
        } else {
            console.error('Geolocation is not supported by this browser.');
        }
    }

    // Callback function to handle successful location retrieval
    function showWeather(position) {
        const latitude = position.coords.latitude;
        const longitude = position.coords.longitude;

        // Use the OpenWeatherMap API with the obtained coordinates
        const apiUrl = `https://api.openweathermap.org/data/2.5/weather?lat=${latitude}&lon=${longitude}&appid=${apiKey}`;

        // Fetch weather data
        fetch(apiUrl)
            .then(response => response.json())
            .then(data => {
                console.log(data);
                // Process the data and update the widget
                const weatherInfo = `
                    <h5 class="card-title">${data.name}</h5>
                    <p class="card-text">Temperature: ${parseInt(data.main.temp-273)} &deg;C</p>
                    <p class="card-text">Wind: ${data.wind.speed} km/h</p>
                    <p class="card-text">Weather: ${data.weather[0].description}</p>
                `;
                document.getElementById('weather-widget').getElementsByClassName('card-body')[0].innerHTML = weatherInfo;
            })
            .catch(error => console.error('Error fetching weather data:', error));
    }

    // Callback function to handle errors during location retrieval
    function handleError(error) {
        console.error(`Error getting location: ${error.message}`);
    }

    // Call the function to get the user's location and display weather
    getLocation();
</script>
