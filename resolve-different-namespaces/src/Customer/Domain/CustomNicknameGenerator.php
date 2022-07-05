<?php

declare(strict_types = 1);

namespace ResolveDifferentNamespaces\Customer\Domain;

use GacelaModuleExample\Customer\Domain\Generator\NicknameGeneratorInterface;
use GacelaModuleExample\Shared\CustomerName;

final class CustomNicknameGenerator implements NicknameGeneratorInterface
{
    public function generateNickname(CustomerName $customerName): string
    {
        return 'fake and overridden :)';
    }
}