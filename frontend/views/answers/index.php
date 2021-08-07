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

                    return $data->CorrectAnswer ? "SI" : "NO";

                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
