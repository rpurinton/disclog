<?php

namespace RPurinton\Disclog;

use RPurinton\Log;

class ErrorLog
{
    function __construct(array $argv)
    {
        Log::install();
        unset($argv[0]);
        if (count($argv)) return Log::error(substr(implode(" ", $argv), 0, 2000));
        while (($line = fgets(STDIN)) !== false) Log::error(substr(trim($line), 0, 2000));
    }
}
