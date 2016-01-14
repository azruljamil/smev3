<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\EntpSalesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'My Sales';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="entp-sales-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('New Sales', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'entrepreneur_id',
            //'sales_id',
            [
                'attribute' => 'total',
                'value' => 'sales.total',
                'format' => ['decimal',2],
                'headerOptions'=>['width'=>'250px']
            ],
            [
                'label' => 'Description',
                'attribute' => 'reason',
                'value' => 'sales.reason',
                'headerOptions'=>['width'=>'350px']
            ],
            [
                'attribute' => 'Sales Date',
                'value' => 'sales.created_at',
                'format' => 'date',
                'headerOptions'=>['width'=>'200px']
            ],
            [
                'attribute' => 'Sales Updated',
                'value' => 'sales.updated_at',
                'format' => 'date',
                'headerOptions'=>['width'=>'200px']
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
