<?php

if (!function_exists('validate')) {
	function validate($key, $session = null)
	{
		$session ??= session()->getFlashdata('validated') ?? [];

		$message = '';
		if (!empty($session)) {
			$message = $session[$key] ?? '';
		}

		return '<div class="mt-1 text-sm text-red-300">' . esc($message) . '</div>';
	}
}
