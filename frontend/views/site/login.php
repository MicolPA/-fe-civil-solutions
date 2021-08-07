<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    

    <div class="row row-grid align-items-center">
        <div class="col-lg-5">
            <h1><?= Html::encode($this->title) ?></h1>
            <p>Please fill out the following fields to login:</p>
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>


                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-sm pr-5 pl-5 btn-block', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
        <div class="col-lg-7">
            <figure class="w-100">
                <img alt="Image placeholder" src="/frontend/web/images/illustration-2.svg" class="img-fluid mw-md-120" style="max-width: 600px !important;">
            </figure>
        </div>
    </div>
</div>
