## Laravel dusk tech test
Laravel dusk app with behat tests on MacOS.

## pre req
 docker
 
 composer
 
 chrome

## Installation
Install dependencies - ```cd laravel-dusk-behat && composer install```

copy env file - ```cp .env.example .env```

Start sail - ```./vendor/bin/sail up -d```

Install dusk - ```php artisan dusk:install```

generate key - ```php artisan key:generate```

run behat homepage tests - ```cd tests && ../vendor/bin/behat```

If you get a webdriver releated error ```Failed to connect to localhost port 9515 after 0 ms: Connection refused (Facebook\WebDriver\Exception\WebDriverCurlException)```, restart chrome or run following depending on type of mac ```../vendor/laravel/dusk/bin/chromedriver-mac```

## Test location
Tests path - ```tests/features```

Feature context - ```tests/features/bootstrap```