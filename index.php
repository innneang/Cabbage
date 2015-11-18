<?php
/* Index file
 * Search page goes here
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
	<link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.2/css/materialize.min.css" rel="stylesheet" />
</head>
<body class="blue lighten-2">
	<nav class="blue" role="navigation">
<div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">Cabbage</a>
<ul class="right hide-on-med-and-down">
<li class="tooltipped" data-tooltip="Home"><a href="#">หน้าหลัก</a></li>
<li class="tooltipped" data-tooltip="Contact"><a href="https://keendev.net/contact">ติดต่อเรา</a></li>
</ul>
</div>
</nav>
	<main class="container" style="padding-top:10px">
		<h1><?=$config['name']?>!</h1>
		<div id="ingredient">

		</div>
		<form onsubmit="addIngredient();return false;">
			<div id="the-basics" class="input-field">
          <input placeholder="Placeholder" id="first_name" type="text" class="validate">
          <label for="first_name">First Name</label>
			<input class="typeahead" type="text" id="input" placeholder="Ingredient" />
		</div>
					<input type="submit" class="btn btn-secondary" value="เพิ่ม" />
			<button type="button" class="btn btn-primary" id="submit">ค้นหา</button>
		</form>
		<div id="result">

		</div>
	</main>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.2/js/materialize.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.jquery.min.js"></script>
	<script>
		var substringMatcher = function(strs) {
			return function findMatches(q, cb) {
				var matches, substringRegex;
    matches = []; // an array that will be populated with substring matches
    substrRegex = new RegExp(q, 'i'); // regex used to determine if a string contains the substring `q`

    $.each(strs, function(i, str) { // iterate through the pool of strings and for any string that contains the substring `q`, add it to the `matches` array
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
echo 'var states = [';
foreach ($ind as $inv) {
	$ina=explode(',',$inv[0]);
	foreach ($ina as $inav) {
		echo '"'.$inav.'",';
	}
}
echo '];';
?>

$('#the-basics .typeahead').typeahead({
	hint: true,
	highlight: true,
	minLength: 1
}, {
	name: 'states',
	source: substringMatcher(states)
});</script>
<script>
	var ingredient = new Array();
	$(function(){
		$( "#submit" ).click(function(){
			$( "#result" ).text('Loading....');
			var ingget = '';
			ingredient.forEach(function(entry) {
				if (ingget.length > 0) {
					ingget += '&';
				}
				ingget += 'ingredient[]='+entry;
			});
			$( "#result" ).load( "search.php?"+ingget);
		});
	});
	function addIngredient () {
		var inp = $("#input").val();
		if ($.inArray(inp,ingredient) < 0) {
			console.log('Input not exist!');
			ingredient.push(inp);
			$("#ingredient").append('<div class="alert alert-info" role="alert">'+inp+'</div>');
		}
		$("#input").val('');
	}
</script>
</body>
</html>
