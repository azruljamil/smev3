<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\EntpProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="entp-product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('New Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'product_id',
            //'code',
            //'entrepreneur_id',
            [
                'attribute' => 'product',
                'value' => 'product.product'
            ],
            [
                'attribute' => 'code',
                'value' => 'product.code'
            ],
            [
                'attribute' => 'qty',
                'value' => 'product.qty'
            ],

            [
                'attribute' => 'created at',
                'value' => 'product.created_at',
                'format' => 'date'
            ],

            [
                'attribute' => 'updated at',
                'value' => 'product.updated_at',
                'format' => 'date'
            ],


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
