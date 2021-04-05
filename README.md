# i18n WordPress localization

#### Installation

1. clone this repo `git clone https://github.com/PHPTCloud/wp-i18n-localization.git`
2. zip cloned files
3. install plugin by zip. [see](https://wordpress.org/support/article/managing-plugins/)
4. done.

#### Usage

First what you need for using this plugin is create `key` in settings.
For example you can open English localization tab and create a new key there, e.g. `my_key_name` and set value as `My key name`.
And then use main method of plugin in your code:
```php
<?php
// output: My key name
echo i18nl__get('my_key_name');
?>
```

#### Features
Creating and managing of languages will be soon...