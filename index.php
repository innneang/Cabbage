<!-- Search page -->
<?php
require dirname(__FILE__) . '/app/core/AltoRouter.php';
$router = new AltoRouter();
$router->map( 'GET', '/', function() {
    require('app/searchpage/index.php');
});

?>
