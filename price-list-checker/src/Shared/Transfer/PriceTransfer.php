<?php

declare(strict_types=1);

namespace App\Shared\Transfer;

final class PriceTransfer
{
    private int $id = 0;

    private string $productSku = '';

    private string $currency = '';

    private int $price = 0;

    private string $description = '';

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getProductSku(): string
    {
        return $this->productSku;
    }

    public function setProductSku(string $productSku): self
    {
        $this->productSku = $productSku;

        return $this;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function setCurrency(string $currency): self
    {
        $this->currency = $currency;

        return $this;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function setPrice(int $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function asString(): string
    {
        return sprintf(
            'Price { productSku: %s, price: %s }',
            $this->productSku,
            $this->price
        );
    }
}
