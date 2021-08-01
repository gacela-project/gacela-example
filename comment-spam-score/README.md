# Comment Spam Score

Level: easy

An example of a simple cli-app that uses Symfony HttpClient in a domain service.

## Usage

> php app.php

### Tech details

```php
$facade = new CommentFacade();
$score = $facade->getSpamScore('Lorem ipsum!');
```

This example shows the simplest flow between `Facade -> Factory -> Config`.

The `SpamChecker` is a domain service which depends on a HttpClient and an endpoint, 
and those details are handled in the Factory.

The Facade uses the Factory to create that service and immediately use it.
