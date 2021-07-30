<?php

declare(strict_types=1);

require dirname(__DIR__) . '/vendor/autoload.php';

use App\Comment\CommentFacade;

$facade = new CommentFacade();
$score = $facade->getSpamScore('Lorem ipsum!');

$output = sprintf('Spam Score: %d', $score);

dd($output);
