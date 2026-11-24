# Library to check server load

Usage:

```php
use Lokus\ServerCheck\CpuUsageChecker;
use Lokus\ServerCheck\RamUsageChecker;

$res1 = CpuUsageChecker::isLoadAtLeast(30);
$res2 = RamUsageChecker::isLoadAtLeast(80);

var_dump([
    'res_1' => $res1,
    'res_2' => $res2,
]);
```