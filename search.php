<?php
/* search.php
 * 
 * Input: GET containing ingredients in array form ("keyword")
 * Process: Search database for recipe using entered ingredients
 * Output: Display recipe list to user
 */
header('Content-Type: text/html; charset=utf-8');
if (isset($_GET['ingredient'])) {
  $keyw='';
 foreach ($_GET['ingredient'] as $ing) {
   $keyw.=$ing.' ';
   var_dump($keyw);
 }
 $keyw=trim($keyw);
 echo 'endvardump';
 var_dump($keyw);
require('config.php');
$db=getPDO();
$ing=$db->prepare('SELECT * FROM recipe');
//$ing->bindParam(':keyword',$keyw);
if ($ing->execute()) {
  $ind=$ing->fetchAll();
  foreach ($ind as $inf) { ?>
   <div class="card">
  <img class="card-img-top" data-src="holder.js/100%x180/" alt="Card image cap">
  <div class="card-block">
    <h4 class="card-title"><a href = "<?=$inf['link']?>"><?=$inf['name']?></a></h4> 
    <p class="card-text">Ingredient: <?=$inf['ingredient']?></p>
  </div>
</div>
  <?php }
} else {
 echo 'MySQL Fetch Error';
}
} else {
  echo 'Empty parameter!';
}
