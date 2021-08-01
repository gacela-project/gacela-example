# Using a custom config

Level: medium

An example of how can you use a custom config in Gacela

## Usage

> php app.php 1 2 3 4 5

### Tech details

In this example, I use `Config::setConfigReaders()` to define your own custom config reader.

In the example I am using an anonymous class, but you can instantiate the concrete class that handles
your config reading logic (if needed). The most important thing is that your config reader class
must implement `Gacela\Framework\Config\ConfigReaderInterface`.
