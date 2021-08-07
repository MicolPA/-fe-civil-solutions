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
<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <div class="container">
        <!-- Brand -->
        <?= Html::a('<i class="far fa-comments fa-2x mr-2 text-primary"></i> <span class="font-weight-bold text-darkblue h5 h5 pt-3">FE CIVIL SOLUTIONS</span>', ['/'], ['class' => 'd-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none font-weight-bold text-primary']) ?>
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mt-4 mt-lg-0 ml-auto">
                <?php if (Yii::$app->user->isGuest): ?>
                    <?= Html::a('Home', ['/site/index'], ['class' => 'nav-link px-2 link-secondary']) ?>
                    <?= Html::a('Login', ['/site/login'], ['class' => 'nav-link px-2 link-secondary']) ?>
                    <!-- Button -->
                    

                <?php else: ?>
                    <?= Html::a('Home', ['/site/home'], ['class' => 'nav-link px-2 link-secondary']) ?>
                    <?= Html::a('My Grades', ['/exam/history'], ['class' => 'nav-link px-2 link-secondary']) ?>
                    <?= Html::a('Log Out', ['/site/logout'], ['class' => 'nav-link px-2 link-secondary']) ?>
                    <!-- Button -->
                    
                <?php endif ?>
            </ul>
            <?php if (Yii::$app->user->isGuest): ?>
                <a class="navbar-btn btn btn-sm btn-primary d-none d-lg-inline-block ml-3" href="/frontend/web/site/signup">
                    Sign Up
                </a>
            <?php else: ?>
                <a class="navbar-btn btn btn-sm btn-primary d-none d-lg-inline-block ml-3" href="/frontend/web/site/home">
                    Take Exam
                </a>
            <?php endif ?>
            <!-- Mobile button -->
            <div class="d-lg-none text-center">
                 <?php if (Yii::$app->user->isGuest): ?>
                <a class="navbar-btn btn btn-sm btn-primary d-none d-lg-inline-block ml-3" href="/frontend/web/site/signup">
                    Sign Up
                </a>
            <?php else: ?>
                <a class="navbar-btn btn btn-sm btn-primary d-none d-lg-inline-block ml-3" href="/frontend/web/site/home">
                    Take Exam
                </a>
            <?php endif ?>
            </div>
        </div>
    </div>
</nav>
  

<main role="main" class="flex-shrink-0">
    <div class="container">
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
