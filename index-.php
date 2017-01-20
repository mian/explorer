#!/user/env/php
<?php

require_once __DIR__ . '/vendor/autoload.php';

use MianMuhammad\Explorer\Game;
use Symfony\Component\Console\Application;


$game = new Game();

$app = new Application();

$app->add($game);
$app->setDefaultCommand($game->getName());

$app->run();