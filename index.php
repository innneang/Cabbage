<?php
/* Index file
 * 
 * Search page goes here
 *
 * This page use BOOTSTRAP v4.0.0-alpha! ::::: http://v4-alpha.getbootstrap.com/
 */
require('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta http-equiv="x-ua-compatible" content="ie=edge" />
	<title><?=$config['name']?></title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.min.css" />
</head>
<body>
	<main class="container">
	<h1><?=$config['name']?>!</h1>
<div id="the-basics">
  <input class="typeahead ingredient" type="text" name="ingredient[]" placeholder="Ingredient" />
  <input class="typeahead ingredient" type="text" name="ingredient[]" placeholder="Ingredient" />
  <input class="typeahead ingredient" type="text" name="ingredient[]" placeholder="Ingredient" />
  <button type="button" class="btn btn-primary">ค้นหา</button>
</div>	</main>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>
<script>
var substringMatcher = function(strs) {
  return function findMatches(q, cb) {
    var matches, substringRegex;

    // an array that will be populated with substring matches
    matches = [];

    // regex used to determine if a string contains the substring `q`
    substrRegex = new RegExp(q, 'i');

    // iterate through the pool of strings and for any string that
    // contains the substring `q`, add it to the `matches` array
    $.each(strs, function(i, str) {
      if (substrRegex.test(str)) {
        matches.push(str);
      }
    });

    cb(matches);
  };
};

<?php
$db=getPDO();
$ing=$db->query('SELECT ingredient FROM recipe');
$ind=$ing->fetchAll();
//echo '//'.var_dump($ind)."\n";
echo 'var states = [';
foreach ($ind['ingredient'] as $inv) {
  $ina=explode(',',$inv);
  foreach ($ina as $inav) {
    echo "'$inav',";
  }
}
echo '];';
?>

$('#the-basics .typeahead').typeahead({
  hint: true,
  highlight: true,
  minLength: 1
},
{
  name: 'states',
  source: substringMatcher(states)
});</script>
<script>
$(function(){
	
});
</script>
</body>
</html>
