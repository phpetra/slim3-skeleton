# Petra's Slim skeleton with Twig, bootstrap 4, MySQL, Basic Auth and docker


## Install the app

1. git clone this repository to a directory
1. In a terminal: move into your directory
1. Download Composer ```curl -sS https://getcomposer.org/installer | php```
1. Run php ```composer.phar install```
1. Ensure `storage/log` and `storage/cache` are web writeable.
1. Save the `app/settings.php.dist` file as `app/settings.php` and adapt if necessary.

## Run the app

You have a few options depending on your setup:

###With own web server
Point your virtual host document root to your new application's `public/` directory.

### With docker
Simply run `docker-compose up -d` and all should be installed. App will be on http://localhost:8801
 
### With built in PHP web server
Run `php -S 0.0.0.0:8888 -t public public/index.php`. The app is available under http://localhost:8888

