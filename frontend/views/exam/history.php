<?php

use app\models\Questions;
use yii\helpers\Html;
use yii\grid\GridView;
use frontend\models\ExamResults;
use frontend\models\ExamGenerated;

$this->title = 'My Grades';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'IdCategory',
            [
                'label' => 'Type',
                'format' => 'raw',
                'value' => function($data){
                    $data = ExamGenerated::findOne($data->IdExam);
                    return $data['Type'] == 1 ? 'EXAM' : "PRACTICE";
                },
            ],
            'StartedAt',
            'FinishAt',
            [
                'label' => 'Grade',
                'format' => 'raw',
                'value' => function($data){
                    $correct = ExamResults::find()->where(['IdExam' => $data->IdExam, 'LogId' => $data->Id, 'Correct' => 1])->count();
                    $all = ExamResults::find()->where(['IdExam' => $data->IdExam, 'LogId' => $data->Id,])->count();

                    return "$correct/$all";
                },
            ],
            [
                'label' => '%',
                'format' => 'raw',
                'value' => function($data){

                    $correct = ExamResults::find()->where(['IdExam' => $data->IdExam, 'LogId' => $data->Id, 'Correct' => 1])->count();
                    $all = ExamResults::find()->where(['IdExam' => $data->IdExam, 'LogId' => $data->Id,])->count();

                    $precent = ($correct * 100) / $all;

                    return number_format($precent,0)."%";
                },
            ],


            
         
            // [
            //     'class' => 'yii\grid\ActionColumn',
            // ],

            
        ],

       
    ]); ?>


</div>
