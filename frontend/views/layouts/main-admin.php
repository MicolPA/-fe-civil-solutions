<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
    <div class="container">
        <!-- Brand -->
        <a class="navbar-brand d-none d-lg-flex" href="/frontend/web/category">
            <i class="far fa-comments fa-2x mr-2 text-primary"></i> <span class="font-weight-bold text-darkblue h5 h5 pt-3">FE CIVIL SOLUTIONS</span>
        </a>
        <a class="navbar-brand d-lg-none" href="/frontend/web/category">
            <i class="far fa-comments mr-2 text-primary"></i> <span class="font-weight-bold text-darkblue h6 pt-3">FE CIVIL SOLUTIONS</span>
        </a>
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mt-4 mt-lg-0 ml-auto">
                <?= Html::a('Home', ['/category'], ['class' => 'nav-link px-2 link-secondary']) ?>
                <?= Html::a('Category', ['/category/index'], ['class' => 'nav-link px-2 link-secondary']) ?>
                <!-- <?//= Html::a('Question', ['/questions/index'], ['class' => 'nav-link px-2 link-secondary']) ?> -->
                <?= Html::a('Log Out', ['/site/logout'], ['class' => 'nav-link px-2 link-secondary']) ?>
            </ul>
            
            <!-- Mobile button -->
            <div class="d-lg-none text-center">
                <a href="https://webpixels.io/themes/quick-website-ui-kit" class="btn btn-block btn-sm btn-warning">See more details</a>
            </div>
        </div>
    </div>
</nav>

<main role="main" class="flex-shrink-0">
    <div class="container pt-4">
        <?= $content ?>
    </div>
</main>



<footer class="footer mt-auto py-3 text-muted">
    <div class="container">
        <p class="float-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
        <p class="float-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
