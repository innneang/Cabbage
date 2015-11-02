<?php
/* search.php
 * 
 * Input: POST containing ingredients in array form ("keyword")
 * Process: Search database for recipe using entered ingredients
 * Output: Display recipe list to user
 */

require('config.php');
$db=getPDO();
$ing=$db->prepare('SELECT * FROM recipe WHERE MATCH (ingredient) AGAINST (:keyword)');
$ing->bindParam(':keyword',$_POST['keyword']);
if ($ing->execute()) {
  $ind=$ing->fetch(PDO::FETCH_ASSOC);
  echo var_dump($ind);
  //More code here
} else {
  echo 'ERROR'; //TODO: Add more user-friendly error page
}
