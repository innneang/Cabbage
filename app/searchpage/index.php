<?php
//This file use hard-coded path in <base> to make it include css&js correctly, so update it when you change base url.
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
            <div class="cover-image" style="background-image: url(https://images.unsplash.com/31/RpgvvtYAQeqAIs1knERU_vegetables.jpg?ixlib=rb-0.3.5&q=80&fm=jpg&s=b58ce4cf84e23c434c16b5297a7847a9);"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1 class="text-inverse">What is in your fridge?</h1>
                        
<div class="ls_container">

    <!-- Search Form -->
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
      <div class='center-block'>
        <!-- Result -->
  
        <div id="ls_result_div">
            <div id="ls_result_main">
                
                    <table>
                        <tbody>

                        </tbody>
                    </table>

            </div>
        </div>

    </form>

</div>
</div>
<!-- /Search Form Demo -->

<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery-1.11.1.min.js"></script>

<!-- Live Search Script -->
<script type="text/javascript" src="js/script.min.js"></script>
                        <br>
                        <br>
                        <a class="btn btn-lg btn-primary">Let's rock</a>
                    </div>
                </div>
            </div>
        </div>
        
        
        
    

</body></html>






