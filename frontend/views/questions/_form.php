<?php

use app\models\Category;
use app\models\QuestionType;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model app\models\Questions */
/* @var $model2 app\models\Answers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="questions-form">

    <?php $form = ActiveForm::begin(['enableClientScript' => false]); ?>

    <?= $form->field($model, 'Question')->textArea(['maxlength' => true]) ?>


    <?= $form->field($model, 'IdQuestionType')->dropDownList(
        ArrayHelper::map(QuestionType::find()->all(), 'IdQuestionType','Name'),
        ['prompt' => 'Select a Question Type',
         'id' => 'QuestionTypeSelect',
         'onchange' => 'questionType();',
        ]
        
        ) 
    ?>

    <div id="lblQuestionType" class="d-none">
        <div id="txtArea" class="form-group  ">
            <textarea class='form-control' id='CorrectAnswer' name="CorrectAnswer[0]" rows="6"></textarea>
        </div>

        <?= Html::button('Agregar Respuesta', ['class' => 'btn btn-primary', 'id' => 'btnNewAnswer' , 'onclick'=>'newAnswerComplete(1);',]) ?>
        <button type="button" onclick="deleteAnswer();" class="btn btn-dark">Eliminar respuesta</button>
    </div>

    <div id="lblQuestionType2" class="d-none">
        <div id="txtArea2" class="form-check" >
                <input class="form-check-input" type="radio" name="multiple[]" id="multipleSelection" value="" checked>
                <input class="form-control" id='CorrectAnswer' name="CorrectAnswer[0]" type="text">
        </div>

        <?= Html::button('Agregar Respuesta', ['class' => 'btn btn-primary', 'id' => 'btnNewAnswer2' , 'onclick'=>'newAnswerMultiple(1);',]) ?>
        <button type="button" onclick="deleteAnswer();" class="btn btn-dark">Eliminar respuesta</button>
    </div>

<?= $form->field($model, 'IdCategory')->dropDownList(
        ArrayHelper::map(Category::find()->all(), 'IdCategory','Name'),
        [
            'id' => 'CategorySelect',
            'disabled' => 'disabled',
        ]
        
        ) 
    ?>

    <?= $form->field($model, 'archivo')->fileInput()
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
