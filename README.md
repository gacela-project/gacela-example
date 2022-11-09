# Gacela Examples

In this repo you can find different examples of usages of Modules using [Gacela](https://github.com/gacela-project/gacela):

- [Comment Spam Score](comment-spam-score) (Level: easy)
- [Using Gacela cli](using-gacela-cli) (Level: easy)
- [Using Custom Config](using-custom-config) (Level: medium)
- [Gacela in a File](gacela-in-a-file) (Level: medium)
- [Price List Checker](price-list-checker) (Level: advance)
- [Resolve different namespaces](resolve-different-namespaces) (Level: advance)

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

Run the examples either locally or dockerized. 

> Check the [contributing](.github/CONTRIBUTING.md) page for detailed documentation about the dockerized option.
