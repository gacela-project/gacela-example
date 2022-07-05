<?php

declare(strict_types = 1);

namespace ResolveDifferentNamespaces\Customer;

use GacelaModuleExample\Customer\CustomerFactory as GacelaModuleExampleCustomerFactory;
use GacelaModuleExample\Customer\Domain\Generator\NicknameGeneratorInterface;
use ResolveDifferentNamespaces\Customer\Domain\CustomNicknameGenerator;

final class CustomerFactory extends GacelaModuleExampleCustomerFactory
{
    public function createNicknameGenerator(): NicknameGeneratorInterface
    {
        return new CustomNicknameGenerator();
    }
}
