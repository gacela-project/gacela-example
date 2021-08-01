# Gacela in a File

Level: medium

An example of how can you use all Gacela components in a single file for prototyping or playing around.

## Usage

> php gacela-in-a-file.php

### Tech details

In this example I am bounding all these anonymous classes to the context of the very same filename,
so when the Facade is created, and it will look for its Factory (and others) it will find them as
a global level, because they cannot exist otherwise.
