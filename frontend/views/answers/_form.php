<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Answers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="answers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Answer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'IdQuestion')->textInput(['maxlength' => true,
    'value' => $_GET['IdQuestion'],
    'disabled' => true]) ?>

    <?= $form->field($model, 'CorrectAnswer')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
