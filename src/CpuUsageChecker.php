<?php

declare(strict_types=1);

namespace Lokus\ServerCheck;

final class CpuUsageChecker
{
    public static function isLoadAtLeast(int $percent): bool
    {
        $startTimes = sscanf(file('/proc/stat')[0], 'cpu %d %d %d %d %d %d %d %d');
        usleep(200_000);
        $endTimes = sscanf(file('/proc/stat')[0], 'cpu %d %d %d %d %d %d %d %d');

        $totalTime = array_sum($endTimes) - array_sum($startTimes);
        $idleTime = ($endTimes[3] + $endTimes[4]) - ($startTimes[3] + $startTimes[4]);

        if ($totalTime <= 0) {
            return false;
        }

        $usagePercent = 100 * ($totalTime - $idleTime) / $totalTime;

        return $usagePercent >= $percent;
    }
}