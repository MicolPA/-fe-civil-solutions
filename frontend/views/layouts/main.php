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
    <div class="container">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <?= Html::a('<i class="far fa-comments fa-2x mr-2 text-primary"></i> <span class="font-weight-bold text-darkblue h5 h5 pt-3">FE CIVIL SOLUTIONS</span>', ['/'], ['class' => 'd-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none font-weight-bold text-primary']) ?>

          <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            
            <?php if (Yii::$app->user->isGuest): ?>
                <?= Html::a('HOME', ['/site/index'], ['class' => 'nav-link px-2 link-secondary']) ?>
                <?= Html::a('LOGIN', ['/site/login'], ['class' => 'nav-link px-2 link-secondary']) ?>
                <?= Html::a('REGISTER', ['/site/signup'], ['class' => 'nav-link px-2 link-secondary']) ?>

            <?php else: ?>
                <?= Html::a('HOME', ['/site/home'], ['class' => 'nav-link px-2 link-secondary']) ?>
            <?php endif ?>
          </ul>

          <div class="col-md-3 text-end">
            <a href="#" class="d-block link-dark text-decoration-none"> <span class="font-weight-bold text-success">Hola, Kuasimodo</span>
            </a>
          </div>
        </header>
    </div>

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
