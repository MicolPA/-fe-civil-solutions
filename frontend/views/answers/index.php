<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\AnswersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Answers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="answers-index">

    <h1><?= Html::encode($this->title) ?> <?= Html::a('Create Answer', ['create','IdQuestion' => $IdQuestion], ['class' => 'btn btn-success btn-sm float-right']) ?></h1>

    <p>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'IdAnswer',
            [

                'label' => 'Answer',
                'attribute' => 'Answer',
                'contentOptions' => [
                   'style' => [
                       'max-width' => '600px',
                       'white-space' => 'normal',
                   ],
               ],
            ],
            // 'Answer',
            // 'IdQuestion',
            // 'CorrectAnswer',
            [
                'label' => 'CorrectAnswer',
                'format' => 'raw',
                'value' => function($data){

                    if ($data->idQuestion->IdQuestionType == 2) {
                        return $data->CorrectAnswer ? "<b class='text-success'>YES</b>" : "<b class='text-warning'>NO</b>";
                    }else{
                        return "<b class='text-success'>YES</b>";
                    }

                }
            ],

            // ['class' => 'yii\grid\ActionColumn', 'template'=>"{update} - {delete}" ],
            // ['class' => 'yii\grid\ActionColumn'],
            [
                'label' => '',
                'format' => 'raw',
                'value' => function ($data) {
                    $update =  Html::a('<i class="fas fa-pencil-alt text-primary mr-2"></i>', ['update', 'id' => $data->IdAnswer, 'IdQuestion' => Yii::$app->request->get()['IdQuestion']], []);
                    $delete = Html::a('<i class="fas fa-trash text-danger mt-2"></i>', ['delete', 'id' => $data->IdAnswer], [
                        'data' => [
                            'confirm' => '¿Está seguro/a que desea eliminar este registro?',
                            'method' => 'post',
                        ],
                    ]);
                    return "$update $delete";
                },
            ],  
            // ['class' => 'yii\grid\ActionColumn', 'template'=>"{update} - {delete}" ],
        ],
    ]); ?>


</div>
