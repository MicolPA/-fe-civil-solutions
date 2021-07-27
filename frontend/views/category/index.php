<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'IdCategory',
            'Name',
            [
                'label' => 'Count',
<<<<<<< HEAD
                'format' => 'raw',
                'attribute' => 'Count',
                'value' => function($data){
                    return $data->Count == $data->Limit ? Html::a($data->Count."/". $data->Limit, ['/questions/list','IdCategory' => $data->IdCategory]) : "";
                },
            ],

            [
                'format' => 'raw',
                'value' => function($data){
                    return $data->Count == $data->Limit ? Html::a("New Question", ['/questions/create', 'IdCategory' =>  $data->IdCategory]) : "";
=======
                'attribute' => 'Count',
                'value' => function($data){
                    return $data->Count == 0 ? $data->Count."/". $data->Limit : "";
>>>>>>> master
                },
            ],
         
            [
                'class' => 'yii\grid\ActionColumn',
            ],

            
        ],

       
    ]); ?>


</div>
