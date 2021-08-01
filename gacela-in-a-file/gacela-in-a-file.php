<?php

declare(strict_types=1);

# A Gacela module example using anonymous classes

require __DIR__ . '/vendor/autoload.php';

use Gacela\Framework\AbstractConfig;
use Gacela\Framework\AbstractDependencyProvider;
use Gacela\Framework\AbstractFacade;
use Gacela\Framework\AbstractFactory;
use Gacela\Framework\ClassResolver\AbstractClassResolver;
use Gacela\Framework\Container\Container;

$contextName = basename(__FILE__, '.php');

AbstractClassResolver::addAnonymousGlobal(
    $contextName,
    new class() extends AbstractConfig {
        /**
         * @return int[]
         */
        public function getValues(): array
        {
            return [1, 2, 3];
        }
    }
);

AbstractClassResolver::addAnonymousGlobal(
    $contextName,
    new class() extends AbstractDependencyProvider {
        public function provideModuleDependencies(Container $container): void
        {
            $container->set('my-greeter', new class() {
                public function greet(string $name): string
                {
                    return "Hello, $name!";
                }
            });
        }
    }
);

AbstractClassResolver::addAnonymousGlobal(
    $contextName,
    new class() extends AbstractFactory {
        /**
         * @return int[]
         */
        public function getConfigValues(): array
        {
            return $this->getConfig()->getValues();
        }

        public function createGreeter(): object
        {
            /** @var object $myService */
            $myService = $this->getProvidedDependency('my-greeter');

            return new class($myService) {
                private object $myService;

                public function __construct(object $myService)
                {
                    $this->myService = $myService;
                }

                public function greet(string $name): string
                {
                    return $this->myService->greet($name);
                }
            };
        }
    }
);

$facade = new class() extends AbstractFacade {
    public function getConfigValues(): array
    {
        return $this->getFactory()->getConfigValues();
    }

    public function greet(string $name): string
    {
        return $this->getFactory()
            ->createGreeter()
            ->greet($name);
    }
};

dump($facade->getConfigValues());
dump($facade->greet('World'));

/**
 * OUTPUT:
 * array:3 [
 *   0 => 1
 *   1 => 2
 *   2 => 3
 * ]
 * "Hello, World!".
 */
