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

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <!-- <?php $IdQuestion = $_GET['IdQuestion']; ?>
        <?= Html::a('Create Answer', ['create','IdQuestion' => $IdQuestion], ['class' => 'btn btn-success']) ?> -->
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'IdAnswer',
            'Answer',
            'IdQuestion',
            'CorrectAnswer',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
