<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\EntpCustomerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'My Customers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="entp-customer-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('New Customer', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'entrepreneur_user_id',
            //'customer_id',
            [
                'attribute' => 'name',
                'value' => 'customer.name'
            ],
            [
                'attribute' => 'pic',
                'value' => 'customer.pic'
            ],
            [
                'attribute' => 'telephone',
                'value' => 'customer.telephone'
            ],
            [
                'attribute' => 'mobile',
                'value' => 'customer.mobile'
            ],
            [
                'attribute' => 'email',
                'value' => 'customer.email'
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
