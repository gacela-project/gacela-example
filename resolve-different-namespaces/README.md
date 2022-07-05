# Resolve different namespaces

Level: advance

An example of how can you override gacela classes from different namespaces.

## Usage

> php app.php

### Tech details

In this example, we are using the Facade from a third-party vendor's module (`vendor\chemaclass\gacela-module-exmaple\src\Customer\CustomerFacade`),
and when that Facade uses its Factory, gacela will resolve it from our `src\Customer` directory (which is namespace: `ResolveDifferentNamespaces\Customer`), 
because we have the same module structure as that dependency, and we have defined the `ResolveDifferentNamespaces` as first thing in the `GacelaConfig::setProjectNamespaces()`.