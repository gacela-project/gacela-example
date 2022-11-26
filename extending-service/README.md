# Extending a service

Level: advance

An example of how can you extend an existing service .

## Usage

> php app.php

### Tech details

I defined a service 'OPERATIONS' inside the `CalculatorDependencyProvider`. That is an array of multiple "operations"
that will be processed later in the `Calculator` class - following an example of a stack-plugin pattern.

This examples shows how easy you can extend any service before it's used. This can be really helpful if you want to 
allow your app to be extended by other usages/apps without the need of inheritance in your codebase when they need 
extra functionality.
