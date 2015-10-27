<?php
defined('ROUTED') OR exit('No direct script access allowed');

/* =======================================================================
 * Config file
 * All shared variable should be here
 * =======================================================================
*/

/*
|--------------------------------------------------------------------------
| Base Site URL
|--------------------------------------------------------------------------
|
| URL to your root. Typically this will be your base URL,
| WITH a trailing slash:
|
|	http://example.com/
*/
$config['base_url'] = ''; //TODO: fill here

/*
|--------------------------------------------------------------------------
| Site Name
|--------------------------------------------------------------------------
|
| Site name, for example, Cabbage
*/
$config['name'] = 'Cabbage';

/*
|--------------------------------------------------------------------------
| MySQL Database Credential
|--------------------------------------------------------------------------
*/
$config['mysql']['db'] = 'admin_fridgerecipe';
$config['mysql']['username'] = 'admin_recipe';
$config['mysql']['password'] = 'BBJVvgJr0T';
$config['mysql']['host'] = 'iinnn.net'; //IP Address: 128.199.85.229








/* ========================================================================
 * Config Validation
 * ========================================================================
*/
if (!is_dir($config['base_url']))	{
		header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
		echo 'Your base url does not appear to be set correctly.';
		exit(3); // EXIT_CONFIG
	}
