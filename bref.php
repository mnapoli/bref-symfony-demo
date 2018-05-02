<?php
declare(strict_types=1);

use App\Kernel;
use Bref\Bridge\Symfony\SymfonyAdapter;
use Symfony\Component\Debug\Debug;
use Symfony\Component\Dotenv\Dotenv;

ini_set('display_errors', '1');
error_reporting(E_ALL);

require __DIR__.'/vendor/autoload.php';

Debug::enable();

// The check is to ensure we don't use .env in production
if (!isset($_SERVER['APP_ENV'])) {
    (new Dotenv)->load(__DIR__.'/.env');
}
if ($_SERVER['APP_DEBUG'] ?? ('prod' !== ($_SERVER['APP_ENV'] ?? 'dev'))) {
    umask(0000);
}
$kernel = new Kernel($_SERVER['APP_ENV'] ?? 'dev', (bool) ($_SERVER['APP_DEBUG'] ?? ('prod' !== ($_SERVER['APP_ENV'] ?? 'dev'))));

$app = new \Bref\Application;
$app->httpHandler(new SymfonyAdapter($kernel));
$app->cliHandler(new \Symfony\Bundle\FrameworkBundle\Console\Application($kernel));
$app->run();
