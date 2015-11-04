<?php
    file_exists(__DIR__.DIRECTORY_SEPARATOR.'core'.DIRECTORY_SEPARATOR.'Handler.php') ? require_once(__DIR__.DIRECTORY_SEPARATOR.'core'.DIRECTORY_SEPARATOR.'Handler.php') : die('There is no such a file: Handler.php');
    file_exists(__DIR__.DIRECTORY_SEPARATOR.'core'.DIRECTORY_SEPARATOR.'Config.php') ? require_once(__DIR__.DIRECTORY_SEPARATOR.'core'.DIRECTORY_SEPARATOR.'Config.php') : die('There is no such a file: Config.php');

    use AjaxLiveSearch\core\Config;
    use AjaxLiveSearch\core\Handler;

if (session_id() == '') {
    session_start();
}

// For debugging. You can get rid of these two lines safely
//    error_reporting(E_ALL);
//    ini_set('display_errors', 1);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta name="keywords" content="recipe"><meta name="description" content="the most intelligent recipe searcher"><title>Cabbage</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">

    <!-- Live Search Styles -->
    <link rel="stylesheet" href="css/fontello.css">
    <link rel="stylesheet" href="css/animation.css">
    <!--[if IE 7]>
    <link rel="stylesheet" href="css/fontello-ie7.css">
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="css/style.min.css">
</head>
<body>



<!-- Placed at the end of the document so the pages load faster -->











<html><head><meta name="keywords" content="recipe"><meta name="description" content="the most intelligent recipe searcher"><title>Cabbage</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
    </head><body>
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
                        <a class="navbar-brand" href="#"><span>Cabbage</span></a>
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
            <?php $background = array('https://images.unsplash.com/photo-1428515613728-6b4607e44363?ixlib=rb-0.3.5&q=80&fm=jpg&s=e522c8e8cbb86cea4129c1e47867dbe9', 'https://images.unsplash.com/photo-1445373466703-25dbffd5f6a5?ixlib=rb-0.3.5&q=80&fm=jpg&s=b8688816b1fbf855521a32ac76e2f99c', 'https://images.unsplash.com/photo-1430931071372-38127bd472b8?ixlib=rb-0.3.5&q=80&fm=jpg&s=4d8b97be78b1ea15be104ac160d39f61'); ?>
            <div class="cover-image" style="background-image: url('<?php echo $background[array_rand($background)]; ?>');"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1 class="text-inverse">What is in your fridge?</h1>
                        <form accept-charset="UTF-8" class="search" id="ls_form" name="ls_form">
        <?php
            // Set javascript anti bot value in the session
            Handler::getJavascriptAntiBot();

        ?>
        <input type="hidden" name="ls_anti_bot" id="ls_anti_bot" value="">
        <input type="hidden" name="ls_token" id="ls_token" value="<?php echo Handler::getToken(); ?>">
        <input type="hidden" name="ls_page_loaded_at" id="ls_page_loaded_at" value="<?php echo time(); ?>">
        <input type="hidden" name="ls_current_page" id="ls_current_page" value="1">
        <input type="text" name="ls_query" id="ls_query" placeholder="Type here" autocomplete="off" maxlength="<?php echo Config::getConfig('maxInputLength'); ?>">

        <!-- Result -->
        <div id="ls_result_div">
            <div id="ls_result_main">
                <table>
                    <tbody>

                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div id="ls_result_footer">
                <div class="col page_limit">
                    <select id="ls_items_per_page" name="ls_items_per_page">
                        <option value="5" selected>5</option>
                        <option value="10">10</option>
                        <option value="0">All</option>
                    </select>
                </div>
                <div class="col navigation">
                    <i class="icon-left-circle arrow" id="ls_previous_page"></i>
                </div>
                <div class="col navigation pagination">
                    <label id="ls_current_page_lbl">1</label> / <label id="ls_last_page_lbl"></label>
                </div>
                <div class="col navigation">
                    <i class="icon-right-circle arrow" id="ls_next_page"></i>
                </div>

            </div>

        </div>

    </form>

                        <br>
                        <br>
                        <a class="btn btn-lg btn-primary">Let's rock</a>
                    </div>
                </div>
            </div>
        </div>
        
        
        
    
<script src="js/jquery-1.11.1.min.js"></script>

<!-- Live Search Script -->
<script type="text/javascript" src="js/script.min.js"></script>

</body>
</html>