<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model imrankucur\reviews\models\Reviews */

$this->title = 'Yorum Yap';
?>

<div class="reviews-create">

    <h1><?= Html::encode("Yorum Yap ve Puan Ver") ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'productid' => $productid,
    ]) ?>

</div>
