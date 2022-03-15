# Using a custom config

Level: medium

An example of how can you use a custom config in Gacela

## Usage

> php app.php 1 2 3 4 5

### Tech details

With `gacela.php` you can define your own custom config reader.
```php
public function config(ConfigBuilder $configBuilder): void
{
    $configBuilder->add('config/*.custom', '', CustomConfigReader::class);
}
```
