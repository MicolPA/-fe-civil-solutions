<?php

use app\models\Questions;
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

    <?php 
    ?>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'IdCategory',
            'Name',
            [
                'label' => 'Count',
                'format' => 'raw',
                'value' => function($data){
                    $count = Questions::find()
                            ->where(['IdCategory' => $data->IdCategory])
                            ->count();
                        return(Html::a($count."/". $data->Limit, ['/questions/index','IdCategory' => $data->IdCategory]));
                },
            ],

            [
                'label' => 'Actions',
                'format' => 'raw',
                'value' => function($data){
                    $count = Questions::find()
                            ->where(['IdCategory' => $data->IdCategory])
                            ->count();
                    if($count < $data->Limit){
                        return(Html::a("New Question", ['/questions/create', 'IdCategory' =>  $data->IdCategory]));
                    }else{
                        return('Limit Reached.');
                    }
                },
            ],
         
            [
                'class' => 'yii\grid\ActionColumn',
            ],

            
        ],

       
    ]); ?>


</div>
