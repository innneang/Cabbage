<?php
require('config.php');
$background = array('https://images.unsplash.com/photo-1428515613728-6b4607e44363?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;s=e522c8e8cbb86cea4129c1e47867dbe9', 'https://images.unsplash.com/photo-1445373466703-25dbffd5f6a5?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;s=b8688816b1fbf855521a32ac76e2f99c', 'https://images.unsplash.com/photo-1430931071372-38127bd472b8?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;s=4d8b97be78b1ea15be104ac160d39f61');
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	<script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
	<title><?=$config['name']?></title>
	<style>
		.tt-input, .tt-hint {width: 396px;height: 30px;padding: 8px 12px;font-size: 24px;line-height: 30px;border: 2px solid #ccc;border-radius: 8px;
			outline: none;}
			.tt-input {box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);}
			.tt-hint {color: #999;}
			.tt-menu {width: 422px;margin-top: 12px;padding: 8px 0;background-color: #fff;border: 1px solid #ccc;border: 1px solid rgba(0, 0, 0, 0.2);border-radius: 8px;box-shadow: 0 5px 10px rgba(0,0,0,.2);}
			.tt-suggestion {padding: 3px 20px;font-size: 18px;line-height: 24px;}
			.tt-suggestion.tt-cursor {color: #fff;background-color: #0097cf;}
			.tt-suggestion p {margin: 0;}
		</style>
	</head>
	<body>
		<div class="cover">            
			<div class="cover-image" style="background-image: url('<?=$background[array_rand($background)]?>');"></div>

			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">

						<h1 style="text-shadow: 2px 2px 5px grey;" class="text-inverse">มื้อนี้กินอะไรดี?</h1>
						<p style="text-shadow: 2px 2px 5px grey;" class="text-inverse">กรุณาป้อนข้อมูลวัตถุดิบที่มี</p>
						<main class="container">
							<div class='row'>
								<div id="ingredient" class="col-md-offset-3 col-md-6">

								</div>
							</div>
							<form onsubmit="addIngredient();return false;"><div class="text-center">
								<div id="the-basics" class="row">
									<div class="col-md-6 col-md-offset-3"><input class="form-control typeahead fullwidth" type="text" id="input" placeholder="Ingredient" size="50" /></div>

									<div class='col-md-1 visible-lg-*' style="visibility: hidden;"><input type="submit" class="btn btn-secondary" value="เพิ่ม" /></div>
									<br>
									<br>
								</div>
							</div>
							<button type="button" class="btn btn-primary" id="submit">ค้นหา</button>
						</div></form>
						<div id="result">


						</div>
					</main>
				</div>
			</div>

			<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.jquery.min.js"></script>
			<script>
				var substringMatcher = function(strs) {
					return function findMatches(q, cb) {
						var matches, substringRegex;
            matches = []; // an array that will be populated with substring matches
        substrRegex = new RegExp(q, 'i'); // regex used to determine if a string contains the substring `q`
        $.each(strs, function(i, str) {
          // iterate through the pool of strings and for any string that contains the substring `q`, add it to the `matches` array
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
});
</script>
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
		if ($.inArray(inp,ingredient) < 0 && inp.length > 0) {
			console.log('Input not exist!');
			ingredient.push(inp);
			showIngredient();
		}
		$("#input").val('');
		console.log('Datas are '+ingredient.toString());
	}
	function removeIngredient (rm) {
		var index = ingredient.indexOf(rm);
		if (index > -1) {
			console.log('Removing '+rm);
			ingredient.splice(index, 1);
		}
		console.log('Datas are '+ingredient.toString());
		showIngredient();
	}
	function showIngredient () {
		var text = "";
		var x;
		for (x in ingredient) {
			text += '<div class="alert alert-info" role="alert" onclick="removeIngredient(\''+ingredient[x]+'\')">'+ingredient[x]+'</div>';
		}
		$('#ingredient').html(text);
	}
</script>
</body>
</html>