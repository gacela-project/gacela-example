<?php

declare(strict_types=1);

namespace App\Comment;

use Gacela\Framework\AbstractFacade;

/**
 * @method static CommentFactory getFactory()
 */
final class CommentFacade extends AbstractFacade
{
    public static function getSpamScore(string $comment): int
    {
        return self::getFactory()
            ->createSpamChecker()
            ->getSpamScore($comment);
    }
}
