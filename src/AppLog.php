<?php

namespace RPurinton\Disclog;

use RPurinton\Log;

class AppLog
{
    function __construct(array $argv)
    {
        Log::install();
        unset($argv[0]);
        if (count($argv)) return Log::info(substr(implode(" ", $argv), 0, 2000));
        while (($line = fgets(STDIN)) !== false) Log::info(substr(trim($line), 0, 2000));
    }
}
