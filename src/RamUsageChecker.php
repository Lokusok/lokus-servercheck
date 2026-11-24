<?php

declare(strict_types=1);

namespace Lokus\ServerCheck;

final class RamUsageChecker
{
    public static function isLoadAtLeast(int $percent): bool
    {
        $mem = file_get_contents('/proc/meminfo');

        preg_match('/MemTotal:\s+(\d+)/', $mem, $t);
        preg_match('/MemAvailable:\s+(\d+)/', $mem, $a);

        $ram = (1 - $a[1] / $t[1]) * 100;

        return $ram >= $percent;
    }
}

