<?php
/* Index file
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
	<style>
	body {
		background-color: #42a5f5;
	}
	</style>
</head>
<body>
	<nav class="navbar navbar-light container">
		<a class="navbar-brand" href="#">Cabbage</a>
		<ul class="nav navbar-nav">
			<li class="nav-item active">
				<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">About</a>
			</li>
		</ul>
	</nav>
	<main class="container">
		<h1><?=$config['name']?>!</h1>
		<div id="ingredient">

		</div>
		<form onsubmit="addIngredient();return false;"><div class="text-center">
			<div id="the-basics" class="row">
				<input class="typeahead col-md-8" type="text" id="input" placeholder="Ingredient" />
				<input type="submit" class="btn btn-secondary col-md-4" value="เพิ่ม" />
			</div>
			<button type="button" class="btn btn-primary" id="submit">ค้นหา</button>
		</div></form>
		<div id="result">

		</div>
	</main>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>
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
