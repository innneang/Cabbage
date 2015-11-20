<html><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
      <title><?=$config['name']?></title>
  </head><body>
  <?php require('config.php'); ?>
    <div class="cover">
      <div class="navbar">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><span>Brand</span></a>
          </div>
          <div class="collapse navbar-collapse" id="navbar-ex-collapse">
            <ul class="nav navbar-nav navbar-right">
              <li class="active">
                <a href="#">Home</a>
              </li>
              <li>
                <a href="#">Contacts</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <?php
        $background = array('https://images.unsplash.com/photo-1428515613728-6b4607e44363?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;s=e522c8e8cbb86cea4129c1e47867dbe9', 'https://images.unsplash.com/photo-1445373466703-25dbffd5f6a5?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;s=b8688816b1fbf855521a32ac76e2f99c', 'https://images.unsplash.com/photo-1430931071372-38127bd472b8?ixlib=rb-0.3.5&amp;q=80&amp;fm=jpg&amp;s=4d8b97be78b1ea15be104ac160d39f61');
        ?>
            
            <div class="cover-image" style="background-image: url('<?php echo $background[array_rand($background)]; ?>');"></div>
      
      
    <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <h1 class="text-inverse"><?php echo $config['name']; ?></h1>
            <p class="text-inverse">Lorem ipsum dolor sit amet, consectetur adipisici eli.</p>
                        <main class="container vcenter">
                <div id="ingredient">

                </div>
                <form onsubmit="addIngredient();return false;"><div class="text-center">
                  <div id="the-basics" class="row">
                    <div class="col-md-12"><input class="typeahead fullwidth" type="text" id="input" placeholder="Ingredient" size="50" /></div>
                  </div>
                  <div class='row'>
                    <div class="col-md-12"><input type="submit" class="btn btn-secondary fullwidth" value="เพิ่ม" /></div>
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

</body></html>