<?php

use yii\helpers\Html;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel app\models\QuestionsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Questions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="questions-index">

    <h1><?= Html::encode($this->title) ?> </h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

            [
                'label' => 'Id Question',
                'attribute' => 'IdQuestion',
            ],

            [
                'label' => 'Question',
                'attribute' => 'Question',
            ],

            [
                'label' => 'Question Type',
                'attribute' => 'idQuestionType.Name',
            ],

            [
                'label' => 'Category',
                'attribute' => 'idCategory.Name',
            ],

            [
                'label' => 'Answers',
                'format' => 'raw',
                'value' => function($data){

                    return(Html::a('See Answers', ['/answers/index','IdQuestion' => $data->IdQuestion], ['class' => 'btn btn-success']));

                    }
            ],

            [
                'label' => 'Imagen',
                'format' => 'raw',
                'value' => function($data){
                        return(Html::button("See Image", ['',
                            'type'=>"button",
                            'class' => 'btn btn-success',
                            'onclick' => "showImg('/frontend/web/$data->Image');",
                        ]));
                    }
            ],

        ],
    ]); ?>


</div>
