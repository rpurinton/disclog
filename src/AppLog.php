<?php

namespace RPurinton\Disclog;

class AppLog
{
	function __construct(array $argv)
	{
		unset($argv[0]);
		$url = json_decode(file_get_contents(__DIR__ . "/../config/disclog.json"), true)["app-log"];
		if (count($argv)) return Webhook::send($url, substr(implode(" ", $argv), 0, 2000));
		while ($line = trim(fgets(STDIN))) Webhook::send($url, substr($line, 0, 2000));
	}
}
