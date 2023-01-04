# Gacela Examples

In this repo you can find different examples of usages of Modules using [Gacela](https://github.com/gacela-project/gacela):

- [Comment Spam Score](comment-spam-score) (Level: easy)
- [Using Gacela cli](using-gacela-cli) (Level: easy)
- [Using Custom Config](using-custom-config) (Level: medium)
- [Gacela in a File](gacela-in-a-file) (Level: medium)
- [Price List Checker](price-list-checker) (Level: advanced)
- [Resolve different namespaces](resolve-different-namespaces) (Level: advanced)
- [Extending a service](extending-service) (Level: advanced)

### Basic structure of a module using Gacela

```bash
application-name
├── gacela.php
├── config
│   └── ...
│
├── src
│   └── ExampleModule
│       ├── Domain
│       │   └── ...
│       ├── Application
│       │   └── ...
│       ├── Infrastructure
│       │   └── ...
│       ├── Config.php
│       ├── DependencyProvider.php
│       ├── Facade.php
│       └── Factory.php
│
├── tests
│   └── ...
└── vendor
    └── ...
```

### Documentation

You can check the full documentation in the official [website](https://gacela-project.com/).

### Run the examples

```bash
git clone https://github.com/gacela-project/gacela-example.git
cd gacela-example 

# enter the example project, eg 'gacela-in-a-file'
cd gacela-in-a-file

# install dependencies (eg 'gacela' 😉)
composer install

# run example
php app.php
```
