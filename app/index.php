<!-- Search page -->
<?php
require dirname(__FILE__) . '/core/AltoRouter.php';
$router = new AltoRouter();
$router->map( 'GET', '/', function() {
    require dirname(__FILE__) . '/searchpage/index.php';
});

?>