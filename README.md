# Weather APP


Weather App is a simple implementation of weather analytics using `OpenWeahter API`.
The project is built on `Laravel(Backend)` & `Vue.js(FrontEnd SPA)`.

## Demo Screenshots
![Demo1](https://raw.githubusercontent.com/MSaddamKamal/wireMedia/main/weather1.JPG)
![Demo2](https://raw.githubusercontent.com/MSaddamKamal/wireMedia/main/weather2.JPG)

## Technology Stack
It is built on Laravel and Vue.js, accompanied with beautiful UI using Bootsrap..
* Laravel
* Vue
* MySQL
* Bootsrap

Currenlty the implementaion uses `openMapApi` free thirdparty Api using `Custom Weather Driver` base imeplmentation.


## Features
* `Custom Weather Driver` 
    * Service Base Custom Weather Driver to easily switch implmentation
* Jobs
    * ProcessWeatherUpdates
    * UpdateUserWeather
* Queues/Workers
    * Jobs are Queued
* Scheduler
    * Sync Command
    * Hourly Cron
* Design Pattern
    * Repositry Pattern to abstract implmentation
    * Redis to cache response
    
* Cache
    * Redis Cache
    
* Websockets
    * Broadcast real updates 




## Backend Installation

Create `.env` file at the root of the project and add database credentials.

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=lab
DB_USERNAME=root
DB_PASSWORD=

```

Now add openWeatherApi/third party credentials in `.env`.

```bash
OPEN_WEATHER_APP_ID=xxxxxxxx
OPEN_WEATHER_BASE_URL=https://api.openweathermap.org/data/2.5/

```

Now set weather driver to `openWeather` in `.env`.

```bash
WEATHER_DRIVER=openWeather
```

Install composer vendor packages by following command via [composer]

```bash
composer install
```

Install node modules  by following command via [npm]

```bash
npm install
```

Run migrations by following command

```bash
php artisan migrate:fresh --seed
```

Clear Cache

```bash
php artisan optimize
```
[Node.js]: https://nodejs.org/en/
[npm]: https://www.npmjs.com/
[composer]:https://getcomposer.org/
[npm install]: https://docs.npmjs.com/getting-started/installing-npm-packages-locally
[sandbox]: https://docs.npmjs.com/getting-started/installing-npm-packages-locally

## Frontend Installation
- Navigate to `/frontend` folder
- Ensure nodejs v18 is active on host
- Install javascript dependencies: `npm install`
- Run frontend: `npm run dev`
- Visit frontend: `http://localhost:5173`

## Set API URL
navigate to \src\config\apiRequest.ts and change the base url for BackendApi
```bash
 baseURL: "http://127.0.0.1:8000/"
 or paste your backend Api url here
 ```

## Troubleshooting

Run following commands for troubleshooting

```bash
php artisan optimize
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)

