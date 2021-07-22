<?php

use app\models\Category;
use app\models\QuestionType;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$categories = \app\models\Category::find()->all();;
$c_selected = isset($get['category'])?$get['category']:'';
/* @var $this yii\web\View */
/* @var $model app\models\Questions */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="questions-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Question')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'IdQuestionType')->dropDownList(
        ArrayHelper::map(QuestionType::find()->all(), 'IdQuestionType','QuestionType'),
        ['prompt' => 'Select a Question Type']
        
        ) 
    ?>

    <?= $form->field($model, 'Category')->dropDownList(
        ArrayHelper::map(Category::find()->all(), 'IdCategory','Name'),
        ['prompt' => 'Select a Category']
        
        ) 
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
