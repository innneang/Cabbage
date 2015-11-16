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
$config['base_url'] = 'http://beta.cabbage.iinnn.net';

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
/*$config['mysql']['db'] = 'admin_fridgerecipe';
$config['mysql']['username'] = 'admin_recipe';
$config['mysql']['password'] = 'BBJVvgJr0T';
$config['mysql']['host'] = 'iinnn.net'; //IP Address: 128.199.85.229 */


function getPDO() {
		try {
			$dbh = new PDO('mysql:dbname=admin_fridgerecipe;host=localhost;charset=utf8', 'admin_recipe', 'BBJVvgJr0T');
		} catch (PDOException $e) {
			$dbh = false;
			echo 'Connection failed: ' . $e->getMessage();
		}
		return $dbh;
	}

