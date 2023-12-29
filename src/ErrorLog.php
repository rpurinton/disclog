<?php

namespace RPurinton\Disclog;

class ErrorLog
{
	function __construct(array $argv)
	{
		$url = json_decode(file_get_contents(__DIR__ . "/../config/disclog.json"), true)["error-log"];
		unset($argv[0]);
		if (sizeof($argv)) return Webhook::send($url, substr(implode(" ", $argv), 0, 2000));
		while ($line = trim(fgets(STDIN))) Webhook::send($url, substr($line, 0, 2000));
	}
}
