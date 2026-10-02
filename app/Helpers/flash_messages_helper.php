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

if (!function_exists('redirected_with')) {
	function redirected_with($key, $css = '')
	{
		$message = session()->getFlashdata($key) ?? '';

		return $message ? "<div class='$css'>" . esc($message) . '</div>' : '';
	}
}
