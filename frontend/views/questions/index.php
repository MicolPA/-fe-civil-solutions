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
    <h1><?= Html::encode($this->title) ?>  

    <?php if ($create): ?>
        <?= Html::a('Create Question', ['create', 'IdCategory' => $IdCategory], ['class' => 'btn btn-success btn-sm float-right mt-3']) ?>
    <?php endif ?>
        
    </h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="box box-primary table-responsive">
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
                    'contentOptions' => [
                       'style' => [
                           'max-width' => '600px',
                           'white-space' => 'normal',
                       ],
                   ],
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

                        return(Html::a('See Answers', ['/answers/index','IdQuestion' => $data->IdQuestion], ['class' => 'font-weight-bold text-primary']));

                        }
                ],

                [
                    'label' => 'Imagen',
                    'format' => 'raw',
                    'value' => function($data){
                        if ($data->Image) {
                            return(Html::button("See Image", ['',
                                'type'=>"button",
                                'class' => 'btn btn-primary btn-xs',
                                'onclick' => "showImg('/frontend/web/$data->Image');",
                            ]));            
                        }else{
                            return 'NO IMAGE';
                        }       
                    }
                ],
                ['class' => 'yii\grid\ActionColumn', 'template'=>"{update} - {delete}" ],
                // ['class' => 'yii\grid\ActionColumn'],


            ],
        ]); ?>
    </div>


</div>
