# Parsedown bundle for Symfony2

Provides the parsedown service and twig filter for Symfony2

## Installation

Require the bundle using composer:

```bash
composer require demontpx/parsedown-bundle ~1.0
```

Then add it to your bundles section in `AppKernel.php`:

```php
new Demontpx\ParsedownBundle\DemontpxParsedownBundle()
```

## Usage

Then you can use it in your twig templates:

```twig
{{ text|markdown }}
{{ '# This is a header!'|markdown }}
```

or directly from PHP:

```php
$parsedown = $container->get('demontpx_parsedown.parsedown');
$parsedText = $parsedown->text($text);
```
