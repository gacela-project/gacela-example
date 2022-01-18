<?php declare(strict_types=1);

namespace App\Comment;

use Gacela\Framework\AbstractConfig;

final class CommentConfig extends AbstractConfig
{
    public const AKISMET_KEY = 'AKISMET_KEY';

    public function getSpamCheckerEndpoint(): string
    {
        return sprintf(
            'https://%s.rest.akismet.com/1.1/comment-check',
            $this->get(self::AKISMET_KEY)
        );
    }
}
