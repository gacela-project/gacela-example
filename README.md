# Gacela Examples

In this repo you can find different examples of usages of Modules using [Gacela Framework](http://gacela-project.com/).

- [Comment Spam Score](comment-spam-score) (Level: easy)
- [Using Custom Config](using-custom-config) (Level: medium)
- [Gacela in a File](gacela-in-a-file) (Level: medium)
- [Price List Checker](price-list-checker) (Level: advance)

### Basic Gacela structure

```bash
application-name
├── gacela.json
├── config // Default config behaviour. You can change it in `gacela.json`
│   ├── local.php
│   └── default.php
│
├── src
│   ├── ExampleModuleWithoutPrefix
│   │   ├── Domain
│   │   │   └── YourLogicClass.php
│   │   ├── Config.php
│   │   ├── Facade.php
│   │   └── Factory.php
│   │
│   └── ExampleModuleWithPrefix
│       ├── Domain
│       │   └── YourLogicClass.php
│       ├── ExampleModuleWithPrefixConfig.php
│       ├── ExampleModuleWithPrefixFacade.php
│       └── ExampleModuleWithPrefixFactory.php
│
├── tests
│   └── ...
└── vendor
    └── ...
```
