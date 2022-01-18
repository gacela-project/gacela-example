<?php declare(strict_types=1);

namespace App\Comment\Domain;

use Symfony\Contracts\HttpClient\HttpClientInterface;

final class SpamChecker
{
    private HttpClientInterface $client;

    private string $endpoint;

    public function __construct(
        HttpClientInterface $client,
        string $endpoint
    ) {
        $this->client = $client;
        $this->endpoint = $endpoint;
    }

    public function getSpamScore(string $comment): int
    {
        $response = $this->client->request(
            'POST',
            $this->endpoint,
            [
                'body' => [
                    'comment_content' => $comment,
                ],
            ]
        );

        $content = $response->getContent();

        return ('true' === $content) ? 1 : 0;
    }
}
