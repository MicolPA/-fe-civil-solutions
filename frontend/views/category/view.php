<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Category */

$this->title = $model->Name;
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="category-view">

    <h1>
        <?= Html::encode($this->title) ?>
        <?= Html::a('Update', ['update', 'id' => $model->IdCategory], ['class' => 'btn btn-primary btn-sm mt-2 float-right']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->IdCategory], [
            'class' => 'btn btn-danger btn-sm mt-2 float-right mr-2',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'IdCategory',
            'Name',
            'Count',
            'Limit',
        ],
    ]) ?>

</div>
