<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title><?= App::getInstance()->title; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">Project name</a>
            <?php if(session_status() === PHP_SESSION_NONE){
                      session_start();
                  } ?>
            <?php if (empty($_SESSION['auth'])):?>
            <a class="navbar-brand" href="index.php?p=users.login">login</a>
            <?php else : ?>
            <a class="navbar-brand" href="index.php?p=users.logout">logout</a>
            <a class="navbar-brand" href="index.php?p=admin.categories.index">Categories</a>
            <a class="navbar-brand" href="index.php?p=admin.posts.index">Articles</a>
            <?php endif; ?>
        </div>
    </div>
</nav>

<div class="container">

    <div class="starter-template" style="padding-top: 100px;">
        <?= $content; ?>
    </div>

</div><!-- /.container -->


</body>
</html>
