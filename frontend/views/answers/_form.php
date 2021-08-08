<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Answers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="answers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'IdQuestion')->textInput(['maxlength' => true,'disabled' => true, 'value' => $question->Question])->label('Question') ?>

    <?= $form->field($model, 'Answer')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success float-right btn-sm pr-5 pl-5']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
