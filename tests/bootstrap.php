<?php

declare(strict_types=1);

$root = realpath(dirname(__DIR__));

$fail = static function (string $check): never {
    fwrite(STDERR, "Test preflight failed: {$check}\n");
    exit(1);
};

if ($root === false) {
    $fail('project root');
}

$expected = [
    'APP_ENV' => 'testing',
    'DB_CONNECTION' => 'sqlite',
    'DB_DATABASE' => ':memory:',
    'DB_URL' => '',
];

foreach ($expected as $name => $value) {
    if (getenv($name) !== $value
        || ! array_key_exists($name, $_ENV)
        || $_ENV[$name] !== $value
        || (array_key_exists($name, $_SERVER) && $_SERVER[$name] !== $value)) {
        $fail("environment {$name}");
    }

    $_SERVER[$name] = $value;
}

$cacheRelative = 'bootstrap/cache/phpunit-config-'
    . getmypid() . '-' . bin2hex(random_bytes(8)) . '.php';
$cacheRelative = str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $cacheRelative);
$cachePath = $root . DIRECTORY_SEPARATOR . $cacheRelative;

if (file_exists($cachePath)) {
    $fail('isolated config-cache path');
}

if (! putenv('APP_CONFIG_CACHE=' . $cacheRelative)) {
    $fail('isolated config-cache environment');
}

$_ENV['APP_CONFIG_CACHE'] = $cacheRelative;
$_SERVER['APP_CONFIG_CACHE'] = $cacheRelative;

$safeDatabaseEnvironment = [
    'DB_HOST' => '127.0.0.1',
    'DB_PORT' => '3306',
    'DB_USERNAME' => '',
    'DB_PASSWORD' => '',
    'DB_SOCKET' => '',
];

foreach ($safeDatabaseEnvironment as $name => $value) {
    if (! putenv("{$name}={$value}")) {
        $fail("test-safe environment {$name}");
    }

    $_ENV[$name] = $value;
    $_SERVER[$name] = $value;
}

require $root . DIRECTORY_SEPARATOR . 'vendor'
    . DIRECTORY_SEPARATOR . 'autoload.php';

$app = require $root . DIRECTORY_SEPARATOR . 'bootstrap'
    . DIRECTORY_SEPARATOR . 'app.php';

(new Illuminate\Foundation\Bootstrap\LoadConfiguration())->bootstrap($app);

$config = $app->make('config');
$sqlite = $config->get('database.connections.sqlite', []);

if ($app->environment() !== 'testing') {
    $fail('Laravel application environment');
}

if ($config->get('database.default') !== 'sqlite') {
    $fail('Laravel default database connection');
}

if (($sqlite['driver'] ?? null) !== 'sqlite') {
    $fail('SQLite connection driver');
}

if (($sqlite['database'] ?? null) !== ':memory:') {
    $fail('SQLite database name');
}

if (($sqlite['url'] ?? null) !== '') {
    $fail('SQLite connection URL');
}

if ($app->configurationIsCached()) {
    $fail('cached Laravel configuration');
}

if (str_replace('\\', '/', $app->getCachedConfigPath())
    !== str_replace('\\', '/', $cachePath)) {
    $fail('Laravel config-cache path');
}
