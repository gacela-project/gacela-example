<?php

declare(strict_types=1);

#########################################################################
# A full Gacela module example using anonymous classes in a single file #
#########################################################################

require __DIR__ . '/vendor/autoload.php';

use Gacela\Framework\AbstractConfig;
use Gacela\Framework\AbstractDependencyProvider;
use Gacela\Framework\AbstractFacade;
use Gacela\Framework\AbstractFactory;
use Gacela\Framework\ClassResolver\GlobalInstance\AnonymousGlobal;
use Gacela\Framework\Container\Container;

$contextName = basename(__FILE__, '.php');

interface ExternalGreeterInterface # will be used in the DependencyProvider
{
    public function greet(string $name): string;
}

interface InternalGreeterInterface # will be used in the Factory
{
    public function greet(string $name): string;
}

AnonymousGlobal::addGlobal(
    $contextName,
    new class() extends AbstractConfig {
        /**
         * @return list<int>
         */
        public function getValues(): array
        {
            return [1, 2, 3];
        }
    }
);

AnonymousGlobal::addGlobal(
    $contextName,
    new class() extends AbstractDependencyProvider {
        public function provideModuleDependencies(Container $container): void
        {
            $container->set('external-greeter', new class() implements ExternalGreeterInterface {
                public function greet(string $name): string
                {
                    return "Hello, $name!";
                }
            });
        }
    }
);

AnonymousGlobal::addGlobal(
    $contextName,
    new class() extends AbstractFactory {
        /**
         * @return list<int>
         */
        public function getConfigValues(): array
        {
            return $this->getConfig()->getValues();
        }

        public function createGreeter(): InternalGreeterInterface
        {
            /** @var ExternalGreeterInterface $myService */
            $externalGreeter = $this->getProvidedDependency('external-greeter');

            return new class($externalGreeter) implements InternalGreeterInterface {
                private ExternalGreeterInterface $externalGreeter;

                public function __construct(ExternalGreeterInterface $externalGreeter)
                {
                    $this->externalGreeter = $externalGreeter;
                }

                public function greet(string $name): string
                {
                    return $this->externalGreeter->greet($name);
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
