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

    <div class="form-group mt-3">
        <?= $form->field($model, 'IdCategory')->dropDownList(
        ArrayHelper::map(Category::find()->all(), 'IdCategory','Name'),
        [
            'id' => 'CategorySelect',
            'disabled' => 'disabled',
        ]
        
        )->label('Category') 
    ?>
   </div>

    <div class="div-lab">
        <?= $form->field($model, 'archivo')->fileInput(['accept' => 'image/*'])->label('Upload Image')?>
    </div>


    <?= $form->field($model, 'IdQuestionType')->dropDownList(
        ArrayHelper::map(QuestionType::find()->all(), 'IdQuestionType','Name'),
        ['prompt' => 'Select a Question Type',
         'id' => 'QuestionTypeSelect',
         'class' => 'form-control',
         'onchange' => 'questionType();',
        ]
        
        )->label('Question type') 
    ?>

    <div id="lblQuestionType" class="d-none">
        <div id="txtArea" class="form-group">
            <input class='form-control' type="text" id='CorrectAnswer' name="CorrectAnswer[1]" placeholder="Answer">
            <!-- <textarea class='form-control' id='CorrectAnswer' name="CorrectAnswer[0]" rows="6"></textarea> -->
        </div>

        <?= Html::button('Add answer', ['class' => 'btn btn-primary btn-xs float-right mb-3', 'id' => 'btnNewAnswer' , 'onclick'=>'newAnswerComplete(2);',]) ?>
        <!-- <button type="button" onclick="deleteAnswer();" class="btn btn-dark">Eliminar respuesta</button> -->
    </div>

    <div id="lblQuestionType2" class="d-none">
        <div id="txtArea2" class="form-check">
                <input class="form-check-input mb-2" type="radio" name="multiple" id="multipleSelection" value="1" checked>
                <input class="form-control" id='CorrectAnswer' name="CorrectAnswer[0]" type="text">
        </div>

        <?= Html::button('Add answer', ['class' => 'btn btn-primary btn-xs float-right mb-3 mt-2', 'id' => 'btnNewAnswer2' , 'onclick'=>'newAnswerMultiple(2);',]) ?>
        <!-- <button type="button" onclick="deleteAnswer();" class="btn btn-dark">Eliminar respuesta</button> -->
    </div>

   

    <div class="form-group">
        <?= Html::submitButton('Save question', ['class' => 'btn btn-success btn-sm float-right pr-5 pl-5']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
