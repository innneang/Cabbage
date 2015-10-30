<?php
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


	function getPDO() {
		try {
			$dbh = new PDO('mysql:dbname='.$config['mysql']['db'].';host='.$config['mysql']['host'], $config['mysql']['username'], $config['mysql']['password']);
		} catch (PDOException $e) {
			$dbh = false;
			echo 'Connection failed: ' . $e->getMessage();
		}
		return $dbh;
	}

