<?php

declare(strict_types=1);

namespace Lokus\ServerCheck;

final class CpuUsageChecker
{
    public static function isLoadAtLeast(int $percent): bool
    {
        $cores = (int) shell_exec('nproc') ?: 1;
        $fifteenMinuteLoad = sys_getloadavg()[2];

        $loadPercent = $fifteenMinuteLoad / $cores * 100;

        return $loadPercent >= $percent;
    }
}