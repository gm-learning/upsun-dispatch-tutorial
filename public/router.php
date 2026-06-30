<?php
// Dev-only router for PHP's built-in server: serve existing static files
// directly, route everything else through the Symfony front controller.
$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
if ('/' !== $uri && is_file(__DIR__.$uri)) {
    return false;
}

require_once dirname(__DIR__).'/vendor/autoload_runtime.php';

return function (array $context) {
    return new App\Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
};
