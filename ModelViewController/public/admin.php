<?php
use Core\Auth\DBAuth;

define('ROOT', dirname(__DIR__));
require ROOT . '/app/App.php';
App::load();

if(isset($_GET['p'])){
    $page = $_GET['p'];
}else{
    $page = 'home';
}

// Auth
$app = App::getInstance();
$auth = new DBAuth($app->getDb());
if(!$auth->logged()){
    $app->forbidden();
}

ob_start();
if($page === 'home'){
    require ROOT . '/views/admin/posts/index.php';
} elseif ($page === 'posts.edit'){
    require ROOT . '/views/admin/posts/edit.php';
} elseif ($page === 'posts.add'){
    require ROOT . '/views/admin/posts/add.php';
}elseif ($page === 'posts.delete'){
    require ROOT . '/views/admin/posts/delete.php';
}elseif($page === 'categories.index'){
    require ROOT . '/views/admin/categories/index.php';
} elseif ($page === 'categories.edit'){
    require ROOT . '/views/admin/categories/edit.php';
} elseif ($page === 'categories.add'){
    require ROOT . '/views/admin/categories/add.php';
}elseif ($page === 'categories.delete'){
    require ROOT . '/views/admin/categories/delete.php';
}
$content = ob_get_clean();
require ROOT . '/views/templates/default.php';
