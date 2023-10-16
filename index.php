<?php

$page = $_GET['page_name'];
if ($page == 'index.php') {
    $page = 'index';
}

echo $page;

?>