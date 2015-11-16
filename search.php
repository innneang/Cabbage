<?php
/* search.php
 * 
 * Input: GET containing ingredients in array form ("keyword")
 * Process: Search database for recipe using entered ingredients
 * Output: Display recipe list to user
 */
 
if (isset($_GET['ingredient'])) {
  $keyw='';
 foreach ($_GET['ingredient'] as $ing) {
   $keyw.=$ing.' ';
 }
 $keyw=trim($keyw);
require('config.php');
$db=getPDO();
$ing=$db->prepare('SELECT * FROM recipe WHERE MATCH (ingredient) AGAINST (:keyword)');
$ing->bindParam(':keyword',$keyw);
if ($ing->execute()) {
  $ind=$ing->fetchAll();
  foreach ($ind as $inf) { ?>
   <div class="card">
  <img class="card-img-top" data-src="holder.js/100%x180/" alt="Card image cap">
  <div class="card-block">
    <h4 class="card-title"><?=$inf['name']?></h4> 
    <p class="card-text"><?php echo $inf['</p>
    <a href="#" class="btn btn-primary">Button</a>
  </div>
</div>
  <?php }
  //More code here
} else {
  echo 'ERROR'; //TODO: Add more user-friendly error page
}
} else {
  echo 'Empty parameter!';
}
