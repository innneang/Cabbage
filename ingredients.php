<?php
// echo all ingredient in JSON
require('config.php');
$db=getPDO();
$ing=$db->query('SELECT ingredient FROM recipe');
$ind=$ing->fetch(PDO::FETCH_ASSOC);
$ins=array();
foreach ($ind['ingredient'] as $inv) {
  $ina=explode(',',$inv);
  foreach ($ina as $inav) {
    $ins[]=$inav;
  }
}
echo json_encode($ins);
?>