<?php

use app\models\Answers;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Answers */
/* @var $form yii\widgets\ActiveForm */

$var = [0 => 'Incorrect', 1 => 'Correct'];

?>

<div class="answers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'IdQuestion')->textInput(['maxlength' => true, 'disabled' => true, 'value' => $question->Question])->label('Question') ?>

    <?= $form->field($model, 'Answer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CorrectAnswer')->dropDownList($var, ['prompt' => 'Select...', 'id' => 'CorrectAnswer', 'required' => true]); ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success float-right btn-sm pr-5 pl-5']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>