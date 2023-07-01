# php-recman
![Alt Text](https://media2.giphy.com/media/test/giphy.gif)

### Installation
```
sudo rm -R ./vendor
sudo rm -R ./composer.lock
php8.2 /usr/local/bin/composer install --optimize-autoloader
```
### Logs
```
Logger::log(
    [
        "message" => $e->getMessage(),
        "file" => $e->getFile(),
        "line" => $e->getLine(),
        "traceAsString" => $e->getTraceAsString()
    ],
    '["message" => $e->getMessage(), "file" => $e->getFile(), "line" => $e->getLine(), "traceAsString" => $e->getTraceAsString()]',
    __METHOD__ . ':' . __LINE__
);
```
