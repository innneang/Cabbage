<?php
/* search.php
 * 
 * Input: GET containing ingredients in array form ("keyword")
 * Process: Search database for recipe using entered ingredients
 * Output: Display recipe list to user
 */
header('Content-Type: text/html; charset=utf-8');
if (isset($_GET['ingredient'])) {
require('config.php');

$prepare1 = "SELECT * FROM recipe WHERE FIND_IN_SET('" . $_GET['ingredient'][0] . "',ingredient)";
foreach ($_GET['ingredient'] as $key => $value) {
if ($key < 1) {
 $prepare1 .= " AND FIND_IN_SET('" . $value . "',ingredient)";
}
}
$db=getPDO();
$ing=$db->prepare($prepare1);
if ($ing->execute()) {
  $ind=$ing->fetchAll();?>
  <div class='row'>
 <?php foreach ($ind as $inf) { ?>
<div class='col-md-4'>
   <div class="card card-inverse" style="background-color: #333; border-color: #333;">
 <!-- <img class="card-img-top" data-src="holder.js/100%x180/" alt="Card image cap">-->
  <div class="card-block">
      <div class='container'>
    <h4 class="card-title"><a href = "<?=$inf['link']?>"><?=$inf['name']?></a></h4> 
    <p class="card-text text-inverse">Ingredient: <?=$inf['ingredient']?></p>
    </div>
  </div>
</div>
</div>

  <?php } ?>
</div>
  <?php
} else {
 echo 'MySQL Fetch Error';
}
} else {
  echo 'Empty parameter!';
}