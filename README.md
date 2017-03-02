# Parsedown bundle for Symfony

Provides the parsedown service and twig filter for Symfony

## Installation

Require the bundle using composer:

```bash
composer require demontpx/parsedown-bundle ^1.3
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

You can also use the controller to parse markdown using an REST call. Add this to your `routing.yml`:

```yml
demontpx_parsedown:
    resource: "@DemontpxParsedownBundle/Resources/config/routing.yml"
    prefix:   /parsedown/
```

After that you'll be able to send a `POST` request with markdown to `http://your-apps-url/parsedown/` and it will return the parsed HTML. You might want to use this to render previews using javascript or something!
