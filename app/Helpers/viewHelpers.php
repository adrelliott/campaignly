<?php

if ( ! function_exists('getViewPath')) {
	function getViewPath($defaultPath, $tenantId) {
		$tenantViewName = str_replace('default', $tenantId, $defaultPath);
		if (View::exists($tenantViewName)) return $tenantViewName;
		else return $defaultPath;
	}
}

