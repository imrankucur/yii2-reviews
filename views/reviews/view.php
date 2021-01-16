<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model imrankucur\reviews\models\Reviews */

$this->title = $model->id;
\yii\web\YiiAsset::register($this);
?>
<div class="reviews-view" style="height:20em;border: 15px outset #A9D6E5;" >

    <?= DetailView::widget([
        'model' => $model->product,
        'attributes' => [
            'name'
        ],
    ]) ?>

    <?= DetailView::widget([
        'model' => $model->user,
        'attributes' => [
            'username'
        ],
    ]) ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'comment:ntext',
            'starpoint',
        ],
    ]) ?>

</div>

<div style="height:5em;"></div>