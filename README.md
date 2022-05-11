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

How might you run theses examples? 

We'll show you two options: either locally on your host or locally dockerized. 

The second option is supported by some deployment code in the ```.docker``` and ```.devcontainer``` directories.

### Preliminary

First of course clone the ```gacela-example``` source:

```bash
# in your workspace - clone examples
git clone https://github.com/gacela-project/gacela-example.git

# enter workspace
cd gacela-example
```

### Run app on your host

#### Preliminary

If your laptop has a typical PHP environment preconfigured as runtime then you just have to php-build your application with gacela included by composer. All php-build-information and requirements is in ```composer.json```.

#### Build & Run the app

```bash
# enter example project
cd <example>

# php-build application
composer install

# run example
php app.php
```

### Run app 'remotely' dockerized
#### Preliminary

If you do local development with a [typical dockerized environment preconfigured](https://docs.docker.com/get-docker/) you can docker-build and use a docker image as runtime. All docker-build-information is in ```./.docker```.

So we docker-build the image once:

```bash
# docker-build runtime image once
docker build -t gacela \
  --build-arg USER_ID=$(id -u) \
  --build-arg USER=$USER \
  .docker
```

#### Build & Run the app

```bash
# enter example project
cd <example>

# php-build application - sources and builds are in your host's project root
docker run -it --rm --name gacela \
  -v $PWD:/app \
  -w /app \
  composer install

# run example - builds are in your host's project root
docker run -it --rm --name gacela \
  -v $PWD:/app \
  -w /app \
  gacela \
  php app.php
```

## Usage - Remote development with Docker

Besides just running the examples in a dockerized environment you also can develop 'remotely' within it.

### CLI

You may furtherly use the docker image to develop remotely in a container:

```bash
# first start the remote runtime
docker run -d --rm --name gacela -v $PWD:/app -w /app gacela sleep infinity

# then enter it on console level and do your development tasks
docker exec -it gacela bash

# on the host
# ... edit your files

# in the container
# ... build & test & run ...
# ... and then exit

# cleanup
docker rm -f gacela
```

### In IDEs

Alternatively to editing and running the code in different places you also may use an IDE which is able to connect to remote development runtimes.

In this case you enter the 'gacela' container within the IDE and drive a remote development session.

