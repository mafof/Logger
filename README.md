## Simple logger for PHP
This is simple package for writing and outputs logs.
You can make custom method for outputting logs, example:
```php
use SMLogger\Logger;
use SMLogger\Settings;
$settings = new Settings();
$settings->addPrefix('deb', 'DEBUG'); // add method

$logs = new Logger($settings);
$logs->deb('test message'); // call added method
```
Also be edit custom method, example:
```php
use SMLogger\Logger;
use SMLogger\Settings;
$settings = new Settings();
$settings->setPrefix('info', 'INFORMATION OUT'); // edit method

$logs = new Logger($settings);
$logs->info('test message'); // call edited method
```
Here custom method means prefix before message logs.