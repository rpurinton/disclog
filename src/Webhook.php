<?php

namespace RPurinton\Disclog;

class Webhook
{
	public static function send($url, $content)
	{
		@file_get_contents($url, false, stream_context_create([
			"http" => [
				"method" => "POST",
				"header" => "Content-type: application/json\r\n",
				"content" => json_encode(["content" => "<t:" . time() . ":R> " . $content])
			]
		]));
	}
}
