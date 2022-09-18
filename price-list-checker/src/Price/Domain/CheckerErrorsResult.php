<?php

declare(strict_types=1);

namespace App\Price\Domain;

final class CheckerErrorsResult
{
    private string $content;

    public static function empty(): self
    {
        return new self('');
    }

    public static function withContent(string $content): self
    {
        return new self($content);
    }

    private function __construct(string $content)
    {
        $this->content = $content;
    }

    public function __toString(): string
    {
        return sprintf('%s', $this->content);
    }

    public function isEmpty(): bool
    {
        return empty($this->content);
    }

    public function content(): string
    {
        return $this->content;
    }
}
