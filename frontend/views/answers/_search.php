<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\AnswersSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="answers-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'IdAnswer') ?>

    <?= $form->field($model, 'Answer') ?>

    <?= $form->field($model, 'IdQuestion') ?>

    <?= $form->field($model, 'CorrectAnswer') ?>

    <?= $form->field($model, 'Image') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
