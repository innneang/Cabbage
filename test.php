<?php
$ingredient = array('hi', 'my', 'name');

$prepare1 = "SELECT * FROM recipe WHERE FIND_IN_SET('" . $ingredient[0] . "',ingredient)";
foreach ($ingredient as $key => $value) {
if ($key < 1) continue;
 $prepare1 = $prepare1 . " AND FIND_IN_SET('" . $value . "',ingredient)";
}
echo $prepare1
?>