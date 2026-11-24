<?php

declare(strict_types=1);

namespace Lokus\ServerCheck;

final class CpuUsageChecker
{
    public static function isLoadAtLeast(int $percent): bool
    {
        $cores = (int) shell_exec('nproc') ?: 1;
        $cpu = sys_getloadavg()[0] / $cores * 100;

        return $cpu >= $percent;
    }
}