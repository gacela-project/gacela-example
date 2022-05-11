# Gacela Examples

In this repo you can find different examples of usages of Modules using [Gacela Framework](http://gacela-project.com/).

- [Comment Spam Score](comment-spam-score) (Level: easy)
- [Using Custom Config](using-custom-config) (Level: medium)
- [Gacela in a File](gacela-in-a-file) (Level: medium)
- [Price List Checker](price-list-checker) (Level: advance)

### Basic Gacela structure

```bash
application-name
├── gacela.php
├── config // Default config behaviour. You can change it in `gacela.php`
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

### Documentation

You can check the full documentation in the official [website](https://gacela-project.com/).

## Usage - Run the examples

### Overview - local vs remote runtime

Run the examples either locally on your host or locally dockerized, which in fact is a remote setup as the docker container is its own virtualized host instance. The latter is supported by some deployment code in the ```.docker``` and ```.devcontainer``` directories.

We'll show both variants below.

Disclaimer: To keep all steps and commands compatible both for the [native docker development way](https://docs.docker.com/develop/) and the extended [Visual Studio Code remote containers way](https://code.visualstudio.com/docs/remote/containers) the following has a bit of a taste of being overly polished - like setting env vars and always using ```docker compose```.

### Clone the repo

First clone the ```gacela-example``` source:

```bash
# on your host in your projects' space - clone gacela-example
git clone https://github.com/gacela-project/gacela-example.git

# enter workspace
cd gacela-example

# select an example by its folder name, e.g. 'price-list-checker'
EXAMPLE=<folder-name of example>
```

### Run the example app on your host's PHP runtime

If your host (e.g. your laptop) has a typical PHP environment configured as runtime then you just have to php-build your application. 
All php-build-information and requirements is defined in ```composer.json```, so ```gacela``` will be fetched by composer. 

```bash
# enter example project
cd $EXAMPLE

# php-build application
composer install

# run example
php app.php
```

### Run the example app 'remotely' in a dockerized PHP runtime

If you do local development with 

* a [typical dockerized environment preconfigured](https://docs.docker.com/get-docker/) 
* and also [docker compose installed](https://docs.docker.com/compose/install/) 

you can docker-build a docker image as runtime. All docker-build-information is in ```./.docker```.

```bash
# run all docker commands within .docker directory
cd .docker
```

#### Build docker image

First we need to create a ```.env```-file carrying some user args into the docker build process:

```bash
echo "USERID=$(id -u)" > .env
echo "USER=${USER}" >> .env
```

Then docker-build the image once:

```bash
# docker-build runtime image once
docker compose build
```

#### Build & Run the app

```bash
# php-build application - sources and builds are in your host's project root
docker compose run --rm gacela-example bash -c "cd $EXAMPLE; composer install"

# run example - builds are in your host's project root
docker compose run --rm gacela-example bash -c "cd $EXAMPLE; php app.php"
```

## Usage - Remote development with Docker

It's also possible to develop 'remotely' in the docker container.

### CLI

```bash
# first start the remote runtime
docker compose up -d gacela-example

# then exec a console and do your development tasks
docker compose exec gacela-example bash

# on the host
# ... edit your files in the example-dir

# in the container
# cd <example-dir>
# ... build & test & run ...
# ... and then exit
# exit

# cleanup
docker compose stop gacela-example
```

### In IDEs

Alternatively to editing and running the code in different places you also may use an IDE which is able to connect to remote development runtimes.

In this case you enter the 'gacela-example' container within the IDE and drive a remote development session.

### In Visual Studio Code

A special case is VSC. VSC has a builtin mechanism called ['devcontainer'](https://code.visualstudio.com/docs/remote/containers) which lets you use a Docker container as a full-featured development environment.

Just open in VSC the root directory of this repo. 

Next the ```.devcontainer```-folder will automatically trigger a 'Reopen in container' panel. When you confirm VSC will refresh in a new window and build a remote environment. Then open a terminal in VSC which will be connected to the container environment. You can edit and run and debug both in the terminal and in the IDE as if you were on your host!

