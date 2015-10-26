<?php
class htmltodatabase {
    public function kapook($link){
    $html = file_get_contents($link);
    $startpostion = strpos($html, 'articleBody');
    $endposition = strpos($html, 'aside');
    echo substr($html, $startpostion + 13, $endposition - $startpostion + 13);
    }
}
htmltodatabase::kapook('http://cooking.kapook.com/view131571.html');
?>