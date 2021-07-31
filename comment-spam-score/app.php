#!/usr/bin/env php
<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use App\Comment\CommentFacade;

$facade = new CommentFacade();
$score = $facade->getSpamScore('Lorem ipsum!');

$output = sprintf('Spam Score: %d', $score);

echo $output . PHP_EOL;
echo "> Remember! This isn't gonna work if you don't add a valid akismet key inside the `config/[default|local].php`" . PHP_EOL;
