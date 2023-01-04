# Contributing to Gacela Example

## Welcome!

We look forward to your contributions!

This project is just a place to hold examples of usage of [Gacela Project](https://github.com/gacela-project/gacela).

## Usage - Run the examples

### Clone the repo

First clone the ```gacela-example``` source:

```bash
# on your host in your projects' space - clone gacela-example
git clone https://github.com/gacela-project/gacela-example.git

# enter workspace
cd gacela-example
```

### Run the example app on your host's PHP runtime

You need PHP >=8.0 in your local machine. All php-build-information and requirements is defined 
in ```composer.json```, so ```gacela``` will be fetched by composer.

```bash
# enter example project, e.g. 'gacela-in-a-file'
cd gacela-in-a-file

# php-build application
composer install

# run example
php app.php
```
