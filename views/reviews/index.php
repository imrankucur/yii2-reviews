<?php

use imrankucur\reviews\models\Reviews;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
/* @var $this yii\web\View */
/* @var $searchModel imrankucur\reviews\models\ReviewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


function search($id){
$query = Reviews::find();

// add conditions that should always apply here

$dataProvider = new ActiveDataProvider([
    'query' => $query,
]);

// grid filtering conditions
$query->andFilterWhere([
    'productid' => $id,
]);
return $dataProvider;
}
$dataProvider=search($id);

?>
<div class="reviews-index">



    <h1><?= Html::encode("Yorumlar") ?></h1>

    <?php if(Yii::$app->user->id!=0) : ?>
    <p>
        <?= Html::a('Yorum Yap ve Puan Ver', ['create', 'id' => $id],  ['class' => 'btn btn-success']) ?>
    </p>
    <?php else :?>
    Yorum yapmak için giriş yapınız.

    <?php endif?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?=
    ListView::widget([
        'dataProvider' => $dataProvider,
        'options' => [
            'tag' => 'div',
            'class' => 'list-wrapper',
            'id' => 'list-wrapper',
        ],
        'layout' => "{pager}\n{items}\n{summary}",
        'itemView' => function ($model, $key, $index, $widget) {

            return $this->render('view',['model' => $model]);

            // or just do some echo
            // return $model->title . ' posted by ' . $model->author;
        },
        'itemOptions' => [
            'tag' => false,
        ],
        'pager' => [
            'firstPageLabel' => 'first',
            'lastPageLabel' => 'last',
            'nextPageLabel' => 'next',
            'prevPageLabel' => 'previous',
            'maxButtonCount' => 3,
        ],
    ]);
    ?>


</div>
